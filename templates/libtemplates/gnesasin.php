<?php
$templatePath = dirname(__FILE__).'/../output/libtemps/gnesasin.docx';
$outputFilename = 'Executive Summary.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("select a.id, a.reportname, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, UPPER(b.property_name) as cappropname, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, b.city, b.county, b.state, IF(b.state = 'WA','Washington',IF(b.state = 'ID','Idaho',IF(b.state = 'CA','California','Oregon'))) as longstate, b.legal_desc, b.zoning_code, b.zoning_desc, FORMAT(b.gross_land_acre,2) as grossacre, FORMAT(b.gross_land_sf,0) as grosssf, FORMAT(b.unusable_acre,2) as unuseacre, FORMAT(b.unusable_sf,0) as unusesf, FORMAT(b.net_usable_acre,2) as netacre, FORMAT(b.net_usable_sf,0) as netsf, FORMAT(SUM(b.excess_acre + b.surplus_acre),2) as exacre, FORMAT(SUM(b.excess_sf + b.surplus_sf),0) as exsf, FORMAT(b.primary_acre,2) as primacre, FORMAT(b.primary_sf,0) as primsf, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as eff_date_value, DATE_FORMAT(c.prosstab_dov,'%M %e, %Y') as prosstab_dov, DATE_FORMAT(c.proscomp_dov,'%M %e, %Y') as proscomp_dov, DATE_FORMAT(c.inspect_date,'%M %e, %Y') as inspect_date, IF(c.estate_appraised = 3,'',d.definition) as estateapp, if(c.prosstab_est_app,'',e.definition) as prosstabestapp, IF(c.proscomp_est_app = 3,'',f.definition) as proscompestapp from report a join property b on b.FK_ReportID = a.id join appraisalinfo c on c.FK_ReportID = a.id join WFDictionary d on d.id = c.estate_appraised join WFDictionary e on e.id = c.prosstab_est_app join WFDictionary f on f.id = c.proscomp_est_app where a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'property_name', $record->property_name );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
        $templateProcessor->setValue( 'city', $record->city );
        $templateProcessor->setValue( 'county', $record->county );
        $templateProcessor->setValue( 'longstate', $record->longstate );
        $templateProcessor->setValue( 'zoning_code', $record->zoning_code );
        $templateProcessor->setValue( 'zoning_desc', $record->zoning_desc );
        $templateProcessor->setValue( 'DueDate', $record->DueDate );
        $templateProcessor->setValue( 'eff_date_value', $record->eff_date_value);
        $templateProcessor->setValue( 'prosstab_dov', $record->prosstab_dov);
        $templateProcessor->setValue( 'proscomp_dov', $record->proscomp_dov);
        $templateProcessor->setValue( 'estateapp', $record->estateapp);
        $templateProcessor->setValue( 'prosstabestapp', $record->prosstabestapp);
        $templateProcessor->setValue( 'proscompestapp', $record->proscompestapp);
        $templateProcessor->setValue( 'legal_desc', $record->legal_desc );
        $templateProcessor->setValue( 'grossacre', $record->grossacre );
        $templateProcessor->setValue( 'grosssf', $record->grosssf );
        $templateProcessor->setValue( 'unuseacre', $record->unuseacre );
        $templateProcessor->setValue( 'unusesf', $record->unusesf );
        $templateProcessor->setValue( 'netacre', $record->netacre );
        $templateProcessor->setValue( 'netsf', $record->netsf );
        $templateProcessor->setValue( 'exacre', $record->exacre );
        $templateProcessor->setValue( 'exsf', $record->exsf );
        $templateProcessor->setValue( 'primacre', $record->primacre );
        $templateProcessor->setValue( 'primsf', $record->primsf );
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