<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mobilehome.xlsx');
$ids = $_GET['id'];
$job = $_GET['job'];
include("../../../../includes/connect.php");
if ( $result = $conn->query( "SELECT a.id, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.year_built, c.last_renovation, f.definition as park_type, e.lease_comment, e.confirm_1_source, e.relationship_1, CONCAT(ai.firstname,IF(ai.midname = '',' ',CONCAT(' ',ai.midname,' ')),ai.lastname, IF(ai.designation = '','',CONCAT(', ',ai.designation))) as confirm_by, e.confirm_date, e.mc_file_no, d.mf_total_spaces, d.mf_pct_vacancy, d.mf_sw_low_rent, d.mf_sw_high_rent, d.mf_sw_avg_rent, d.mf_dw_low_rent, d.mf_dw_high_rent, d.mf_dw_avg_rent, d.mf_tw_low_rent, d.mf_tw_high_rent, d.mf_tw_avg_rent, d.mf_rv_low_rent, d.mf_rv_high_rent, d.mf_rv_avg_rent, d.mf_last_increase, d.mf_landlord_water, d.mf_landlord_hot_water, d.mf_landlord_trash, d.mf_landlord_internet, d.mf_landlord_rpt, d.mf_landlord_insurance, d.mf_landlord_heat, d.mf_landlord_gas, d.mf_landlord_sewer, d.mf_landlord_cable, d.mf_landlord_cam, d.mf_landlord_mgmt_fees, d.mf_club, d.mf_exercise, d.mf_bbq, d.mf_sports, d.mf_spa, d.mf_rvstor, d.mf_pool, d.mf_laund, d.mf_playg, d.mf_sauna, d.mf_sec, d.mf_exstor, d.mf_carport, d.mf_shed, d.mf_total_avg_rent, mf_amount
FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN multifamily d on d.FK_ReportID = a.id LEFT OUTER JOIN leasetrans e on e.FK_ReportID = a.id LEFT OUTER JOIN appraisers ai on ai.id = e.confirm1 LEFT OUTER JOIN WFDictionary f on f.id = b.park_type 
WHERE a.id in (".implode(',',(array)$ids).") order by FIELD (a.id,".$ids.")" ) ) {
	
	PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
	$spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('129')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('163')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('164')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('169')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->setCellValue('Y133', $job);
	// display records if there are records to display
	if ( $result->num_rows > 0 ) {
		$column = 5;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getActiveSheet()
->setCellValueByColumnAndRow($column, 50, $record->property_name)
->setCellValueByColumnAndRow($column, 51, $record->address)
->setCellValueByColumnAndRow($column, 52, $record->city)
->setCellValueByColumnAndRow($column, 53, $record->state)
->setCellValueByColumnAndRow($column, 54, "'" . $record->year_built)
->setCellValueByColumnAndRow($column, 56, $record->last_renovation)
->setCellValueByColumnAndRow($column, 57, $record->park_type)
->setCellValueByColumnAndRow($column, 58, $record->mf_total_spaces)
->setCellValueByColumnAndRow($column, 59, $record->mf_pct_vacancy)
->setCellValueByColumnAndRow($column, 60, $record->confirm_date)
->setCellValueByColumnAndRow($column, 61, $record->mf_sw_low_rent)
->setCellValueByColumnAndRow($column, 62, $record->mf_sw_high_rent)
->setCellValueByColumnAndRow($column, 63, $record->mf_sw_avg_rent)
->setCellValueByColumnAndRow($column, 70, $record->mf_dw_low_rent)
->setCellValueByColumnAndRow($column, 71, $record->mf_dw_high_rent)
->setCellValueByColumnAndRow($column, 72, $record->mf_dw_avg_rent)
->setCellValueByColumnAndRow($column, 79, $record->mf_tw_low_rent)
->setCellValueByColumnAndRow($column, 80, $record->mf_tw_high_rent)
->setCellValueByColumnAndRow($column, 81, $record->mf_tw_avg_rent)
->setCellValueByColumnAndRow($column, 88, $record->mf_rv_low_rent)
->setCellValueByColumnAndRow($column, 89, $record->mf_rv_high_rent)
->setCellValueByColumnAndRow($column, 90, $record->mf_rv_avg_rent)
->setCellValueByColumnAndRow($column, 97, $record->mf_last_increase)
->setCellValueByColumnAndRow($column, 98, $record->mf_landlord_water)
->setCellValueByColumnAndRow($column, 99, $record->mf_landlord_hot_water)
->setCellValueByColumnAndRow($column, 100, $record->mf_landlord_trash)
->setCellValueByColumnAndRow($column, 101, $record->mf_landlord_internet)
->setCellValueByColumnAndRow($column, 102, $record->mf_landlord_rpt)
->setCellValueByColumnAndRow($column, 103, $record->mf_landlord_insurance)
->setCellValueByColumnAndRow($column, 104, $record->mf_landlord_heat)
->setCellValueByColumnAndRow($column, 105, $record->mf_landlord_gas)
->setCellValueByColumnAndRow($column, 106, $record->mf_landlord_sewer)
->setCellValueByColumnAndRow($column, 107, $record->mf_landlord_cable)
->setCellValueByColumnAndRow($column, 108, $record->mf_landlord_cam)
->setCellValueByColumnAndRow($column, 109, $record->mf_landlord_mgmt_fees)
->setCellValueByColumnAndRow($column, 110, $record->mf_club)
->setCellValueByColumnAndRow($column, 111, $record->mf_exercise)
->setCellValueByColumnAndRow($column, 112, $record->mf_bbq)
->setCellValueByColumnAndRow($column, 113, $record->mf_sports)
->setCellValueByColumnAndRow($column, 114, $record->mf_spa)
->setCellValueByColumnAndRow($column, 115, $record->mf_rvstor)
->setCellValueByColumnAndRow($column, 116, $record->mf_pool)
->setCellValueByColumnAndRow($column, 117, $record->mf_laund)
->setCellValueByColumnAndRow($column, 118, $record->mf_playg)
->setCellValueByColumnAndRow($column, 119, $record->mf_sauna)
->setCellValueByColumnAndRow($column, 120, $record->mf_sec)
->setCellValueByColumnAndRow($column, 121, $record->mf_exstor)
->setCellValueByColumnAndRow($column, 122, $record->mf_carport)
->setCellValueByColumnAndRow($column, 123, $record->mf_shed)
->setCellValueByColumnAndRow($column, 124, $record->mf_total_avg_rent)
->setCellValueByColumnAndRow($column, 125, $record->mf_amount)
->setCellValueByColumnAndRow($column, 126, $record->confirm_1_source)
->setCellValueByColumnAndRow($column, 127, $record->relationship_1)
->setCellValueByColumnAndRow($column, 128, $record->confirm_by)
->setCellValueByColumnAndRow($column, 129, $record->lease_comment)
->setCellValueByColumnAndRow($column, 130, "'" . $record->mc_file_no);
			$column++;
		}
        
	}
// if there are no records in the database, display an alert message
	else {
		echo "No results to display!";
	}
        $spreadsheet->getActiveSheet()->getStyle('E115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('F115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('G115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('I115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('J115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('K115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('L115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('M115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('N115')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('E97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('F97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('G97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('I97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('J97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('K97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('L97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('M97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('N97')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
}
// show an error if there is an issue with the database query
else {
	echo "Error: " . $conn->error;
}

// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Mobile Home Park Leases.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>