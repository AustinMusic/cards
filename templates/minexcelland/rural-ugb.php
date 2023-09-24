<?php
require '../src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('rural-ugb.xlsx');
$ids = $_GET['id'];

include("../../../../includes/connect.php");
if ( $result = $conn->query( "SELECT a.id, b.property_name, g.gl_development_name, h.ind_lot_nos, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, b.legal_desc, g.gl_total_project, g.gl_year_built, g.gl_anchor_tenants, b.gross_land_sf, b.net_usable_sf, g.gl_building_footprint, b.zoning_code, b.zoning_desc, s.subtype, d.proposed_use_desc, b.fut_zoning_code, b.fut_zoning_desc, b.rezone_time, b.max_floor_area, b.max_building_ht, n.definition as shape, o.definition as topography, b.easement_desc, b.other_land_comments, p.definition as orientation, h.site_amenities, q.definition as utilities, r.definition as site_access, t.definition as exposure, b.traffic_count, u.definition as rural_electricity, v.definition as municiple_water, w.definition as municiple_sewer, x.definition as well_septic, d.grantor, d.grantee, d.record_date, d.record_date_two, if(y.definition = '---',' ', y.definition) as sale_status, d.sale_price, d.eff_sale_price_stab, d.adj_price_comment, concat(' ',d.market_time) as market_time, z.definition as inc_entitlement, h.value_entitle, g.gl_length, g.gl_options_period, g.gl_rent_begin, g.gl_escalations, g.gl_rent_per_sf_land, g.gl_rent_per_sf_footprint, g.gl_rate_return, h.no_lots, j.definition as type_residential_land, h.unit_lot_type, h.fut_finish_size_avg, h.lot_complete_date, h.finish_lot_size_range, h.fut_finish_size_avg, i.definition as lot_topography, h.project_amenities, h.fut_avg_home_price, h.lot_home_price_ratio, h.report_price_lot, h.ind_sale_pct_discount, d.confirm_1_source, d.relationship_1, d.confirm_by, d.confirm_date, d.mc_file_no, d.sale_comments FROM report a JOIN property b on b.FK_ReportID = a.id 
LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id 
LEFT OUTER JOIN groundlease g on g.FK_ReportID = a.id 
LEFT OUTER JOIN resland h on h.FK_ReportID = a.id 
LEFT OUTER JOIN subtype s on s.id = b.propertysubtype 
LEFT OUTER JOIN WFDictionary n on n.id = b.shape 
LEFT OUTER JOIN WFDictionary o on o.id = b.topography 
LEFT OUTER JOIN WFDictionary p on p.id = b.orientation 
LEFT OUTER JOIN WFDictionary q on q.id = b.utilities 
LEFT OUTER JOIN WFDictionary r on r.id = b.site_access 
LEFT OUTER JOIN WFDictionary t on t.id = b.exposure 
LEFT OUTER JOIN WFDictionary u on u.id = b.rural_electricity 
LEFT OUTER JOIN WFDictionary v on v.id = b.municiple_water 
LEFT OUTER JOIN WFDictionary w on w.id = b.municiple_sewer 
LEFT OUTER JOIN WFDictionary x on x.id = b.well_septic 
LEFT OUTER JOIN WFDictionary y on y.id = d.sale_status 
LEFT OUTER JOIN WFDictionary z on z.id = h.inc_entitlement 
LEFT OUTER JOIN WFDictionary i on i.id = h.lot_topography 
LEFT OUTER JOIN WFDictionary j on j.id = h.type_residential_land 
WHERE a.id in (".implode(',',(array)$ids).") order by FIELD (a.id,".$ids.")" ) ) {
				\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
	$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('11')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('28')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('62')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('65')->setRowHeight(-1);	
	$spreadsheet->getActiveSheet()->getRowDimension('121')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('122')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('125')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('127')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('137')->setRowHeight(-1);
	$spreadsheet->getActiveSheet()->getRowDimension('138')->setRowHeight(-1);
				// display records if there are records to display
					if ( $result->num_rows > 0 ) {
						$column = 7;
						while ( $record = $result->fetch_object() ) {
							$spreadsheet->getActiveSheet()
								->setCellValueByColumnAndRow($column, 6, $record->property_name)
								->setCellValueByColumnAndRow($column, 7, $record->gl_development_name)
								->setCellValueByColumnAndRow($column, 8, $record->ind_lot_nos)								
								->setCellValueByColumnAndRow($column, 9, $record->address)
								->setCellValueByColumnAndRow($column, 109, $record->city)
								->setCellValueByColumnAndRow($column, 110, $record->state)
								->setCellValueByColumnAndRow($column, 11, $record->legal_desc)								
								->setCellValueByColumnAndRow($column, 15, $record->gl_total_project)
								->setCellValueByColumnAndRow($column, 16, $record->gl_year_built)
								->setCellValueByColumnAndRow($column, 17, $record->gl_anchor_tenants)
								->setCellValueByColumnAndRow($column, 22, $record->gross_land_sf)
								->setCellValueByColumnAndRow($column, 24, $record->net_usable_sf)									
								->setCellValueByColumnAndRow($column, 26, $record->gl_building_footprint)
								->setCellValueByColumnAndRow($column, 27, $record->zoning_code)
								->setCellValueByColumnAndRow($column, 28, $record->zoning_desc)								
								->setCellValueByColumnAndRow($column, 29, $record->subtype)
								->setCellValueByColumnAndRow($column, 30, $record->proposed_use_desc)								
								->setCellValueByColumnAndRow($column, 32, $record->fut_zoning_code)
								->setCellValueByColumnAndRow($column, 33, $record->fut_zoning_desc)
								->setCellValueByColumnAndRow($column, 34, $record->rezone_time)
								->setCellValueByColumnAndRow($column, 35, $record->max_floor_area)
								->setCellValueByColumnAndRow($column, 36, $record->max_building_ht)								
								->setCellValueByColumnAndRow($column, 39, $record->shape)								
								->setCellValueByColumnAndRow($column, 40, $record->topography)
								->setCellValueByColumnAndRow($column, 41, $record->other_land_comments)
								->setCellValueByColumnAndRow($column, 42, $record->orientation)
								->setCellValueByColumnAndRow($column, 43, $record->site_amenities)
								->setCellValueByColumnAndRow($column, 44, $record->utilities)
								->setCellValueByColumnAndRow($column, 45, $record->site_access)
								->setCellValueByColumnAndRow($column, 46, $record->exposure)
								->setCellValueByColumnAndRow($column, 47, $record->easement_desc)
								->setCellValueByColumnAndRow($column, 50, $record->rural_electricity)
								->setCellValueByColumnAndRow($column, 51, $record->municiple_water)
								->setCellValueByColumnAndRow($column, 52, $record->municiple_sewer)
								->setCellValueByColumnAndRow($column, 53, $record->well_septic)								
								->setCellValueByColumnAndRow($column, 57, $record->grantor)
								->setCellValueByColumnAndRow($column, 58, $record->grantee)
								->setCellValueByColumnAndRow($column, 60, $record->record_date)
								->setCellValueByColumnAndRow($column, 61, $record->record_date_two)
								->setCellValueByColumnAndRow($column, 62, $record->sale_status)
								->setCellValueByColumnAndRow($column, 63, $record->sale_price)
								->setCellValueByColumnAndRow($column, 64, $record->eff_sale_price_stab)
								->setCellValueByColumnAndRow($column, 65, $record->adj_price_comment)
								->setCellValueByColumnAndRow($column, 66, $record->market_time)
								->setCellValueByColumnAndRow($column, 67, $record->inc_entitlement)
								->setCellValueByColumnAndRow($column, 68, $record->value_entitle)								
								->setCellValueByColumnAndRow($column, 71, $record->gl_length)
								->setCellValueByColumnAndRow($column, 72, $record->gl_options_period)
								->setCellValueByColumnAndRow($column, 73, $record->gl_rent_begin)
								->setCellValueByColumnAndRow($column, 74, $record->gl_escalations)
								->setCellValueByColumnAndRow($column, 75, $record->gl_rent_per_sf_land)
								->setCellValueByColumnAndRow($column, 76, $record->gl_rent_per_sf_footprint)
								->setCellValueByColumnAndRow($column, 77, $record->gl_rate_return)								
								->setCellValueByColumnAndRow($column, 81, $record->no_lots)
								->setCellValueByColumnAndRow($column, 82, $record->type_residential_land)
								->setCellValueByColumnAndRow($column, 83, $record->unit_lot_type)                              
								->setCellValueByColumnAndRow($column, 85, $record->fut_finish_size_avg)
								->setCellValueByColumnAndRow($column, 86, $record->lot_complete_date)
								->setCellValueByColumnAndRow($column, 87, $record->finish_lot_size_range)
								->setCellValueByColumnAndRow($column, 88, $record->fut_finish_size_avg)
								->setCellValueByColumnAndRow($column, 89, $record->lot_topography)
								->setCellValueByColumnAndRow($column, 90, $record->project_amenities)								
								->setCellValueByColumnAndRow($column, 93, $record->fut_avg_home_price)
								->setCellValueByColumnAndRow($column, 94, $record->lot_home_price_ratio)
								->setCellValueByColumnAndRow($column, 95, $record->report_price_lot)
								->setCellValueByColumnAndRow($column, 96, $record->ind_sale_pct_discount)                                
								->setCellValueByColumnAndRow($column, 121, $record->confirm_1_source)
								->setCellValueByColumnAndRow($column, 122, $record->relationship_1)
								->setCellValueByColumnAndRow($column, 123, $record->confirm_by)
								->setCellValueByColumnAndRow($column, 124, $record->confirm_date)
								->setCellValueByColumnAndRow($column, 180, "'" . $record->mc_file_no)
								->setCellValueByColumnAndRow($column, 127, $record->sale_comments);
							$column++;
						}
}
					// if there are no records in the database, display an alert message
					else {
						echo "No results to display!";
					}
	$spreadsheet->getActiveSheet()->getStyle('W135')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
	$spreadsheet->getActiveSheet()->getStyle('G60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
 $spreadsheet->getActiveSheet()->getStyle('G60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('H60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('I60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('J60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('K60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('L60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('M60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('N60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('O60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
        $spreadsheet->getActiveSheet()->getStyle('P60')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
	$spreadsheet->getActiveSheet()->getStyle('G124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('H124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('I124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('J124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('K124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('L124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('M124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('N124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('O124')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
        $spreadsheet->getActiveSheet()->getStyle('P124')
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
header('Content-Disposition: attachment;filename="Ag-Rural-UGB.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>