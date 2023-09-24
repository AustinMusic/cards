<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, date_format(c.inspect_date,'%M %e, %Y') as inspect_date, format(d.mf_total_spaces,0) as spaces
from report a
left join property b on b.FK_ReportID = a.id
join appraisalinfo c on c.FK_ReportID = a.id
join multifamily d on d.FK_ReportID = a.id
where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'mobhome.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

      $templateProcessor->setValue( 'reportname', $record->reportname );
      $templateProcessor->setValue( 'cappropname', $record->cappropname );
      $templateProcessor->setValue( 'inspect_date', $record->inspect_date );
      $templateProcessor->setValue( 'spaces', $record->spaces );
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
header( "Content-Disposition: attachment; filename=Income Approach - MHP.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>