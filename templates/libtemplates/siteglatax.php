<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, concat(b.streetnumber,' ',b.streetname) as address, concat(b.city,', ',b.state,' ',b.zip_code) as cityst, b.city, b.county, if(b.state = 'ID','Idaho',if(b.state = 'WA','Washington','Oregon')) as state, format(b.gross_land_acre,2) as glaacre, format(b.gross_land_sf,0) as glasf, format(b.unusable_acre,2) as unacre, format(b.unusable_sf,0) as unsf, format(b.net_usable_acre,2) as useacre, format(net_usable_sf,0) as usesf, c.definition as shape
from report a
left join property b on b.FK_ReportID = a.id
left join WFDictionary c on c.id = b.shape
where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/siteglatax.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'address', $record->address );
    $templateProcessor->setValue( 'cityst', $record->cityst );
    $templateProcessor->setValue( 'city', $record->city );
    $templateProcessor->setValue( 'county', $record->county );
    $templateProcessor->setValue( 'state', $record->state );
    $templateProcessor->setValue( 'glaacre', $record->glaacre );
    $templateProcessor->setValue( 'glasf', $record->glasf );
    $templateProcessor->setValue( 'shape', $record->shape );

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
header( "Content-Disposition: attachment; filename=Site Description - Gross Land Area - Single Tax Lot.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>