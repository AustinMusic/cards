<?php
require '../src/vendor/autoload.php';
$ids = $_GET['id'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('groundleasewb.xlsx');

PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.property_name as propname, b.overall_nra as nra, b.overall_gba as gba from property a left outer join building b on b.FK_ReportID = a.FK_ReportID where a.FK_ReportID = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
		$spreadsheet->getActiveSheet()->setCellValue('H4', $subprop->propname);
		$spreadsheet->getActiveSheet()->setCellValue('G2', $subprop->nra);
	}
}

if ( $result = $conn->query("SELECT * FROM assessedvalues WHERE FK_ReportID = " . $ids . "" ) ) {
	if ( $result->num_rows > 0 ) {
		$row = 5;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getSheet(3)
			->setCellValueByColumnAndRow(2, $row, $record->parcelno)
			->setCellValueByColumnAndRow(3, $row, $record->marketland)
			->setCellValueByColumnAndRow(4, $row, $record->marketimp)
			->setCellValueByColumnAndRow(6, $row, $record->measure50)
			->setCellValueByColumnAndRow(7, $row, $record->annualtaxes)
			->setCellValueByColumnAndRow(9, $row, $record->mappage)
			->setCellValueByColumnAndRow(11, $row, $record->taxlot)
			->setCellValueByColumnAndRow(13, $row, $record->assessedglasf);
			$row++;
		}
	} else {
		echo "Error: " . $conn->error;
	}
}
// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="GroundLease Workbook.xlsx"');
header('Cache-Control: max-age=0');
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>