<?php

$templatePath = dirname(__FILE__).'/orcell.docx';
$outputFilename = 'Cell Tower Rent.docx';

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
if ($result = $conn->query("SELECT @rn:=@rn+1 AS rank, id, property_name as propname, lessee_name as lessee, address, city, or_survey as survey, orterms as terms, otherrentmo, or_lease_exp_term as expterm, desc_or_space as ordesc, or_comments as comments FROM (SELECT a.id, b.property_name, format(c.other_rent_sf_mo,0) as otherrentmo, e.lessee_name, CONCAT(b.streetnumber,' ',b.streetname) as address, concat(b.city,', ',b.state) as city, date_format(c.or_survey,'%m/%y') as or_survey, concat(c.orterms,' Mos.') as orterms, if(c.or_lease_exp_term = 3,'',d.definition) as or_lease_exp_term, c.desc_or_space, c.or_comments FROM report a LEFT OUTER JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN yardabsorb c on c.FK_ReportID = a.id LEFT OUTER JOIN WFDictionary d on d.id = c.or_lease_exp_term LEFT OUTER JOIN leasetrans e on e.FK_ReportID = a.id WHERE a.id in (" . $_GET[ 'id' ] . ") ORDER BY field(a.id," . $_GET[ 'id' ] . ") ) t1, (SELECT @rn:=0) t2; " ) ) {

	//remove first row (bug with the top border)
	$templateProcessor->deleteRow('firstRow_removeit');
	while($record = $result->fetch_object()) {
		$values[] = [
						'propname' => $record->propname,
						'address' => $record->address,
						'city' => $record->city,
						'survey' => $record->survey,
						'otherrentmo' => $record->otherrentmo,
						'terms' => $record->terms,
						'expterm' => $record->expterm,
						'ordesc' => $record->ordesc
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