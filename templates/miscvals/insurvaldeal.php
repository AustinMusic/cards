<?php
require '../src/vendor/autoload.php';
$ids = $_GET['id'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('insurvaldeal.xlsx');

\PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
if ( $result = $conn->query("SELECT * FROM assessedvalues WHERE FK_ReportID = " . $ids . "" ) ) {
	if ( $result->num_rows > 0 ) {
		$row = 5;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getSheet(1)
			->setCellValueByColumnAndRow(2, $row, $record->parcelno)
			->setCellValueByColumnAndRow(3, $row, $record->marketland)
			->setCellValueByColumnAndRow(4, $row, $record->marketimp)
			->setCellValueByColumnAndRow(6, $row, $record->measure50)
			->setCellValueByColumnAndRow(7, $row, $record->annualtaxes)
			->setCellValueByColumnAndRow(10, $row, $record->mappage)
			->setCellValueByColumnAndRow(12, $row, $record->taxlot)
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
header('Content-Disposition: attachment;filename="Insurable Value - Dealership.xlsx"');
header('Cache-Control: max-age=0');
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>