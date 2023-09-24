<?php
require '../src/vendor/autoload.php';
$ids = $_GET['id'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('ruralrow.xlsx');

\PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.reportname, b.eff_date_value as effdov, ea.definition as estapp, c.property_name as propname, CONCAT(c.streetnumber,' ',c.streetname) as address, CONCAT(c.city,', ',c.state) as cityst, c.legal_desc as legdesc, c.gross_land_sf as grosssf, c.net_usable_sf as netsf, sm.submarket, c.zoning_code as zcode, c.zoning_desc as zdesc, c.traffic_count as traffic, c.easement_desc as easedesc, d.year_built as yearbt, d.overall_gba as gba, d.overall_nra as nra, d.floor_1_gba as footprint, f.list_price as listprice, f.record_date as recdate, sh.definition as shape, tp.definition as topography, oe.definition as orientation, sa.definition as access, ex.definition as exposure, c.utilities
from report a
LEFT OUTER JOIN appraisalinfo b on b.FK_ReportID = a.id
LEFT OUTER JOIN property c on c.FK_ReportID = a.id
LEFT OUTER JOIN building d on d.FK_ReportID = a.id
LEFT OUTER JOIN saletrans f on f.FK_ReportID = a.id
LEFT OUTER JOIN submarket sm on sm.id = c.submarkid
LEFT OUTER JOIN WFDictionary ea on ea.id = b.estate_appraised
LEFT OUTER JOIN WFDictionary sh on sh.id = c.shape
LEFT OUTER JOIN WFDictionary tp on tp.id = c.topography
LEFT OUTER JOIN WFDictionary oe on oe.id = c.orientation
LEFT OUTER JOIN WFDictionary sa on sa.id = c.site_access
LEFT OUTER JOIN WFDictionary ex on ex.id = c.exposure
where a.id = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
		$spreadsheet->getActiveSheet()->setCellValue('E6', $subprop->propname);
		$spreadsheet->getActiveSheet()->setCellValue('E9', $subprop->address);
		$spreadsheet->getActiveSheet()->setCellValue('E10', $subprop->cityst);
		$spreadsheet->getActiveSheet()->setCellValue('E11', $subprop->legdesc);
		$spreadsheet->getActiveSheet()->setCellValue('E16', $subprop->yearbt);
		$spreadsheet->getActiveSheet()->setCellValue('E22', $subprop->grosssf);
		$spreadsheet->getActiveSheet()->setCellValue('E24', $subprop->netsf);
		$spreadsheet->getActiveSheet()->setCellValue('E26', $subprop->footprint);
		$spreadsheet->getActiveSheet()->setCellValue('E27', $subprop->zcode);
		$spreadsheet->getActiveSheet()->setCellValue('E28', $subprop->zdesc);
		$spreadsheet->getActiveSheet()->setCellValue('E39', $subprop->shape);
		$spreadsheet->getActiveSheet()->setCellValue('E40', $subprop->topography);
		$spreadsheet->getActiveSheet()->setCellValue('E44', $subprop->utilities);
		$spreadsheet->getActiveSheet()->setCellValue('E45', $subprop->access);
		$spreadsheet->getActiveSheet()->setCellValue('E46', $subprop->exposure);
		$spreadsheet->getActiveSheet()->setCellValue('E47', $subprop->easedesc);
		$spreadsheet->getActiveSheet()->setCellValue('E60', $subprop->recdate);
		$spreadsheet->getActiveSheet()->setCellValue('E63', $subprop->listprice);
		$spreadsheet->getActiveSheet()->setCellValue('E156', $subprop->submarket);
		$spreadsheet->getActiveSheet()->setCellValue('W135', $subprop->effdov);
		$spreadsheet->getActiveSheet()->setCellValue('Q119', $subprop->reportname);
		$spreadsheet->getActiveSheet()->setCellValue('E149', $subprop->estapp);
	}
}

