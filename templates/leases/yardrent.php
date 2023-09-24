<?php

$templatePath = dirname(__FILE__).'/yardrent.docx';
$outputFilename = 'Yard Space Rents.docx';

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
if ($result = $conn->query("select a.id, concat(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.lessee_name as lessee, date_format(c.lease_start_date,'%m/%y') as startdate, concat(c.total_lease_term_mos,' ',d.definition) as terms, format(e.yard_land_area_sf,0) as yardsf, e.desc_yard_space as yarddesc, format(e.eff_yard_rent_sf_mo,3) as yardrent from report a left outer join property b on b.FK_ReportID = a.id left outer join leasetrans c on c.FK_ReportID = a.id left outer join WFDictionary d on d.id = c.mos_vs_mos left outer join yardabsorb e on e.FK_ReportID = a.id WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {

	//remove first row (bug with the top border)
	$templateProcessor->deleteRow('firstRow_removeit');
	while($record = $result->fetch_object()) {
		$values[] = [
						'lessee' => $record->lessee,
						'address' => $record->address,
						'city' => $record->city,
						'state' => $record->state,
						'startdate' => $record->startdate,
						'terms' => $record->terms,
						'yardsf' => $record->yardsf,
						'yarddesc' => $record->yarddesc,
						'yardrent' => $record->yardrent
					];
	}
	$templateProcessor->cloneRowAndSetValues('address', $values);
	
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
readfile($temp_file); 
unlink($temp_file); 