<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, UPPER(b.property_name) as cappropname, a.reportname, FORMAT(b.net_usable_acre,2) AS netacre, FORMAT(b.excess_acre,2) AS excessacre, FORMAT(b.primary_acre,2) AS primacre, d.no_units from report a left join property b on b.FK_ReportID = a.id join appraisalinfo c on c.FK_ReportID = a.id left join building d on d.FK_ReportID = a.id where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'aptlandval.docx' );
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'netacre', $record->netacre );
    $templateProcessor->setValue( 'no_units', $record->no_units );
    $templateProcessor->setValue( 'excessacre', $record->excessacre );
    $templateProcessor->setValue( 'primacre', $record->primacre );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Apartment Land Valuation.docx" );
readfile( $temp_file );
unlink( $temp_file );
?>