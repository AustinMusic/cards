<?php

$templatePath = dirname(__FILE__).'/orappreview.docx';
$outputFilename = 'Appraisal Review - State of OR Template.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT a.id, UPPER(b.property_name) as cappropname, b.property_name as propname, b.owner_name as owner, a.reportname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, IF(b.state = 'ID','Idaho',IF(b.state = 'WA','Washington','Oregon')) as longstate, b.county, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, DATE_FORMAT(c.inspect_date,'%M %e, %Y') as insDate, c.client_reference_no as clientref, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as effdov, c.rowprojname, DATE_FORMAT(c.rowdold,'%M %e, %Y') as rowdold, c.rowappname, c.rowappfirm, DATE_FORMAT(c.rowdoreport,'%M %e, %Y') as rowdoreport, DATE_FORMAT(c.rowdoreview,'%M %e, %Y') as rowdoreview, format(c.rowsfacq,0) as rowsfacq FROM report a LEFT JOIN property b on b.FK_ReportID = a.id JOIN appraisalinfo c on c.FK_ReportID = a.id WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'propname', $record->propname );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'county', $record->county );
        $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
        $templateProcessor->setValue( 'longstate', $record->longstate );
        $templateProcessor->setValue( 'effdov', $record->effdov );
        $templateProcessor->setValue( 'insDate', $record->insDate );
        $templateProcessor->setValue( 'DueDate', $record->DueDate);
        $templateProcessor->setValue( 'clientref', $record->clientref );
        $templateProcessor->setValue( 'rowprojname', $record->rowprojname );
        $templateProcessor->setValue( 'rowdold', $record->rowdold );
        $templateProcessor->setValue( 'rowappname', $record->rowappname );
        $templateProcessor->setValue( 'rowappfirm', $record->rowappfirm );
        $templateProcessor->setValue( 'rowdoreport', $record->rowdoreport );
        $templateProcessor->setValue( 'rowdoreview', $record->rowdoreview );
        $templateProcessor->setValue( 'rowsfacq', $record->rowsfacq );
    } else {
        $errors[] = "ID ".$_GET['id']." does not exist in the database";
    }
} else {
    $errors[] = $conn->error;
}
// Client
$_GET['client'] = $conn->real_escape_string($_GET['client']);
if ($result = $conn->query("SELECT a.compname as ccomp, UPPER(a.compname) as capcomp, CONCAT(a.address,IF(a.suite is NULL,'',CONCAT(', ',a.suite))) as caddress, CONCAT(a.city,', ', a.state,'  ', a.zipcode) as ccsz, CONCAT(a.firstname,' ',a.lastname) as cliname, b.definition as clisal, a.lastname as clname, if(a.designation = '', a.designation, concat(', ',a.designation)) as clides, a.clienttitle as ctitle FROM clients a JOIN WFDictionary b on b.id = a.salutation WHERE a.id = " . $_GET['client'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'ccomp', $record->ccomp );
        $templateProcessor->setValue( 'capcomp', $record->capcomp );
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

// Appraiser 1
$_GET['app'] = $conn->real_escape_string($_GET['app']);
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ', a.midname,' ', a.lastname,IF(a.designation = '','', CONCAT(', ', a.designation))) as apponename, if(a.apptitle = 3,'',c.definition) as apponetitle, a.emailaddress as apponeemail, a.phoneone, a." . $_GET['licst'] . " as apponelicst, a." . $_GET['licno'] . " as apponelicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apponedigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['app'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'apponename', $record->apponename );
        $templateProcessor->setValue( 'apponetitle', $record->apponetitle );
        $templateProcessor->setValue( 'phoneone', $record->phoneone );
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
    

// Assessed Values
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT group_concat(distinct(mappage)) as mappage, group_concat(taxlot) as taxlot, group_concat(parcelno) as parcarray, CONCAT('$',FORMAT(sum(markettotal),0)) as markettot FROM assessedvalues  WHERE FK_ReportID = " . $_GET['id'] ."")) {
	$record = $result->fetch_object();
	
	if($record != NULL) {
		$templateProcessor->setValue( 'mappage', $record->mappage );
        $templateProcessor->setValue( 'taxlot', $record->taxlot );
        $templateProcessor->setValue( 'parcarray', $record->parcarray );
        $templateProcessor->setValue( 'markettot', $record->markettot );
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