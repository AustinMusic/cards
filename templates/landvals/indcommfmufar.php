<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, UPPER(b.property_name) as cappropname, a.reportname, FORMAT(b.net_usable_sf,0) AS netsf, b.floor_area_ratio as far, FORMAT(b.max_floor_area,0) AS maxfar, date_format(c.eff_date_value,'%M %e, %Y') as effdov from report a left join property b on b.FK_ReportID = a.id join appraisalinfo c on c.FK_ReportID = a.id where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'indcommfmufar.docx' );
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'netsf', $record->netsf );
    $templateProcessor->setValue( 'far', $record->far );
    $templateProcessor->setValue( 'maxfar', $record->maxfar );
    $templateProcessor->setValue( 'effdov', $record->effdov );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Indust-Comm-MF-MU FAR Land Valuation.docx" );
readfile( $temp_file );
unlink( $temp_file );
?>