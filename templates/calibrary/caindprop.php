<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, format(b.gross_land_sf,0) as grosssf, format(c.overall_gba,0) as gba
from report a
left join property b on b.FK_ReportID = a.id
left join building c on c.FK_ReportID = a.id
where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'caindprop.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

      $templateProcessor->setValue( 'reportname', $record->reportname );
      $templateProcessor->setValue( 'cappropname', $record->cappropname );
      $templateProcessor->setValue( 'grosssf', $record->grosssf );
      $templateProcessor->setValue( 'gba', $record->gba );
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
header( "Content-Disposition: attachment; filename=Cost Approach - Industrial Proposed.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>