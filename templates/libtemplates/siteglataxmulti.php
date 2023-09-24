<?php

$templatePath = dirname(__FILE__).'/../output/libtemps/siteglataxmulti.docx';
$outputFilename = 'Site Description - Gross Land Area - Multi Tax Lot.docx';

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
if ($result = $conn->query("select a.id, a.reportname, UPPER(b.property_name) as cappropname, concat(b.streetnumber,' ',b.streetname) as address, concat(b.city,', ',b.state,' ',b.zip_code) as cityst, b.city, b.county, if(b.state = 'ID','Idaho',if(b.state = 'WA','Washington','Oregon')) as state, c.definition as shape
from report a
left join property b on b.FK_ReportID = a.id
left join WFDictionary c on c.id = b.shape
where a.id = " . $_GET['id'])) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'cityst', $record->cityst );
        $templateProcessor->setValue( 'county', $record->county );
    $templateProcessor->setValue( 'city', $record->city );
        $templateProcessor->setValue( 'state', $record->state );
        $templateProcessor->setValue( 'shape', $record->shape );
	} else {
		$errors[] = "ID ".$_GET['id']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

//second
if ($result = $conn->query("
SELECT taxlot, (assessedglasf / 43560) as glacre, assessedglasf as glasf
from assessedvalues
where FK_ReportID = " . $_GET['id'])) {

	//remove first row (bug with the top border)
	$templateProcessor->deleteRow('firstRow_removeit');
	
	$sumacre = 0;
	$sumsf = 0;
	$values = [];
	while($record = $result->fetch_object()) {
		$values[] = [
						'taxlot' => $record->taxlot,
						'glacre' => number_format($record->glacre,2),
						'glasf' => number_format($record->glasf)
					];
		
		$sumacre += $record->glacre;
		$sumsf += $record->glasf;
	}
	$templateProcessor->cloneRowAndSetValues('taxlot', $values);	
	$templateProcessor->setValue('sumacre', number_format($sumacre, 2));
	$templateProcessor->setValue('sumsf', number_format($sumsf));
	
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