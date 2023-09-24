<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname from report a left join property b on b.FK_ReportID = a.id where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'insvalrepcost.docx' );
  while ( $record = $result->fetch_object() ) {
      $templateProcessor->setValue( 'cappropname', $record->cappropname );  
    $templateProcessor->setValue( 'reportname', $record->reportname );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Insurable Replacement Cost Estimate.docx" );
readfile( $temp_file );
unlink( $temp_file );

?>