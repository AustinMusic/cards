<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, UPPER(b.property_name) as cappropname, a.reportname, FORMAT(b.net_usable_acre,2) AS netacre, FORMAT(b.net_usable_sf,0) AS netsf, FORMAT(b.primary_sf,0) AS primsf, FORMAT(b.surplus_sf,0) AS sursf from report a left join property b on b.FK_ReportID = a.id where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'indcomprimsur.docx' );
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'netacre', $record->netacre );
    $templateProcessor->setValue( 'netsf', $record->netsf );
    $templateProcessor->setValue( 'primsf', $record->primsf );
    $templateProcessor->setValue( 'sursf', $record->sursf );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Indust-Comm Land Value - Primary Surplus Proposed.docx" );
readfile( $temp_file );
unlink( $temp_file );
?>