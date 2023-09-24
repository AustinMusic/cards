<?php

$templatePath = dirname(__FILE__).'/recertconstinspect.docx';
$outputFilename = 'Recert and Construction Inspection.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT a.id, UPPER(b.property_name) as cappropname, b.property_name as propname, a.reportname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, IF(b.photo1 = '','../../comp_images/no-photo.jpg',CONCAT('../../comp_images/', a.id,'/',b.photo1)) as image, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, DATE_FORMAT(c.inspect_date,'%M %e, %Y') as insDate, c.client_reference_no as clientref, c.borrower, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as effdov FROM report a LEFT JOIN property b on b.FK_ReportID = a.id JOIN appraisalinfo c on c.FK_ReportID = a.id WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'propname', $record->propname );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
        $templateProcessor->setValue( 'DueDate', $record->DueDate);
        $templateProcessor->setValue( 'clientref', $record->clientref );
        $templateProcessor->setValue( 'borrower', $record->borrower );
        $templateProcessor->setValue( 'insDate', $record->insDate );
        $templateProcessor->setValue( 'effdov', $record->effdov );
        $templateProcessor->setImageValue('SubjectPhoto', array('../../comp_images/' => $record->image));
    } else {
        $errors[] = "ID ".$_GET['id']." does not exist in the database";
    }
} else {
    $errors[] = $conn->error;
}
// Client
$_GET['client'] = $conn->real_escape_string($_GET['client']);
if ($result = $conn->query("SELECT a.compname as ccomp, CONCAT(a.address,IF(a.suite is NULL,'',CONCAT(', ',a.suite))) as caddress, CONCAT(a.city,', ', a.state,'  ', a.zipcode) as ccsz, CONCAT(a.firstname,' ',a.lastname) as cliname, b.definition as clisal, a.lastname as clname, if(a.designation = '', a.designation, concat(', ',a.designation)) as clides, a.clienttitle as ctitle FROM clients a JOIN WFDictionary b on b.id = a.salutation WHERE a.id = " . $_GET['client'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'ccomp', $record->ccomp );
        $templateProcessor->setValue( 'caddress', $record->caddress );
        $templateProcessor->setValue( 'ccsz', $record->ccsz );
        $templateProcessor->setValue( 'cityst', $record->cityst );
        $templateProcessor->setValue( 'cliname', $record->cliname );
        $templateProcessor->setValue( 'clisal', $record->clisal );
        $templateProcessor->setValue( 'clname', $record->clname );
        $templateProcessor->setValue( 'clides', $record->clides );
        $templateProcessor->setValue( 'ctitle', $record->ctitle );
	} else {
		$errors[] = "ID ".$_GET['client']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

// Appraiser
$_GET['app'] = $conn->real_escape_string($_GET['app']);
if ($result = $conn->query("SELECT CONCAT(a.firstname, IF(a.midname = '',' ',CONCAT(' ',a.midname)), a.lastname, IF(a.designation = '','', CONCAT(', ', a.designation)) ) as appname, if(a.apptitle = 3,'',c.definition) as atitle, a.emailaddress as aemail, a." . $_GET['licst'] . " as licst, a." . $_GET['licno'] . " as licno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as digsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['app'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'appname', $record->appname );
        $templateProcessor->setValue( 'aemail', $record->aemail );      
        $templateProcessor->setValue( 'licst', $record->licst );
        $templateProcessor->setValue( 'atitle', $record->atitle );
        $templateProcessor->setValue( 'licno', $record->licno );
        $templateProcessor->setImageValue('digsig', array('../../app_images/' => $record->digsig, 'width' => 40, 'height' => 40));
	} else {
		$errors[] = "ID ".$_GET['app']." does not exist in the database";
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