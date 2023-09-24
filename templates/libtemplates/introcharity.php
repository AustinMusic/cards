<?php
$templatePath = dirname(__FILE__).'/../output/libtemps/introcharity.docx';
$outputFilename = 'Introduction - Charitble Contribution.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("select a.id, a.reportname, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, UPPER(b.property_name) as cappropname, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, b.legal_desc, c.client_name, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as eff_date_value, DATE_FORMAT(c.prosstab_dov,'%M %e, %Y') as prosstab_dov, DATE_FORMAT(c.proscomp_dov,'%M %e, %Y') as proscomp_dov, DATE_FORMAT(c.retro_dov,'%M %e, %Y') as retro_dov, DATE_FORMAT(c.inspect_date,'%M %e, %Y') as inspect_date, IF(c.estate_appraised = 3,'',d.definition) as estateapp, if(c.prosstab_est_app,'',e.definition) as prosstabestapp, IF(c.proscomp_est_app = 3,'',f.definition) as proscompestapp from report a join property b on b.FK_ReportID = a.id join appraisalinfo c on c.FK_ReportID = a.id join WFDictionary d on d.id = c.estate_appraised join WFDictionary e on e.id = c.prosstab_est_app join WFDictionary f on f.id = c.proscomp_est_app where a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'property_name', $record->property_name );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
        $templateProcessor->setValue( 'client_name', $record->client_name );
        $templateProcessor->setValue( 'DueDate', $record->DueDate );
        $templateProcessor->setValue( 'eff_date_value', $record->eff_date_value);
        $templateProcessor->setValue( 'estateapp', $record->estateapp);
        $templateProcessor->setValue( 'legal_desc', $record->legal_desc );
        $templateProcessor->setValue( 'inspect_date', $record->inspect_date );
    } else {
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