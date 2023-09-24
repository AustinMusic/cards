<?php

$templatePath = dirname(__FILE__).'/../output/libtemps/assvalWAmulti.docx';
$outputFilename = 'WA Assessed Values and Property Taxes.docx';

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
if ($result = $conn->query("
select a.id, b.county, b.assessedyear, group_concat(distinct(c.mappage)) as mappage, group_concat(c.taxlot) as taxlot, group_concat(c.parcelno) as parcarray
from report a
join property b on b.FK_ReportID = a.id
join assessedvalues c on c.FK_ReportID = a.id
where a.id = " . $_GET['id'])) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue('county', $record->county);
		$templateProcessor->setValue('mappage', $record->mappage);
      $templateProcessor->setValue( 'assessedyear', $record->assessedyear );
		$templateProcessor->setValue('taxlot', $record->taxlot);
		$templateProcessor->setValue('parcelarray', $record->parcarray);
	} else {
		$errors[] = "ID ".$_GET['id']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

//second
if ($result = $conn->query("
SELECT parcelno, marketland as landval, marketimp as impval, markettotal as totalval, annualtaxes as taxes
from assessedvalues
where FK_ReportID = " . $_GET['id'])) {

	//remove first row (bug with the top border)
	$templateProcessor->deleteRow('firstRow_removeit');
	
	$sumland = 0;
	$sumimp = 0;
	$sumtotal = 0;
	$sumtaxes = 0;
	$values = [];
	while($record = $result->fetch_object()) {
		$values[] = [
						'parcelno' => $record->parcelno,
						'landval' => '$'.number_format($record->landval),
						'impval' => '$'.number_format($record->impval),
						'totalval' => '$'.number_format($record->totalval),
						'taxes' => '$'.number_format($record->taxes, 2)
					];
		
		$sumland += $record->landval;
		$sumimp += $record->impval;
		$sumtotal += $record->totalval;
		$sumtaxes += $record->taxes;
	}
	$templateProcessor->cloneRowAndSetValues('parcelno', $values);
	
	$templateProcessor->setValue('sumland', '$'.number_format($sumland));
	$templateProcessor->setValue('sumimp', '$'.number_format($sumimp));
	$templateProcessor->setValue('sumtotal', '$'.number_format($sumtotal));
	$templateProcessor->setValue('sumtaxes', '$'.number_format($sumtaxes, 2));
	
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