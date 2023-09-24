<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('service.xlsx');
$ids = $_GET['id'];
$job = $_GET['job'];
$effDate = $_GET['efdatevalue'];
include("../../../../includes/connect.php");
if ( $result = $conn->query( "SELECT a.id, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, n.subtype, o.definition as occupancy_type, p.definition as veh_level, c.year_built, c.last_renovation, c.overall_gba, c.overall_nra, e.veh_showroom_sf, e.veh_showroom_pct, c.oe_vacany_pct, e.shop_inline_sf, e.shop_inline_pct, q.definition as building_class, r.definition as building_quality, s.definition as ext_condition, c.const_descr, t.definition as elevator, c.other_const_features, c.parking_ratio, e.shop_anchor_tenant, e.shop_other_tenant, e.veh_tunnel, b.gross_land_sf, c.land_build_ratio_primary, d.lessee_name, d.tenant_area_sf, c.office_bo_pct, c.load_factor_input, e.ind_clear_height, e.ind_truck_grade, e.ind_truck_dock, d.lease_start_date, d.total_lease_term_mos, d.lease_esc_terms_desc, u.definition as lease_expense_term, v.definition as exp_term_adj, d.tenant_paid_cam_sf_yr, d.percentage_rent, d.concessions_desc, d.desc_ti, d.eff_rent_sf_yr, d.eff_rent_comment_1, d.eff_annual_rent_tunnel, d.ind_ann_bldg_rent_sf, d.eff_rent_sf_mo_blend, d.eff_rent_sf_mo_shell, d.eff_rent_sf_mo_office, f.pre_lease_sf, f.pre_lease_pct_inline, f.pre_lease_pct_nra, f.total_absorb_sf, f.total_lease_pct_inline, f.total_lease_pct_nra, f.start_date, f.end_date, f.no_mos_absorb, f.absorb_comment, f.sf_absorb_mo, d.confirm_1_source, d.relationship_1, CONCAT(ai.firstname,IF(ai.midname = '',' ',CONCAT(' ',ai.midname,' ')),ai.lastname, IF(ai.designation = '','',CONCAT(', ',ai.designation))) as confirm_by, d.confirm_date, d.mc_file_no, d.lease_comment FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN leasetrans d on d.FK_ReportID = a.id LEFT OUTER JOIN proptypedetails e on e.FK_ReportID = a.id LEFT OUTER JOIN yardabsorb f on f.FK_ReportID = a.id LEFT OUTER JOIN appraisers ai on ai.id = d.confirm1 LEFT OUTER JOIN subtype n on n.id = b.propertysubtype LEFT OUTER JOIN WFDictionary o on o.id = c.occupancy_type LEFT OUTER JOIN WFDictionary p on p.id = e.veh_level LEFT OUTER JOIN WFDictionary q on q.id = c.building_class LEFT OUTER JOIN WFDictionary r on r.id = c.building_quality LEFT OUTER JOIN WFDictionary s on s.id = c.ext_condition LEFT OUTER JOIN WFDictionary t on t.id = e.off_elevator_service LEFT OUTER JOIN WFDictionary u on u.id = d.lease_expense_term LEFT OUTER JOIN WFDictionary v on v.id = d.exp_term_adj WHERE a.id in (".implode(',',(array)$ids).") order by FIELD (a.id,".$ids.")" ) ) {
	
	PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
	$spreadsheet->getActiveSheet()->getRowDimension('7')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('8')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('16')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('27')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('29')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('40')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('50')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('51')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('52')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('55')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('56')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('95')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('96')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('99')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('101')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->setCellValue('P93', $job);			
    $spreadsheet->getActiveSheet()->setCellValue('V108', $effDate);
	// display records if there are records to display
	if ( $result->num_rows > 0 ) {
		$column = 6;
		while ( $record = $result->fetch_object() ) {
			$spreadsheet->getActiveSheet()
				->setCellValueByColumnAndRow($column, 7, $record->property_name)
				->setCellValueByColumnAndRow($column, 8, $record->address)
				->setCellValueByColumnAndRow($column, 83, $record->city)
				->setCellValueByColumnAndRow($column, 84, $record->state)
				->setCellValueByColumnAndRow($column, 13, $record->subtype)
				->setCellValueByColumnAndRow($column, 14, $record->occupancy_type)
				->setCellValueByColumnAndRow($column, 15, $record->veh_level)
				->setCellValueByColumnAndRow($column, 85, "'" . $record->year_built)
				->setCellValueByColumnAndRow($column, 86, $record->last_renovation)
				->setCellValueByColumnAndRow($column, 17, $record->overall_gba)
				->setCellValueByColumnAndRow($column, 18, $record->overall_nra)
				->setCellValueByColumnAndRow($column, 19, $record->veh_showroom_sf)
				->setCellValueByColumnAndRow($column, 20, $record->veh_showroom_pct)
				->setCellValueByColumnAndRow($column, 21, $record->oe_vacany_pct)
				->setCellValueByColumnAndRow($column, 22, $record->shop_inline_sf)
				->setCellValueByColumnAndRow($column, 23, $record->shop_inline_pct)
				->setCellValueByColumnAndRow($column, 24, $record->building_class)
				->setCellValueByColumnAndRow($column, 25, $record->building_quality)
				->setCellValueByColumnAndRow($column, 26, $record->ext_condition)
				->setCellValueByColumnAndRow($column, 27, $record->const_descr)
				->setCellValueByColumnAndRow($column, 28, $record->elevator)
				->setCellValueByColumnAndRow($column, 29, $record->other_const_features)
				->setCellValueByColumnAndRow($column, 30, $record->parking_ratio)
				->setCellValueByColumnAndRow($column, 31, $record->shop_anchor_tenant)
				->setCellValueByColumnAndRow($column, 32, $record->shop_other_tenant)
				->setCellValueByColumnAndRow($column, 33, $record->veh_tunnel)
				->setCellValueByColumnAndRow($column, 35, $record->gross_land_sf)
				->setCellValueByColumnAndRow($column, 36, $record->land_build_ratio_primary)
				->setCellValueByColumnAndRow($column, 40, $record->lessee_name)
				->setCellValueByColumnAndRow($column, 41, $record->tenant_area_sf)
				->setCellValueByColumnAndRow($column, 42, $record->office_bo_pct)
				->setCellValueByColumnAndRow($column, 43, $record->load_factor_input)
				->setCellValueByColumnAndRow($column, 44, $record->ind_clear_height)
				->setCellValueByColumnAndRow($column, 87, $record->ind_truck_grade)
				->setCellValueByColumnAndRow($column, 88, $record->ind_truck_dock)
				->setCellValueByColumnAndRow($column, 48, $record->lease_start_date)
				->setCellValueByColumnAndRow($column, 49, $record->total_lease_term_mos)
				->setCellValueByColumnAndRow($column, 50, $record->lease_esc_terms_desc)
				->setCellValueByColumnAndRow($column, 51, $record->lease_expense_term)
				->setCellValueByColumnAndRow($column, 52, $record->exp_term_adj)
				->setCellValueByColumnAndRow($column, 53, $record->tenant_paid_cam_sf_yr)
				->setCellValueByColumnAndRow($column, 54, $record->percentage_rent)
				->setCellValueByColumnAndRow($column, 55, $record->concessions_desc)
				->setCellValueByColumnAndRow($column, 56, $record->desc_ti)
				->setCellValueByColumnAndRow($column, 59, $record->eff_rent_sf_yr)
				->setCellValueByColumnAndRow($column, 90, $record->eff_rent_comment_1)
				->setCellValueByColumnAndRow($column, 61, $record->eff_annual_rent_tunnel)
				->setCellValueByColumnAndRow($column, 62, $record->ind_ann_bldg_rent_sf)
				->setCellValueByColumnAndRow($column, 63, $record->eff_rent_sf_mo_blend)
				->setCellValueByColumnAndRow($column, 64, $record->eff_rent_sf_mo_shell)
				->setCellValueByColumnAndRow($column, 65, $record->eff_rent_sf_mo_office)
				->setCellValueByColumnAndRow($column, 70, $record->pre_lease_sf)
				->setCellValueByColumnAndRow($column, 71, $record->pre_lease_pct_inline)
				->setCellValueByColumnAndRow($column, 72, $record->pre_lease_pct_nra)
				->setCellValueByColumnAndRow($column, 73, $record->total_absorb_sf)
				->setCellValueByColumnAndRow($column, 74, $record->total_lease_pct_inline)
				->setCellValueByColumnAndRow($column, 75, $record->total_lease_pct_nra)
				->setCellValueByColumnAndRow($column, 76, $record->start_date)
				->setCellValueByColumnAndRow($column, 77, $record->end_date)
				->setCellValueByColumnAndRow($column, 78, $record->no_mos_absorb)
				->setCellValueByColumnAndRow($column, 79, $record->absorb_comment)
				->setCellValueByColumnAndRow($column, 80, $record->sf_absorb_mo)
				->setCellValueByColumnAndRow($column, 95, $record->confirm_1_source)
				->setCellValueByColumnAndRow($column, 96, $record->relationship_1)
				->setCellValueByColumnAndRow($column, 97, $record->confirm_by)
				->setCellValueByColumnAndRow($column, 98, $record->confirm_date)
				->setCellValueByColumnAndRow($column, 145, "'" . $record->mc_file_no)
				->setCellValueByColumnAndRow($column, 101, $record->lease_comment);
			$column++;
		}
	}
// if there are no records in the database, display an alert message
	else {
		echo "No results to display!";
	}
	$spreadsheet->getActiveSheet()->getStyle('V108')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
		$spreadsheet->getActiveSheet()->getStyle('F48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('G48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('I48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('J48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('K48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('L48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('M48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('N48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('O48')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('F101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('G101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('H101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('I101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('J101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('K101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('L101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('M101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('N101')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('O101')
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
header('Content-Disposition: attachment;filename="Service - Repair Leases.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>