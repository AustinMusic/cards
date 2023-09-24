<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, b.property_name, b.city, b.zoning_code, b.zoning_desc, format(b.gross_land_acre,2) as grossacre, format(b.gross_land_sf,0) as grosssf, IF(b.shape = 3,'  ', IF(b.shape in (83,92),c.definition, LCASE(c.definition))) as shape, IF(b.topography = 3,'  ',LCASE(d.definition)) as topography from report a left join property b on b.FK_ReportID = a.id join WFDictionary c on c.id = b.shape join WFDictionary d on d.id = b.topography where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/hbuoffcommexistrenov.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'city', $record->city );
    $templateProcessor->setValue( 'zoning_code', $record->zoning_code );
    $templateProcessor->setValue( 'zoning_desc', $record->zoning_desc );
    $templateProcessor->setValue( 'grosssf', $record->grosssf );
    $templateProcessor->setValue( 'grossacre', $record->grossacre );
    $templateProcessor->setValue( 'shape', $record->shape );
    $templateProcessor->setValue( 'topography', $record->topography );

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
header( "Content-Disposition: attachment; filename=H and B Use - Office-Comm Existing + Renov Expan Purchase.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>