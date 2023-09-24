<?php
require_once( "../vendor/autoload.php" );
include( "../../../../includes/connect.php" );
if ( $result = $conn->query( "select a.id, a.reportname, UPPER(b.property_name) as cappropname, b.property_name, m.definition as bclass, format(c.overall_nra,0) as nra, format(c.overall_gba,0) as gba, format(c.floor_1_gba,0) as footprint, format(c.floor_1_nra,0) as f1nra, format(c.floor_2_gba,0) as floor2, format(c.total_basement_gba,0) as basegba, format(c.floor_2_nra,0) as floor2nra, format(c.total_basement_nra,0) as basenra, c.parking_stalls as pspaces, c.parking_ratio as pratio, c.year_built as yearb, concat(c.year_built, CONCAT(' ',c.last_renovation)) as yearbuilt, concat(c.site_cover_overall,'%') as sitegba, concat(c.site_cover_primary,'%') as siteprim, c.land_build_ratio_primary as landprim, c.land_build_ratio_overall as landover, format(b.gross_land_sf,0) as glasf, format(b.primary_sf,0) as primsf
from report a
left join property b on b.FK_ReportID = a.id
join building c on c.FK_ReportID = a.id
join proptypedetails d on d.FK_ReportID = a.id
join WFDictionary m on m.id = c.building_class
where a.id = " . $_GET['id'] . "" ) ) {

  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( '../output/libtemps/idmtoff.docx' );

  // Creating the new document...
  while ( $record = $result->fetch_object() ) {

    $templateProcessor->setValue( 'cappropname', $record->cappropname );
    $templateProcessor->setValue( 'reportname', $record->reportname );
    $templateProcessor->setValue( 'property_name', $record->property_name );
    $templateProcessor->setValue( 'bclass', $record->bclass );
    $templateProcessor->setValue( 'nra', $record->nra );
    $templateProcessor->setValue( 'gba', $record->gba );
    $templateProcessor->setValue( 'footprint', $record->footprint );
    $templateProcessor->setValue( 'f1nra', $record->f1nra );
    $templateProcessor->setValue( 'floor2', $record->floor2 );
    $templateProcessor->setValue( 'floor2nra', $record->floor2nra );
    $templateProcessor->setValue( 'basegba', $record->basegba );
    $templateProcessor->setValue( 'basenra', $record->basenra );
    $templateProcessor->setValue( 'pspaces', $record->pspaces );
    $templateProcessor->setValue( 'pratio', $record->pratio );
    $templateProcessor->setValue( 'yearb', $record->yearb );
    $templateProcessor->setValue( 'yearbuilt', $record->yearbuilt );
    $templateProcessor->setValue( 'siteprim', $record->siteprim );
    $templateProcessor->setValue( 'landprim', $record->landprim );
    $templateProcessor->setValue( 'glasf', $record->glasf );
    $templateProcessor->setValue( 'primsf', $record->primsf );

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
header( "Content-Disposition: attachment; filename=Improv Descrip - Multi-Tenant Office.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file

?>