if ( $result = $conn->query( "SELECT a.id, b.property_name, g.gl_development_name, h.ind_lot_nos, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, b.legal_desc, g.gl_total_project, g.gl_year_built, g.gl_anchor_tenants, b.gross_land_sf, b.net_usable_sf, g.gl_building_footprint, b.zoning_code, b.zoning_desc, s.subtype, d.proposed_use_desc, b.fut_zoning_code, b.fut_zoning_desc, b.rezone_time, b.max_floor_area, b.max_building_ht, n.definition as shape, o.definition as topography, b.easement_desc, b.other_land_comments, p.definition as orientation, h.site_amenities, b.utilities, r.definition as site_access, t.definition as exposure, b.traffic_count, u.definition as rural_electricity, v.definition as municiple_water, w.definition as municiple_sewer, x.definition as well_septic, d.grantor, d.grantee, d.record_date, d.record_date_two, if(y.definition = '---',' ', y.definition) as sale_status, d.sale_price, d.eff_sale_price_stab, d.adj_price_comment, concat(' ',d.market_time) as market_time, z.definition as inc_entitlement, h.value_entitle, g.gl_length, g.gl_options_period, g.gl_rent_begin, g.gl_escalations, g.gl_rent_per_sf_land, g.gl_rent_per_sf_footprint, g.gl_rate_return, h.no_lots, j.definition as type_residential_land, h.unit_lot_type, h.fut_finish_size_avg, h.lot_complete_date, h.finish_lot_size_range, h.fut_finish_size_avg, i.definition as lot_topography, h.project_amenities, h.fut_avg_home_price, h.lot_home_price_ratio, h.report_price_lot, h.ind_sale_pct_discount, d.confirm_1_source, d.relationship_1, CONCAT(ai.firstname,IF(ai.midname = '',' ',CONCAT(' ',ai.midname,' ')),ai.lastname, IF(ai.designation = '','',CONCAT(', ',ai.designation))) as confirm_by, d.confirm_date, d.mc_file_no, d.sale_comments FROM report a JOIN property b on b.FK_ReportID = a.id 
LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id 
LEFT OUTER JOIN groundlease g on g.FK_ReportID = a.id 
LEFT OUTER JOIN resland h on h.FK_ReportID = a.id 
LEFT OUTER JOIN appraisers ai on ai.id = d.confirm1
LEFT OUTER JOIN subtype s on s.id = b.propertysubtype 
LEFT OUTER JOIN WFDictionary n on n.id = b.shape 
LEFT OUTER JOIN WFDictionary o on o.id = b.topography 
LEFT OUTER JOIN WFDictionary p on p.id = b.orientation 
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
			->setCellValueByColumnAndRow($column, 220, "'" . $record->mc_file_no)
			->setCellValueByColumnAndRow($column, 127, $record->sale_comments);
		$column++;
	}
} else {
	echo "Error: " . $conn->error;
	}
	
}				

$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('11')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('28')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('62')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('65')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('121')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('122')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('124')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('127')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('137')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('138')->setRowHeight(-1);

$spreadsheet->getActiveSheet()->getStyle('W135')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle( 'E63' )->getNumberFormat()->setFormatCode( \PhpOffice\ PhpSpreadsheet\ Style\ NumberFormat::FORMAT_CURRENCY_USD );
$spreadsheet->getActiveSheet()->getStyle( 'E60' )->getNumberFormat()->setFormatCode( \PhpOffice\ PhpSpreadsheet\ Style\ NumberFormat::FORMAT_DATE_XLSX17 );
$spreadsheet->getActiveSheet()->getStyle('G60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('H60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('G60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('H60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('I60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('J60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('K60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('L60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('M60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('N60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('O60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('P60')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('G124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('H124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('I124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('J124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('K124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('L124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('M124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('N124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('O124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('P124')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
// close database connection
$conn->close();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Agriculture - Rural ROW Land Sales.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>