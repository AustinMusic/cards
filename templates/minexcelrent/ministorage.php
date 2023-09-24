<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('ministorage.xlsx');
$ids = $_GET['id'];
include("../../../../includes/connect.php");
if ( $result = $conn->query( "SELECT a.id, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.year_built, c.last_renovation, e.lease_comment, e.confirm_1_source, e.relationship_1, e.confirm_by, e.confirm_date, e.mc_file_no, d.ms_total_units, d.ms_pct_vacant_unit, d.ms_vacancy_comment, d.ms_size_1, d.ms_size_2, d.ms_size_3, d.ms_size_4, d.ms_size_5, d.ms_size_6, d.ms_size_7, d.ms_size_8, d.ms_size_9, d.ms_size_10, d.ms_size_11, d.ms_size_12, d.ms_size_13, d.ms_size_14, d.ms_size_15, d.ms_size_16, d.ms_size_17, d.ms_size_18, d.ms_size_19, d.ms_size_20, d.ms_rent_1, d.ms_rent_2, d.ms_rent_3, d.ms_rent_4, d.ms_rent_5, d.ms_rent_6, d.ms_rent_7, d.ms_rent_8, d.ms_rent_9, d.ms_rent_10, d.ms_rent_11, d.ms_rent_12, d.ms_rent_13, d.ms_rent_14, d.ms_rent_15, d.ms_rent_16, d.ms_rent_17, d.ms_rent_18, d.ms_rent_19, d.ms_rent_20, d.ms_coded_access, d.ms_alarm, d.ms_heated_unit, d.ms_onsite_mgr, d.ms_concessions
FROM report a
JOIN property b on b.FK_ReportID = a.id
LEFT OUTER JOIN building c on c.FK_ReportID = a.id
LEFT OUTER JOIN selfstorage d on d.FK_ReportID = a.id
LEFT OUTER JOIN leasetrans e on e.FK_ReportID = a.id
WHERE a.id in (".implode(',',(array)$ids).") order by FIELD (a.id,".$ids.")" ) ) {
	
	PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
	$spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('11')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('18')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('19')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('20')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('21')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('22')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('23')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('24')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('25')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('26')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('27')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('28')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('29')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('30')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('31')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('32')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('33')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('34')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('35')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('36')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('37')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('43')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('117')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('118')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('123')->setRowHeight(-1);
	// display records if there are records to display
	if ( $result->num_rows > 0 ) {
		$column = 6;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getActiveSheet()
				->setCellValueByColumnAndRow($column, 46, $record->property_name)
->setCellValueByColumnAndRow($column, 47, $record->address)
->setCellValueByColumnAndRow($column, 48, $record->city)
->setCellValueByColumnAndRow($column, 49, $record->state)
->setCellValueByColumnAndRow($column, 50, "'" . $record->year_built)
->setCellValueByColumnAndRow($column, 51, $record->last_renovation)
->setCellValueByColumnAndRow($column, 52, $record->lease_comment)
->setCellValueByColumnAndRow($column, 53, $record->confirm_1_source)
->setCellValueByColumnAndRow($column, 54, $record->relationship_1)
->setCellValueByColumnAndRow($column, 55, $record->confirm_by)
->setCellValueByColumnAndRow($column, 56, $record->confirm_date)
->setCellValueByColumnAndRow($column, 124, "'" . $record->mc_file_no)
->setCellValueByColumnAndRow($column, 58, $record->ms_total_units)
->setCellValueByColumnAndRow($column, 59, $record->ms_pct_vacant_unit)
->setCellValueByColumnAndRow($column, 60, $record->ms_vacancy_comment)
->setCellValueByColumnAndRow($column, 61, $record->ms_size_1)
->setCellValueByColumnAndRow($column, 62, $record->ms_size_2)
->setCellValueByColumnAndRow($column, 63, $record->ms_size_3)
->setCellValueByColumnAndRow($column, 64, $record->ms_size_4)
->setCellValueByColumnAndRow($column, 65, $record->ms_size_5)
->setCellValueByColumnAndRow($column, 66, $record->ms_size_6)
->setCellValueByColumnAndRow($column, 67, $record->ms_size_7)
->setCellValueByColumnAndRow($column, 68, $record->ms_size_8)
->setCellValueByColumnAndRow($column, 69, $record->ms_size_9)
->setCellValueByColumnAndRow($column, 70, $record->ms_size_10)
->setCellValueByColumnAndRow($column, 71, $record->ms_size_11)
->setCellValueByColumnAndRow($column, 72, $record->ms_size_12)
->setCellValueByColumnAndRow($column, 73, $record->ms_size_13)
->setCellValueByColumnAndRow($column, 74, $record->ms_size_14)
->setCellValueByColumnAndRow($column, 75, $record->ms_size_15)
->setCellValueByColumnAndRow($column, 76, $record->ms_size_16)
->setCellValueByColumnAndRow($column, 77, $record->ms_size_17)
->setCellValueByColumnAndRow($column, 78, $record->ms_size_18)
->setCellValueByColumnAndRow($column, 79, $record->ms_size_19)
->setCellValueByColumnAndRow($column, 80, $record->ms_size_20)
->setCellValueByColumnAndRow($column, 81, $record->ms_rent_1)
->setCellValueByColumnAndRow($column, 82, $record->ms_rent_2)
->setCellValueByColumnAndRow($column, 83, $record->ms_rent_3)
->setCellValueByColumnAndRow($column, 84, $record->ms_rent_4)
->setCellValueByColumnAndRow($column, 85, $record->ms_rent_5)
->setCellValueByColumnAndRow($column, 86, $record->ms_rent_6)
->setCellValueByColumnAndRow($column, 87, $record->ms_rent_7)
->setCellValueByColumnAndRow($column, 88, $record->ms_rent_8)
->setCellValueByColumnAndRow($column, 89, $record->ms_rent_9)
->setCellValueByColumnAndRow($column, 90, $record->ms_rent_10)
->setCellValueByColumnAndRow($column, 91, $record->ms_rent_11)
->setCellValueByColumnAndRow($column, 92, $record->ms_rent_12)
->setCellValueByColumnAndRow($column, 93, $record->ms_rent_13)
->setCellValueByColumnAndRow($column, 94, $record->ms_rent_14)
->setCellValueByColumnAndRow($column, 95, $record->ms_rent_15)
->setCellValueByColumnAndRow($column, 96, $record->ms_rent_16)
->setCellValueByColumnAndRow($column, 97, $record->ms_rent_17)
->setCellValueByColumnAndRow($column, 98, $record->ms_rent_18)
->setCellValueByColumnAndRow($column, 99, $record->ms_rent_19)
->setCellValueByColumnAndRow($column, 100, $record->ms_rent_20)
->setCellValueByColumnAndRow($column, 101, $record->ms_coded_access)
->setCellValueByColumnAndRow($column, 102, $record->ms_alarm)
->setCellValueByColumnAndRow($column, 103, $record->ms_heated_unit)
->setCellValueByColumnAndRow($column, 104, $record->ms_onsite_mgr)
->setCellValueByColumnAndRow($column, 105, $record->ms_concessions);
			$column++;
		}
	}
// if there are no records in the database, display an alert message
	else {
		echo "No results to display!";
	}
        $spreadsheet->getActiveSheet()->getStyle('F56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('G56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('I56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('J56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('K56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('L56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('M56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('N56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('O56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
		$spreadsheet->getActiveSheet()->getStyle('F56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('G56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('H56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('I56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('J56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('K56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('L56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('M56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('N56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('O56')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
}
// show an error if there is an issue with the database query
else {
	echo "Error: " . $conn->error;
}

// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Mini-Storage Lease Comps.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>