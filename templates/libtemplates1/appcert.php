<?php
if ($_GET['apptwo'] !=''){
    $templatePath = dirname(__FILE__).'/../output/libtemps/certdual.docx';
    } else {
    $templatePath = dirname(__FILE__).'/../output/libtemps/certsing.docx';
}
$outputFilename = 'Appraiser Certification.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT a.id, UPPER(b.property_name) as cappropname, a.reportname FROM report a LEFT JOIN property b on b.FK_ReportID = a.id WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
    } else {
        $errors[] = "ID ".$_GET['id']." does not exist in the database";
    }
} else {
    $errors[] = $conn->error;
}

// Appraiser 1
$_GET['app'] = $conn->real_escape_string($_GET['app']);
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ',a.midname,' ', a.lastname, IF(a.designation = '','',CONCAT(', ',a.designation))) as apponename, if(a.apptitle = 3,'',c.definition) as apponetitle, a.emailaddress as apponeemail, a." . $_GET['licst'] . " as apponelicst, a." . $_GET['licno'] . " as apponelicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apponedigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['app'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'apponename', $record->apponename );
        $templateProcessor->setValue( 'apponetitle', $record->apponetitle );
        $templateProcessor->setValue( 'apponelicst', $record->apponelicst );
        $templateProcessor->setValue( 'apponelicno', $record->apponelicno );
        $templateProcessor->setValue( 'apponeemail', $record->apponeemail );
        $templateProcessor->setImageValue('apponedigsig', array('../../app_images/' => $record->apponedigsig, 'width' => 40, 'height' => 40));
	} else {
		$errors[] = "ID ".$_GET['app']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}
if ($_GET['apptwo'] !='') {
// Appraiser 2
$_GET['apptwo'] = $conn->real_escape_string($_GET['apptwo']);
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ',a.midname,' ', a.lastname, IF(a.designation = '','',CONCAT(', ',a.designation))) as apptwoname, if(a.apptitle = 3,'',c.definition) as apptwotitle, a.emailaddress as apptwoemail, a." . $_GET['licst'] . " as apptwolicst, a." . $_GET['licno'] . " as apptwolicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apptwodigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['apptwo'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'apptwoname', $record->apptwoname );
        $templateProcessor->setValue( 'apptwotitle', $record->apptwotitle );
        $templateProcessor->setValue( 'apptwolicst', $record->apptwolicst );
        $templateProcessor->setValue( 'apptwolicno', $record->apptwolicno );
        $templateProcessor->setImageValue('apptwodigsig', array('../../app_images/' => $record->apptwodigsig, 'width' => 40, 'height' => 40));
	} else {
		$errors[] = "ID ".$_GET['apptwo']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}
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