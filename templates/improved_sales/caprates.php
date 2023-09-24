<?php

$templatePath = dirname(__FILE__).'/caprates.docx';
$outputFilename = 'Cap Rate Comps.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');


//extend class and add deleteRow function
class TemplateProcessor_my extends \PhpOffice\PhpWord\TemplateProcessor {
	public function deleteRow($search) {
		if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
			$search = '${' . $search . '}';
		}
		$tagPos = strpos($this->tempDocumentMainPart, $search);
		if (!$tagPos) {
			throw new Exception('Can not clone row, template variable not found or variable contains markup.');
		}
		$rowStart = $this->findRowStart($tagPos);
		$rowEnd = $this->findRowEnd($tagPos);
		$xmlRow = $this->getSlice($rowStart, $rowEnd);
		// Check if there's a cell spanning multiple rows.
		if (preg_match('#<w:vMerge w:val="restart"/>#', $xmlRow)) {
			// $extraRowStart = $rowEnd;
			$extraRowEnd = $rowEnd;
			while (true) {
				$extraRowStart = $this->findRowStart($extraRowEnd + 1);
				$extraRowEnd = $this->findRowEnd($extraRowEnd + 1);
				// If extraRowEnd is lower then 7, there was no next row found.
				if ($extraRowEnd < 7) {
					break;
				}
				// If tmpXmlRow doesn't contain continue, this row is no longer part of the spanned row.
				$tmpXmlRow = $this->getSlice($extraRowStart, $extraRowEnd);
				if (!preg_match('#<w:vMerge/>#', $tmpXmlRow) &&
					!preg_match('#<w:vMerge w:val="continue"\s*/>#', $tmpXmlRow)) {
					break;
				}
				// This row was a spanned row, update $rowEnd and search for the next row.
				$rowEnd = $extraRowEnd;
			}
			$xmlRow = $this->getSlice($rowStart, $rowEnd);
		}
		$result = str_replace($xmlRow, '', $this->tempDocumentMainPart);
		$this->tempDocumentMainPart = $result;
		return true;
	}
}

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \TemplateProcessor_my($templatePath);
$errors = [];

//first
$_GET['id'] = $conn->real_escape_string($_GET['id']);
//second
if ($result = $conn->query("SELECT @rn:=@rn+1 AS rank, id, propname, address, citystate, recdate, sstatus, ybuilt, reno, nra, effstab, caprate
        FROM (SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state) as citystate, DATE_FORMAT(d.record_date,'%m/%y') as recdate, IF(d.sale_status = '3','', e.definition) as sstatus, c.year_built as ybuilt, CONCAT(' ',c.last_renovation) as reno, FORMAT(c.overall_nra,0) as nra, FORMAT(d.eff_sale_price_stab,0) as effstab, CONCAT(d.cap_rate,' %') as caprate from report a join property b on b.FK_ReportID = a.id left outer join building c on c.FK_ReportID = a.id left outer join saletrans d on d.FK_ReportID = a.id left outer join WFDictionary e on e.id = d.sale_status WHERE a.id in (" . $_GET['id'] . ") order by FIELD(a.id," . $_GET['id'] . ")
	   ) t1, (SELECT @rn:=0) t2;")) {

	//remove first row (bug with the top border)
	$templateProcessor->deleteRow('firstRow_removeit');
	$values = [];
	while($record = $result->fetch_object()) {
		$values[] = [
						'propname' => $record->propname,
						'address' => $record->address,
						'citystate' => $record->citystate,
						'recdate' => $record->recdate,
						'sstatus' => $record->sstatus,
						'ybuilt' => $record->ybuilt,
						'reno' => $record->reno,
						'nra' => $record->nra,
						'effstab' => $record->effstab,
						'caprate' => $record->caprate
					];
	}
	$templateProcessor->cloneRowAndSetValues('propname', $values);
	
	if(empty($values)) {
		$errors[] = "ID ".$_GET['id']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

//close database connection
$conn->close();

//show errors and exit
if(!empty($errors)) {
	echo nl2br(htmlspecialchars(implode("\n", array_unique($errors))));
	exit;
}

$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="'.$outputFilename.'"');
header('Cache-Control: max-age=0');
$templateProcessor->saveAs($temp_file);
readfile($temp_file); // or echo file_get_contents($temp_file);
unlink($temp_file); // remove temp file