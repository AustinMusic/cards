<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, DATE_FORMAT(c.eff_date_value,'%M %e, %Y') as eff_date_value from report a 
left join property b on b.FK_ReportID = a.id 
left join appraisalinfo c on c.FK_ReportID = a.id 
where a.id = " . $_GET['id'] . "" ) ) {
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/recstabasisleased.docx' );
  while ( $record = $result->fetch_object() ) {
    $templateProcessor->setValue( 'cappropname', $record->cappropname );  
    $templateProcessor->setValue( 'reportname', $record->reportname ); 
    $templateProcessor->setValue( 'eff_date_value', $record->eff_date_value );
  }
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
$temp_file = tempnam( sys_get_temp_dir(), 'PHPWord' );
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Reconcliation - Stabilized As Is - Leased Fee.docx" );
readfile( $temp_file );
unlink( $temp_file );

?>