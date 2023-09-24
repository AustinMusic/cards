<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('mobilehome.xlsx');
$ids = $_GET['id'];
include("../../../../includes/connect.php");
if ( $result = $conn->query( "SELECT a.id, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.year_built, c.last_renovation, b.park_type, e.lease_comment, e.confirm_1_source, e.relationship_1, e.confirm_by, e.confirm_date, e.mc_file_no, d.mf_total_spaces, d.mf_pct_vacancy, d.mf_sw_low_rent, d.mf_sw_high_rent, d.mf_sw_avg_rent, d.mf_dw_low_rent, d.mf_dw_high_rent, d.mf_dw_avg_rent, d.mf_tw_low_rent, d.mf_tw_high_rent, d.mf_tw_avg_rent, d.mf_rv_low_rent, d.mf_rv_high_rent, d.mf_rv_avg_rent, d.mf_last_increase, d.mf_landlord_water, d.mf_landlord_hot_water, d.mf_landlord_trash, d.mf_landlord_internet, d.mf_landlord_rpt, d.mf_landlord_insurance, d.mf_landlord_heat, d.mf_landlord_gas, d.mf_landlord_sewer, d.mf_landlord_cable, d.mf_landlord_cam, d.mf_landlord_mgmt_fees, d.mf_club, d.mf_exercise, d.mf_bbq, d.mf_sports, d.mf_spa, d.mf_rvstor, d.mf_pool, d.mf_laund, d.mf_playg, d.mf_sauna, d.mf_sec, d.mf_exstor, d.mf_carport, d.mf_shed, d.mf_total_avg_rent, mf_amount
FROM report a
JOIN property b on b.FK_ReportID = a.id
LEFT OUTER JOIN building c on c.FK_ReportID = a.id
LEFT OUTER JOIN multifamily d on d.FK_ReportID = a.id
LEFT OUTER JOIN leasetrans e on e.FK_ReportID = a.id
WHERE a.id in (".implode(',',(array)$ids).") order by FIELD (a.id,".$ids.")" ) ) {
	
	PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
	$spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('163')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('164')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('169')->setRowHeight(-1);
	// display records if there are records to display
	if ( $result->num_rows > 0 ) {
		$column = 5;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getActiveSheet()
				->setCellValueByColumnAndRow($column, 104, $record->property_name)
->setCellValueByColumnAndRow($column, 105, $record->address)
->setCellValueByColumnAndRow($column, 106, $record->city)
->setCellValueByColumnAndRow($column, 107, $record->state)
->setCellValueByColumnAndRow($column, 108, "'" . $record->year_built)
->setCellValueByColumnAndRow($column, 109, $record->last_renovation)
->setCellValueByColumnAndRow($column, 110, $record->park_type)
->setCellValueByColumnAndRow($column, 111, $record->lease_comment)
->setCellValueByColumnAndRow($column, 112, $record->confirm_1_source)
->setCellValueByColumnAndRow($column, 113, $record->relationship_1)
->setCellValueByColumnAndRow($column, 114, $record->confirm_by)
->setCellValueByColumnAndRow($column, 115, $record->confirm_date)
->setCellValueByColumnAndRow($column, 170, "'" . $record->mc_file_no)
->setCellValueByColumnAndRow($column, 117, $record->mf_total_spaces)
->setCellValueByColumnAndRow($column, 118, $record->mf_pct_vacancy)
->setCellValueByColumnAndRow($column, 119, $record->mf_sw_low_rent)
->setCellValueByColumnAndRow($column, 120, $record->mf_sw_high_rent)
->setCellValueByColumnAndRow($column, 121, $record->mf_sw_avg_rent)
->setCellValueByColumnAndRow($column, 122, $record->mf_dw_low_rent)
->setCellValueByColumnAndRow($column, 123, $record->mf_dw_high_rent)
->setCellValueByColumnAndRow($column, 124, $record->mf_dw_avg_rent)
->setCellValueByColumnAndRow($column, 125, $record->mf_tw_low_rent)
->setCellValueByColumnAndRow($column, 126, $record->mf_tw_high_rent)
->setCellValueByColumnAndRow($column, 127, $record->mf_tw_avg_rent)
->setCellValueByColumnAndRow($column, 128, $record->mf_rv_low_rent)
->setCellValueByColumnAndRow($column, 129, $record->mf_rv_high_rent)
->setCellValueByColumnAndRow($column, 130, $record->mf_rv_avg_rent)
->setCellValueByColumnAndRow($column, 131, $record->mf_last_increase)
->setCellValueByColumnAndRow($column, 132, $record->mf_landlord_water)
->setCellValueByColumnAndRow($column, 133, $record->mf_landlord_hot_water)
->setCellValueByColumnAndRow($column, 134, $record->mf_landlord_trash)
->setCellValueByColumnAndRow($column, 135, $record->mf_landlord_internet)
->setCellValueByColumnAndRow($column, 136, $record->mf_landlord_rpt)
->setCellValueByColumnAndRow($column, 137, $record->mf_landlord_insurance)
->setCellValueByColumnAndRow($column, 138, $record->mf_landlord_heat)
->setCellValueByColumnAndRow($column, 139, $record->mf_landlord_gas)
->setCellValueByColumnAndRow($column, 140, $record->mf_landlord_sewer)
->setCellValueByColumnAndRow($column, 141, $record->mf_landlord_cable)
->setCellValueByColumnAndRow($column, 142, $record->mf_landlord_cam)
->setCellValueByColumnAndRow($column, 143, $record->mf_landlord_mgmt_fees)
->setCellValueByColumnAndRow($column, 144, $record->mf_club)
->setCellValueByColumnAndRow($column, 145, $record->mf_exercise)
->setCellValueByColumnAndRow($column, 146, $record->mf_bbq)
->setCellValueByColumnAndRow($column, 147, $record->mf_sports)
->setCellValueByColumnAndRow($column, 148, $record->mf_spa)
->setCellValueByColumnAndRow($column, 149, $record->mf_rvstor)
->setCellValueByColumnAndRow($column, 150, $record->mf_pool)
->setCellValueByColumnAndRow($column, 151, $record->mf_laund)
->setCellValueByColumnAndRow($column, 152, $record->mf_playg)
->setCellValueByColumnAndRow($column, 153, $record->mf_sauna)
->setCellValueByColumnAndRow($column, 154, $record->mf_sec)
->setCellValueByColumnAndRow($column, 155, $record->mf_exstor)
->setCellValueByColumnAndRow($column, 156, $record->mf_carport)
->setCellValueByColumnAndRow($column, 157, $record->mf_shed)
->setCellValueByColumnAndRow($column, 158, $record->mf_total_avg_rent)
->setCellValueByColumnAndRow($column, 159, $record->mf_amount);
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
}
// show an error if there is an issue with the database query
else {
	echo "Error: " . $conn->error;
}

// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Mobile Park Lease Comps.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>