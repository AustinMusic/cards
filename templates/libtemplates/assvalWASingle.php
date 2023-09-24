<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, b.county, if(b.state = 'WA','Washington','Oregon') as state, b.assessedyear, c.mappage, c.taxlot, c.parcelno as parcel, CONCAT('$',FORMAT(c.marketland,0)) as landval, CONCAT('$',FORMAT(c.marketimp,0)) as impval, CONCAT('$',FORMAT(c.markettotal,0)) as totalval, CONCAT('$',FORMAT(c.annualtaxes,2)) as taxes
from report a
left join property b on b.FK_ReportID = a.id
left join assessedvalues c on c.FK_ReportID = a.id
where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/assvalWAsingle.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

      $templateProcessor->setValue( 'county', $record->county );
      $templateProcessor->setValue( 'mappage', $record->mappage );
      $templateProcessor->setValue( 'assessedyear', $record->assessedyear );
      $templateProcessor->setValue( 'taxlot', $record->taxlot );
      $templateProcessor->setValue( 'parcel', $record->parcel );
      $templateProcessor->setValue( 'landval', $record->landval );
      $templateProcessor->setValue( 'impval', $record->impval );
      $templateProcessor->setValue( 'totalval', $record->totalval );
      $templateProcessor->setValue( 'taxes', $record->taxes );

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
header( "Content-Disposition: attachment; filename=WA Assessed Values and Property Taxes.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>