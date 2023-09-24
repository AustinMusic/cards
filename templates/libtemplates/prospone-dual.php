<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, DATE_FORMAT(a.DueDate,'%M %e, %Y') as DueDate, a.reportname, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state,'  ',b.zip_code) as citystatezip, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as eff_date_value, DATE_FORMAT(c.prosstab_dov,'%M %e, %Y') as prosstab_dov, if(c.estate_appraised = 3,'', d.definition)  as estapp, if(c.prosstab_est_app = 3,'', m.definition)  as stabestapp, e.compname as clicomp, e.address as cliadd, e.suite as clisuite, e.city as clicity, e.state as clistate, e.zipcode as clizip, if(e.salutation = 3,'',i.definition) as clisal, e.firstname as clifname, e.lastname as clilname, if(e.designation = '', e.designation, concat(', ',e.designation)) as clides, e.clienttitle as clititle, f.id as apponeid, f.firstname as apponefname, f.midname as apponemname, f.lastname as apponelname, IF(f.designation = '','', CONCAT(', ', f.designation)) as apponedes, if(f.apptitle = 3,'',h.definition) as apponetitle, f.emailaddress as apponeemail, f." . $_GET['licst'] . " as apponelicst, f." . $_GET['licno'] . " as apponelicno, IF(f.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', f.id,'/',f.digsignature)) as apponedigsig, j.id as apptwoid, j.firstname as apptwofname, j.midname as apptwomname, j.lastname as apptwolname, IF(j.designation = '','', CONCAT(', ', j.designation)) as apptwodes, if(j.apptitle = 3,'',l.definition) as apptwotitle, j.emailaddress as apptwoemail, j." . $_GET['licst'] . " as apptwolicst, j." . $_GET['licno'] . " as apptwolicno, IF(j.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', j.id,'/',j.digsignature)) as apptwodigsig
from report a
join clients e
join appraisers f
join appraisers j
left join property b on b.FK_ReportID = a.id 
left join appraisalinfo c on c.FK_ReportID = a.id 
left join WFDictionary d on d.id = c.estate_appraised
left join WFDictionary h on h.id = f.apptitle
left join WFDictionary i on i.id = e.salutation
left join WFDictionary l on l.id = j.apptitle
left join WFDictionary m on m.id = c.prosstab_est_app
where a.id = " . $_GET['id'] . " and e.id = " . $_GET['client'] . " and f.id = " . $_GET['app'] . " and j.id = " . $_GET['apptwo'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/prospone-dual.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

    $templateProcessor->setValue( 'property_name', $record->property_name );
    $templateProcessor->setValue( 'address', $record->address );
    $templateProcessor->setValue( 'citystatezip', $record->citystatezip );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'DueDate', $record->DueDate );
    $templateProcessor->setValue( 'eff_date_value', $record->eff_date_value);
    $templateProcessor->setValue( 'estapp', $record->estapp);
    $templateProcessor->setValue( 'prosstab_dov', $record->prosstab_dov);
    $templateProcessor->setValue( 'stabestapp', $record->stabestapp);
    $templateProcessor->setValue( 'clifname', $record->clifname );
    $templateProcessor->setValue( 'clilname', $record->clilname );
    $templateProcessor->setValue( 'clides', $record->clides );
    $templateProcessor->setValue( 'clititle', $record->clititle );
    $templateProcessor->setValue( 'clicomp', $record->clicomp );
    $templateProcessor->setValue( 'cliadd', $record->cliadd );
    $templateProcessor->setValue( 'clicity', $record->clicity );
    $templateProcessor->setValue( 'clistate', $record->clistate );
    $templateProcessor->setValue( 'clizip', $record->clizip );
    $templateProcessor->setValue( 'clisuite', $record->clisuite );
    $templateProcessor->setValue( 'clisal', $record->clisal );   
    $templateProcessor->setValue( 'apponefname', $record->apponefname );
    $templateProcessor->setValue( 'apponemname', $record->apponemname );
    $templateProcessor->setValue( 'apponelname', $record->apponelname );
    $templateProcessor->setValue( 'apponedes', $record->apponedes );
    $templateProcessor->setValue( 'apponetitle', $record->apponetitle );
    $templateProcessor->setValue( 'apponeemail', $record->apponeemail );
    $templateProcessor->setValue( 'apponelicst', $record->apponelicst );
    $templateProcessor->setValue( 'apponelicno', $record->apponelicno );
    $templateProcessor->setValue( 'apptwofname', $record->apptwofname );
    $templateProcessor->setValue( 'apptwomname', $record->apptwomname );
    $templateProcessor->setValue( 'apptwolname', $record->apptwolname );
    $templateProcessor->setValue( 'apptwodes', $record->apptwodes );
    $templateProcessor->setValue( 'apptwotitle', $record->apptwotitle );
    $templateProcessor->setValue( 'apptwolicst', $record->apptwolicst );
    $templateProcessor->setValue( 'apptwolicno', $record->apptwolicno );
      
    $templateProcessor->setImageValue('digsigone', array('../../app_images/' => $record->apponedigsig, 'width' => 40, 'height' => 40));
    $templateProcessor->setImageValue('digsigtwo', array('../../app_images/' => $record->apptwodigsig, 'width' => 40, 'height' => 40));

  }
} else {
  echo "Error: " . $conn->error;
}

// close database connection
$conn->close();
// close database connection
//$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Propspective Transmittal Letter.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>