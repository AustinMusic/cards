<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('apartment.xlsx');
$ids = $_GET['id'];
$job = $_GET['job'];
include("../../../../includes/connect.php");
if ( $result = $conn->query( "SELECT a.id, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.year_built, c.last_renovation, d.mf_no_unit as no_units, d.mf_vacant_unit, e.concessions_desc, d.mf_one_type, d.mf_one_sf, d.mf_one_rent, d.mf_two_type, d.mf_two_sf, d.mf_two_rent, d.mf_three_type, d.mf_three_sf, d.mf_three_rent, d.mf_four_type, d.mf_four_sf, d.mf_four_rent, d.mf_five_type, d.mf_five_sf, d.mf_five_rent, d.mf_six_type, d.mf_six_sf, d.mf_six_rent, d.mf_seven_type, d.mf_seven_sf, d.mf_seven_rent, d.mf_eight_type, d.mf_eight_sf, d.mf_eight_rent, d.mf_nine_type, d.mf_nine_sf, d.mf_nine_rent, d.mf_ten_type, d.mf_ten_sf, d.mf_ten_rent, d.mf_landlord_water, d.mf_landlord_sewer, d.mf_landlord_hot_water, d.mf_landlord_heat, d.mf_landlord_gas, d.mf_landlord_trash, d.mf_landlord_internet, d.mf_landlord_cable, d.mf_non_refund, f.definition as mf_parking_type, d.mf_washdry, d.mf_fireplace, d.mf_micro, d.mf_patio, d.mf_dish, d.mf_dispo, d.mf_vault, d.mf_exstor, d.mf_club, d.mf_playg, d.mf_bbq, d.mf_bigtv, d.mf_sports, d.mf_laund, d.mf_pool, d.mf_busi, d.mf_sec, d.mf_exercise, d.mf_spa, d.mf_wd_hookup, d.mf_other_amenities, e.lease_comment, e.confirm_1_source, e.relationship_1, CONCAT(ai.firstname,IF(ai.midname = '',' ',CONCAT(' ',ai.midname,' ')),ai.lastname, IF(ai.designation = '','',CONCAT(', ',ai.designation))) as confirm_by, e.confirm_date, e.mc_file_no, d.mf_one_price_sf, d.mf_two_price_sf, d.mf_three_price_sf, d.mf_four_price_sf, d.mf_five_price_sf, d.mf_six_price_sf, d.mf_seven_price_sf, d.mf_eight_price_sf, d.mf_nine_price_sf, d.mf_ten_price_sf
FROM report a
JOIN property b on b.FK_ReportID = a.id
LEFT OUTER JOIN building c on c.FK_ReportID = a.id
LEFT OUTER JOIN multifamily d on d.FK_ReportID = a.id
LEFT OUTER JOIN leasetrans e on e.FK_ReportID = a.id
LEFT OUTER JOIN appraisers ai on ai.id = e.confirm1 
LEFT OUTER JOIN WFDictionary f on f.id = d.mf_parking_type
WHERE a.id in (".implode(',',(array)$ids).") order by FIELD (a.id,".$ids.")" ) ) {
	
	PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
	$spreadsheet->getActiveSheet()->getRowDimension('4')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('5')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('13')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('29')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('40')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('52')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('155')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('156')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('157')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('161')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->setCellValue('Y153', $job);
	// display records if there are records to display
	if ( $result->num_rows > 0 ) {
		$column = 5;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getActiveSheet()
				->setCellValueByColumnAndRow($column, 55, $record->property_name)
->setCellValueByColumnAndRow($column, 56, $record->address)
->setCellValueByColumnAndRow($column, 57, $record->city)
->setCellValueByColumnAndRow($column, 58, $record->state)
->setCellValueByColumnAndRow($column, 59, "'" .$record->year_built)
->setCellValueByColumnAndRow($column, 60, $record->last_renovation)
->setCellValueByColumnAndRow($column, 61, $record->no_units)
->setCellValueByColumnAndRow($column, 62, $record->mf_vacant_unit)
->setCellValueByColumnAndRow($column, 63, $record->concessions_desc)
->setCellValueByColumnAndRow($column, 64, $record->mf_one_type)
->setCellValueByColumnAndRow($column, 65, $record->mf_two_type)
->setCellValueByColumnAndRow($column, 66, $record->mf_three_type)
->setCellValueByColumnAndRow($column, 67, $record->mf_four_type)
->setCellValueByColumnAndRow($column, 68, $record->mf_five_type)
->setCellValueByColumnAndRow($column, 69, $record->mf_six_type)
->setCellValueByColumnAndRow($column, 70, $record->mf_seven_type)
->setCellValueByColumnAndRow($column, 71, $record->mf_eight_type)
->setCellValueByColumnAndRow($column, 72, $record->mf_nine_type)
->setCellValueByColumnAndRow($column, 73, $record->mf_ten_type)
->setCellValueByColumnAndRow($column, 74, $record->mf_one_sf)
->setCellValueByColumnAndRow($column, 75, $record->mf_two_sf)
->setCellValueByColumnAndRow($column, 76, $record->mf_three_sf)
->setCellValueByColumnAndRow($column, 77, $record->mf_four_sf)
->setCellValueByColumnAndRow($column, 78, $record->mf_five_sf)
->setCellValueByColumnAndRow($column, 79, $record->mf_six_sf)
->setCellValueByColumnAndRow($column, 80, $record->mf_seven_sf)
->setCellValueByColumnAndRow($column, 81, $record->mf_eight_sf)
->setCellValueByColumnAndRow($column, 82, $record->mf_nine_sf)
->setCellValueByColumnAndRow($column, 83, $record->mf_ten_sf)
->setCellValueByColumnAndRow($column, 84, $record->mf_one_rent)
->setCellValueByColumnAndRow($column, 85, $record->mf_two_rent)
->setCellValueByColumnAndRow($column, 86, $record->mf_three_rent)
->setCellValueByColumnAndRow($column, 87, $record->mf_four_rent)
->setCellValueByColumnAndRow($column, 88, $record->mf_five_rent)
->setCellValueByColumnAndRow($column, 89, $record->mf_six_rent)
->setCellValueByColumnAndRow($column, 90, $record->mf_seven_rent)
->setCellValueByColumnAndRow($column, 91, $record->mf_eight_rent)
->setCellValueByColumnAndRow($column, 92, $record->mf_nine_rent)
->setCellValueByColumnAndRow($column, 93, $record->mf_ten_rent)
->setCellValueByColumnAndRow($column, 94, $record->mf_landlord_water)
->setCellValueByColumnAndRow($column, 95, $record->mf_landlord_sewer)
->setCellValueByColumnAndRow($column, 96, $record->mf_landlord_hot_water)
->setCellValueByColumnAndRow($column, 97, $record->mf_landlord_heat)
->setCellValueByColumnAndRow($column, 98, $record->mf_landlord_gas)
->setCellValueByColumnAndRow($column, 99, $record->mf_landlord_trash)
->setCellValueByColumnAndRow($column, 100, $record->mf_landlord_internet)
->setCellValueByColumnAndRow($column, 101, $record->mf_landlord_cable)
->setCellValueByColumnAndRow($column, 102, $record->mf_non_refund)
->setCellValueByColumnAndRow($column, 103, $record->mf_parking_type)
->setCellValueByColumnAndRow($column, 104, $record->mf_washdry)
->setCellValueByColumnAndRow($column, 105, $record->mf_fireplace)
->setCellValueByColumnAndRow($column, 106, $record->mf_micro)
->setCellValueByColumnAndRow($column, 107, $record->mf_patio)
->setCellValueByColumnAndRow($column, 108, $record->mf_dish)
->setCellValueByColumnAndRow($column, 109, $record->mf_dispo)
->setCellValueByColumnAndRow($column, 110, $record->mf_vault)
->setCellValueByColumnAndRow($column, 111, $record->mf_exstor)
->setCellValueByColumnAndRow($column, 112, $record->mf_club)
->setCellValueByColumnAndRow($column, 113, $record->mf_playg)
->setCellValueByColumnAndRow($column, 114, $record->mf_bbq)
->setCellValueByColumnAndRow($column, 115, $record->mf_bigtv)
->setCellValueByColumnAndRow($column, 116, $record->mf_sports)
->setCellValueByColumnAndRow($column, 117, $record->mf_laund)
->setCellValueByColumnAndRow($column, 118, $record->mf_pool)
->setCellValueByColumnAndRow($column, 119, $record->mf_busi)
->setCellValueByColumnAndRow($column, 120, $record->mf_sec)
->setCellValueByColumnAndRow($column, 121, $record->mf_exercise)
->setCellValueByColumnAndRow($column, 122, $record->mf_spa)
->setCellValueByColumnAndRow($column, 123, $record->mf_wd_hookup)
->setCellValueByColumnAndRow($column, 124, $record->mf_other_amenities)
->setCellValueByColumnAndRow($column, 125, $record->lease_comment)
->setCellValueByColumnAndRow($column, 126, $record->confirm_1_source)
->setCellValueByColumnAndRow($column, 127, $record->relationship_1)
->setCellValueByColumnAndRow($column, 128, $record->confirm_by)
->setCellValueByColumnAndRow($column, 129, $record->confirm_date)
->setCellValueByColumnAndRow($column, 163, "'" . $record->mc_file_no)
->setCellValueByColumnAndRow($column, 131, $record->mf_one_price_sf)
->setCellValueByColumnAndRow($column, 132, $record->mf_two_price_sf)
->setCellValueByColumnAndRow($column, 133, $record->mf_three_price_sf)
->setCellValueByColumnAndRow($column, 134, $record->mf_four_price_sf)
->setCellValueByColumnAndRow($column, 135, $record->mf_five_price_sf)
->setCellValueByColumnAndRow($column, 136, $record->mf_six_price_sf)
->setCellValueByColumnAndRow($column, 137, $record->mf_seven_price_sf)
->setCellValueByColumnAndRow($column, 138, $record->mf_eight_price_sf)
->setCellValueByColumnAndRow($column, 139, $record->mf_nine_price_sf)
->setCellValueByColumnAndRow($column, 140, $record->mf_ten_price_sf);
			$column++;
		}
	}
// if there are no records in the database, display an alert message
	else {
		echo "No results to display!";
	}
        $spreadsheet->getActiveSheet()->getStyle('E129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('F129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('G129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('I129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('J129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('K129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('L129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('M129')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('N129')
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
header('Content-Disposition: attachment;filename="Apartment Leases.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>