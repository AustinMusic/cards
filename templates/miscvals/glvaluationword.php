<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, FORMAT(b.net_usable_acre,2) AS net_usable_acre, FORMAT(b.net_usable_sf,0) AS net_usable_sf, date_format(c.eff_date_value,'%M %e, %Y') as eff_date_value, date_format(c.inspect_date,'%M %e, %Y') as inspect_date from report a left join property b on b.FK_ReportID = a.id join appraisalinfo c on c.FK_ReportID = a.id where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'glvaluationword.docx' );
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'cappropname', $record->cappropname );  
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'eff_date_value', $record->eff_date_value );
    $templateProcessor->setValue( 'netacre', $record->net_usable_acre );
    $templateProcessor->setValue( 'netsf', $record->net_usable_sf );
    $templateProcessor->setValue( 'inspect_date', $record->inspect_date );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Ground Lease Valuation.docx" );
readfile( $temp_file );
unlink( $temp_file );
?>