<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, c.submarket
from report a
left join property b on b.FK_ReportID = a.id
left join submarket c on c.id = b.submarkid
where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'indmtnnnabsolute.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

      $templateProcessor->setValue( 'reportname', $record->reportname );
      $templateProcessor->setValue( 'cappropname', $record->cappropname );
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
header( "Content-Disposition: attachment; filename=Income Approach - Industrial Multi-Tenant - NNN Absolute.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>