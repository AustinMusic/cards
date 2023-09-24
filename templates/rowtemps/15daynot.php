<?php
if ($_GET['apptwo'] !=''){
    $templatePath = dirname(__FILE__).'/15daynottwo.docx';
} else {
    $templatePath = dirname(__FILE__).'/15daynotone.docx';
}
$outputFilename = '15-Day Notice Letter.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
$nowDate = date('F j, Y');

$templateProcessor->setValue( 'nowDate', $nowDate);
if ($result = $conn->query("SELECT a.id, b.owner_name as ownname, c.ownaddress, concat(c.owncity,', ',c.ownstate,' ',c.ownzipcode) as owncityst, b.city, if(b.state = 'ID','Idaho',IF(b.state = 'WA','Washington','Oregon')) as longstate, a.reportname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, DATE_FORMAT(c.reqinsdate,'%M %e, %Y') as reqinsdate, c.client_reference_no as clientref, c.rowprojname FROM report a LEFT JOIN property b on b.FK_ReportID = a.id JOIN appraisalinfo c on c.FK_ReportID = a.id WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'DueDate', $record->DueDate);
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'ownname', $record->ownname );
        $templateProcessor->setValue( 'ownaddress', $record->ownaddress );
        $templateProcessor->setValue( 'owncityst', $record->owncityst );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'city', $record->city );
        $templateProcessor->setValue( 'longstate', $record->longstate );
        $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
        $templateProcessor->setValue( 'DueDate', $record->DueDate);
        $templateProcessor->setValue( 'reqinsdate', $record->reqinsdate );
        $templateProcessor->setValue( 'clientref', $record->clientref );
        $templateProcessor->setValue( 'rowprojname', $record->rowprojname );
    } else {
        $errors[] = "ID ".$_GET['id']." does not exist in the database";
    }
} else {
    $errors[] = $conn->error;
}
// Client
$_GET['client'] = $conn->real_escape_string($_GET['client']);
if ($result = $conn->query("SELECT compname as ccomp, IF(compacro = '','',concat('(',compacro,') ')) as acroparenth, IF(compacro = '',compname,compacro) as nameacro FROM clients WHERE id = " . $_GET['client'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'ccomp', $record->ccomp );
        $templateProcessor->setValue( 'acroparenth', $record->acroparenth );
        $templateProcessor->setValue( 'nameacro', $record->nameacro );
	} else {
		$errors[] = "ID ".$_GET['client']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

// Appraiser 1
$_GET['app'] = $conn->real_escape_string($_GET['app']);
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ',a.midname,' ', a.lastname,IF(a.designation = '','', CONCAT(', ', a.designation))) as apponename, if(a.apptitle = 3,'',c.definition) as apponetitle, a.emailaddress as apponeemail, a.phoneone as apponephone, a." . $_GET['licst'] . " as apponelicst, a." . $_GET['licno'] . " as apponelicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apponedigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['app'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'apponename', $record->apponename );
        $templateProcessor->setValue( 'apponephone', $record->apponephone );
        $templateProcessor->setValue( 'apponetitle', $record->apponetitle );
        $templateProcessor->setValue( 'apponelicst', $record->apponelicst );
        $templateProcessor->setValue( 'apponelicno', $record->apponelicno );
        $templateProcessor->setValue( 'apponeemail', $record->apponeemail );
        $templateProcessor->setImageValue('apponedigsig', array('../../app_images/' => $record->apponedigsig, 'width' => 50, 'height' => 50));
	} else {
		$errors[] = "ID ".$_GET['app']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}

if ($_GET['apptwo'] !='') {
// Appraiser 2
$_GET['apptwo'] = $conn->real_escape_string($_GET['apptwo']);
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ',a.midname,' ', a.lastname,IF(a.designation = '','', CONCAT(', ', a.designation))) as apptwoname, if(a.apptitle = 3,'',c.definition) as apptwotitle, a.emailaddress as apptwoemail, a.phoneone as apptwophone, a." . $_GET['licst'] . " as apptwolicst, a." . $_GET['licno'] . " as apptwolicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apptwodigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['apptwo'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'apptwoname', $record->apptwoname );
        $templateProcessor->setValue( 'apptwotitle', $record->apptwotitle );
        $templateProcessor->setValue( 'apptwoemail', $record->apptwoemail );
        $templateProcessor->setValue( 'apptwolicst', $record->apptwolicst );
        $templateProcessor->setValue( 'apptwolicno', $record->apptwolicno );
        $templateProcessor->setValue( 'apptwophone', $record->apptwophone );
        $templateProcessor->setImageValue('apptwodigsig', array('../../app_images/' => $record->apptwodigsig, 'width' => 50, 'height' => 50));
	} else {
		$errors[] = "ID ".$_GET['apptwo']." does not exist in the database";
	}
} else {
	$errors[] = $conn->error;
}
}  
    

// Assessed Values
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT group_concat(distinct(mappage) SEPARATOR ', ') as mappage, group_concat(taxlot SEPARATOR ', ') as taxlot, group_concat(parcelno SEPARATOR ', ') as parcarray FROM assessedvalues WHERE FK_ReportID = " . $_GET['id'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'mappage', $record->mappage );
        $templateProcessor->setValue( 'taxlot', $record->taxlot );
        $templateProcessor->setValue( 'parcarray', $record->parcarray );
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