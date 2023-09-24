<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select county, assessedyear from property where FK_ReportID = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/assvalHistoric.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

        $templateProcessor->setValue( 'county', $record->county );
      $templateProcessor->setValue( 'assessedyear', $record->assessedyear );

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
header( "Content-Disposition: attachment; filename=OR Historic Tax Freeze Subsection.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>