<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, f.id as apponeid, f.firstname as apponefname, f.midname as apponemname, f.lastname as apponelname, IF(f.designation = '','', CONCAT(', ', f.designation)) as apponedes, if(f.apptitle = 3,'',h.definition) as apponetitle, f.emailaddress as apponeemail, f." . $_GET['licst'] . " as apponelicst, f." . $_GET['licno'] . " as apponelicno, IF(f.digsignature = '','../../app_images/no-photo.jpg',CONCAT('../../app_images/', f.id,'/',f.digsignature)) as apponedigsig
from report a
join appraisers f
left join property b on b.FK_ReportID = a.id
left join WFDictionary h on h.id = f.apptitle
where a.id = " . $_GET['id'] . " and f.id = " . $_GET['app'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/certsing.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'apponefname', $record->apponefname );
    $templateProcessor->setValue( 'apponemname', $record->apponemname );
    $templateProcessor->setValue( 'apponelname', $record->apponelname );
    $templateProcessor->setValue( 'apponedes', $record->apponedes );
    $templateProcessor->setValue( 'apponetitle', $record->apponetitle );
    $templateProcessor->setValue( 'apponelicst', $record->apponelicst );
    $templateProcessor->setValue( 'apponelicno', $record->apponelicno );      
    $templateProcessor->setImageValue('digsigone', array('../../app_images/' => $record->apponedigsig, 'width' => 40, 'height' => 40));

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
header( "Content-Disposition: attachment; filename=Appraiser Certification.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>