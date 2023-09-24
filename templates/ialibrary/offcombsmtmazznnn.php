<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('offcombsmtmazznnn.xlsx');

\PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.eff_date_value as effdov, b.overall_nra as nra, b.total_basement_nra as basenra, b.floor_1_nra as footnra from appraisalinfo a left outer join building b on b.FK_ReportID = a.FK_ReportID where a.FK_ReportID = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
		$spreadsheet->getActiveSheet()->setCellValue('H6', $subprop->effdov);
		$spreadsheet->getActiveSheet()->setCellValue('D11', $subprop->nra);
		$spreadsheet->getActiveSheet()->setCellValue('V11', $subprop->basenra);
		$spreadsheet->getActiveSheet()->setCellValue('V10', $subprop->footnra);
	}
}
$spreadsheet->getActiveSheet()->getStyle('H6')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);
// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Office-Comm Bsmt-Mezz NNN Allocation.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>