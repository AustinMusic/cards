<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, UPPER(b.property_name) as cappropname, a.reportname, FORMAT(b.net_usable_acre,2) AS netacre, b.zoning_code as zone from report a left join property b on b.FK_ReportID = a.id where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'reslandval.docx' );
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'netacre', $record->netacre );
    $templateProcessor->setValue( 'zone', $record->zone );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Indust-Residential Land Valuation.docx" );
readfile( $temp_file );
unlink( $temp_file );
?>