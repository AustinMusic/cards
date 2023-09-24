<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('eaosh.xlsx');


\PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.property_name as propname, b.overall_nra as nra, b.year_built as yearbt, b.last_renovation as reno from property a LEFT OUTER JOIN building b on b.FK_ReportID = a.FK_ReportID where a.FK_ReportID = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
		$spreadsheet->getActiveSheet()->setCellValue('H7', $subprop->nra);
		$spreadsheet->getActiveSheet()->setCellValue('B7', $subprop->propname);
		$spreadsheet->getActiveSheet()->setCellValue('F5', "'" . $subprop->yearbt);
		$spreadsheet->getActiveSheet()->setCellValue('G5', $subprop->reno);
	}
}
// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Expense_Analysis-Office_Subject_Historical.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>