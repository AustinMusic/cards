<?php
if ($_GET['apptwo'] !=''){
    $templatePath = dirname(__FILE__).'/evalsaletwo.docx';
    } else {
    $templatePath = dirname(__FILE__).'/evalsaleone.docx';
}
$outputFilename = 'Evaluation Report - Sales.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new\PhpOffice\PhpWord\TemplateProcessor($templatePath);
$errors = [];
// Property
$_GET['id'] = $conn->real_escape_string($_GET['id']);
if ($result = $conn->query("SELECT a.id, UPPER(b.property_name) as cappropname, b.property_name as propname, b.owner_name as owner, a.reportname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, b.county, b.legal_desc, IF(b.photo1 = '','../../comp_images/no-photo.jpg',CONCAT('../../comp_images/', a.id,'/',b.photo1)) as image, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, DATE_FORMAT(c.inspect_date,'%M %e, %Y') as insDate, c.client_reference_no as clientref, c.borrower, c.assessedyear, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as effdov, format(d.overall_gba,0) as gba, format(d.overall_nra,0) as nra, format(b.net_usable_sf,0) as netsf, format(b.net_usable_acre,2) as netacre, b.zoning_code, b.zoning_desc, concat(d.year_built,' ',d.last_renovation) as yearbt, o.propertytype, p.subtype, CONCAT(d.site_cover_primary,'%') as scrprim, d.const_descr, q.definition as access, r.definition as orientation, s.definition as exposure, b.traffic_count, IF(d.building_quality = 3,'',bq.definition) as quality, IF(d.int_condition = 3,'',bc.definition) as bcond, d.parking_stalls as pspaces, d.parking_ratio_nra as pratio, d.land_build_ratio_primary as ltbrp
FROM report a LEFT JOIN property b on b.FK_ReportID = a.id JOIN appraisalinfo c on c.FK_ReportID = a.id JOIN building d on d.FK_ReportID = a.id JOIN WFDictionary bq on bq.id = d.building_quality JOIN WFDictionary bc on bc.id = d.int_condition join propertytype o on o.id = b.propertytype join subtype p on p.id = b.propertysubtype join WFDictionary q on q.id = b.site_access join WFDictionary r on r.id = b.orientation join WFDictionary s on s.id = b.exposure WHERE a.id = " . $_GET['id'] . "")) {
    $record = $result->fetch_object();
    if($record != NULL) {
        $templateProcessor->setValue( 'cappropname', $record->cappropname );
        $templateProcessor->setValue( 'reportname', $record->reportname );
        $templateProcessor->setValue( 'propname', $record->propname );
        $templateProcessor->setValue( 'address', $record->address );
        $templateProcessor->setValue( 'county', $record->county );
        $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
        $templateProcessor->setValue( 'legal_desc', $record->legal_desc );
        $templateProcessor->setValue( 'yearbt', $record->yearbt );
        $templateProcessor->setValue( 'effdov', $record->effdov );
        $templateProcessor->setValue( 'insDate', $record->insDate );
        $templateProcessor->setValue( 'DueDate', $record->DueDate);
        $templateProcessor->setValue( 'clientref', $record->clientref );
        $templateProcessor->setValue( 'borrower', $record->borrower );
        $templateProcessor->setValue( 'owner', $record->owner );
        $templateProcessor->setValue( 'gba', $record->gba );
        $templateProcessor->setValue( 'netsf', $record->netsf );
        $templateProcessor->setValue( 'netacre', $record->netacre );
        $templateProcessor->setValue( 'ltbrp', $record->ltbrp );
        $templateProcessor->setValue( 'subtype', $record->subtype );
        $templateProcessor->setValue( 'quality', $record->quality );
        $templateProcessor->setValue( 'bcond', $record->bcond );
        $templateProcessor->setValue( 'scrprim', $record->scrprim );
        $templateProcessor->setValue( 'const_descr', $record->const_descr );
        $templateProcessor->setValue( 'access', $record->access );
        $templateProcessor->setValue( 'orientation', $record->orientation );
        $templateProcessor->setValue( 'exposure', $record->exposure );
        $templateProcessor->setValue( 'traffic_count', $record->traffic_count );
        $templateProcessor->setValue( 'zoning_code', $record->zoning_code );
        $templateProcessor->setValue( 'zoning_desc', $record->zoning_desc );
        $templateProcessor->setValue( 'pspaces', $record->pspaces );
        $templateProcessor->setValue( 'pratio', $record->pratio );
        $templateProcessor->setValue( 'assessedyear', $record->assessedyear );
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

// Appraiser 1
$_GET['app'] = $conn->real_escape_string($_GET['app']);
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ',a.midname,' ', a.lastname, IF(a.designation = '','', CONCAT(', ', a.designation))) as apponename, if(a.apptitle = 3,'',c.definition) as apponetitle, a.emailaddress as apponeemail, a." . $_GET['licst'] . " as apponelicst, a." . $_GET['licno'] . " as apponelicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apponedigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['app'] ."")) {
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
if ($result = $conn->query("SELECT CONCAT(a.firstname,' ',a.midname,' ', a.lastname, IF(a.designation = '','', CONCAT(', ', a.designation))) as apptwoname, if(a.apptitle = 3,'',c.definition) as apptwotitle, a.emailaddress as apptwoemail, a." . $_GET['licst'] . " as apptwolicst, a." . $_GET['licno'] . " as apptwolicno, IF(a.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', a.id,'/',a.digsignature)) as apptwodigsig FROM appraisers a join WFDictionary c on c.id = a.apptitle WHERE a.id = " . $_GET['apptwo'] ."")) {
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