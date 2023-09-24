<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('indstysnnn.xlsx');

\PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.eff_date_value as effdov, b.overall_nra as nra, b.office_bo_sf as officebo, c.surplus_sf as surpsf from appraisalinfo a left outer join building b on b.FK_ReportID = a.FK_ReportID left outer join property c on c.FK_ReportID = a.FK_ReportID where a.FK_ReportID = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
		$spreadsheet->getActiveSheet()->setCellValue('H7', $subprop->effdov);
		$spreadsheet->getActiveSheet()->setCellValue('F14', $subprop->nra);
		$spreadsheet->getActiveSheet()->setCellValue('F15', $subprop->officebo);
		$spreadsheet->getActiveSheet()->setCellValue('F20', $subprop->surpsf);
	}
}
$spreadsheet->getActiveSheet()->getStyle('H7')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX15);
// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Industrial_Single-Tenant_Yard Storage_NNN.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>