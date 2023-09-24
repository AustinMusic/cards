<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('insurvalomb.xlsx');

\PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.property_name as propname, b.overall_nra as nra, b.overall_gba as gba from property a left outer join building b on b.FK_ReportID = a.FK_ReportID where a.FK_ReportID = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
		$spreadsheet->getActiveSheet()->setCellValue('I5', $subprop->propname);
		$spreadsheet->getActiveSheet()->setCellValue('I10', $subprop->gba);
	}
}
// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Insurable Value - Office-Medical-Bank.xlsx"');
header('Cache-Control: max-age=0');
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>