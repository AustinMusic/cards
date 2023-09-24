<?php
require '../src/vendor/autoload.php';
$ids = $_GET[ 'id' ];

use PhpOffice\ PhpSpreadsheet\ Spreadsheet;
use PhpOffice\ PhpSpreadsheet\ Writer\ Xlsx;

$spreadsheet = \PhpOffice\ PhpSpreadsheet\ IOFactory::load( 'mobilehomerow.xlsx' );

PhpOffice\ PhpSpreadsheet\ Cell\ Cell::setValueBinder( new\ PhpOffice\ PhpSpreadsheet\ Cell\ AdvancedValueBinder() );

include( "../../../../includes/connect.php" );
$result = $conn->query( "select a.reportname, b.eff_date_value as effdov, ea.definition as estapp, c.property_name as propname, CONCAT(c.streetnumber,' ',c.streetname) as address, CONCAT(c.city,', ',c.state) as cityst, c.gross_land_sf as grosssf, c.net_usable_sf as netsf, c.primary_sf as primsf, pt.propertytype as proptype, st.subtype, sm.submarket, c.zoning_code as zcode, c.traffic_count as traffic, d.year_built as yearbt, d.last_renovation as reno, d.overall_gba as gba, d.overall_nra as nra, d.floor_1_gba as footprint, d.total_basement_gba as baementgba, d.total_basement_nra as basementnra, d.basement_type as basetype, d.storage_basement_sf as sotragesf, d.no_building as nobldg, d.no_stories as nolvl, d.no_units as nounits, d.parking_ratio as pratio, d.parking_ratio_unit as pratiounit, ot.definition as occtype, bq.definition as bquality, bc.definition as bclass, ec.definition as extc, d.const_descr as consdesc, d.other_const_features as consfeat, e.shop_inline_sf as inlinesf, es.definition as elevator, fe.definition as fire, rd.definition as raildoors, e.shop_anchor_tenant as anchor, e.shop_other_tenant as otherten, e.store_canopy_desc as canopydesc, e.store_avg_month_gallon as gallonage, e.store_month_store_sales as storesales, e.store_no_fuel as nofuel, e.veh_tunnel as tunnels, e.veh_showroom_sf as showroomsf, e.ind_total_office as officesf, e.ind_clear_height as clearht, e.ind_truck_grade as grade, e.ind_truck_dock as dock, f.list_price as listprice, f.record_date as recdate
from report a
LEFT OUTER JOIN appraisalinfo b on b.FK_ReportID = a.id
LEFT OUTER JOIN property c on c.FK_ReportID = a.id
LEFT OUTER JOIN building d on d.FK_ReportID = a.id
LEFT OUTER JOIN proptypedetails e on e.FK_ReportID = a.id
LEFT OUTER JOIN saletrans f on f.FK_ReportID = a.id
LEFT OUTER JOIN propertytype pt on pt.id = c.propertytype
LEFT OUTER JOIN subtype st on st.id = c.propertysubtype
LEFT OUTER JOIN submarket sm on sm.id = c.submarkid
LEFT OUTER JOIN WFDictionary ea on ea.id = b.estate_appraised
LEFT OUTER JOIN WFDictionary ot on ot.id = d.occupancy_type
LEFT OUTER JOIN WFDictionary bq on bq.id = d.building_quality
LEFT OUTER JOIN WFDictionary bc on bc.id = d.building_class
LEFT OUTER JOIN WFDictionary ec on ec.id = d.ext_condition
LEFT OUTER JOIN WFDictionary es on es.id = e.off_elevator_service
LEFT OUTER JOIN WFDictionary fe on fe.id = e.ind_fire
LEFT OUTER JOIN WFDictionary rd on rd.id = e.ind_rail
where a.id = " . $_GET[ 'reportid' ] . "" );
if ( $result->num_rows > 0 ) {
	while ( $subprop = $result->fetch_object() ) {
	  $spreadsheet->getActiveSheet()->setCellValue( 'E6', $subprop->propname );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E7', $subprop->address );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E8', $subprop->cityst );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E12', $subprop->recdate );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E14', $subprop->listprice );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E204', $subprop->submarket );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E130', "'" . $subprop->yearbt );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E131', $subprop->reno );		
	  $spreadsheet->getActiveSheet()->setCellValue( 'E23', $subprop->estapp );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E36', $subprop->gba );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E37', $subprop->nra );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E38', $subprop->inlinesf );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E40', $subprop->officesf );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E42', $subprop->showroomsf );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E44', $subprop->basetype );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E45', $subprop->basementgba );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E47', $subprop->basementnra );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E49', $subprop->storagesf );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E50', $subprop->tunnels );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E51', $subprop->pratio );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E53', $subprop->nobldg );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E54', $subprop->nolvl );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E55', $subprop->consdesc );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E56', $subprop->bquality );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E57', $subprop->bclass );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E60', $subprop->extc );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E61', $subprop->elevator );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E62', $subprop->clearht );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E64', $subprop->fire );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E65', $subprop->raildoors );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E66', $subprop->canopydesc );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E67', $subprop->nofuel );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E68', $subprop->consfeat );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E71', $subprop->primsf );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E79', $subprop->zcode );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E80', $subprop->subtype );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E81', $subprop->occtype );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E82', $subprop->anchor );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E83', $subprop->otherten );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E86', $subprop->traffic );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E87', $subprop->gallonage );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E88', $subprop->storesales );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E132', $subprop->grade );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E133', $subprop->dock );
	  $spreadsheet->getActiveSheet()->setCellValue( 'E168', $subprop->footprint );
	  $spreadsheet->getActiveSheet()->setCellValue( 'W185', $subprop->effdov );
	  $spreadsheet->getActiveSheet()->setCellValue( 'Q143', $subprop->reportname );
	}
}

if ( $result = $conn->query( "SELECT a.id, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.record_date, if(n.definition = '---',' ', n.definition) as sale_status, c.sale_price, c.eff_sale_price_stab, c.alloc_land_value, c.adj_price_comment, c.type_finance, o.definition as prop_rights_conv, concat(' ',c.market_time) as market_time, d.year_built, d.last_renovation, d.no_units, g.total_space, g.other_building_desc, g.no_single_wide, g.no_double_wide, g.no_triple_wide, g.no_rv_space, d.overall_gba, d.overall_nra, f.shop_inline_sf, f.ind_total_office, f.veh_showroom_sf, d.basement_type, d.total_basement_gba, d.total_basement_nra, d.storage_basement_sf, f.veh_tunnel, d.parking_ratio, d.floor_1_gba, d.no_building, no_stories, d.const_descr, p.definition as building_quality, q.definition as building_class, s.definition as park_quality, r.definition as park_condition, t.definition as ext_condition, u.definition as elevator_service, f.ind_clear_height, f.ind_truck_grade, f.ind_truck_dock, v.definition as ind_fire, w.definition as rail_served, f.store_canopy_desc, f.store_no_fuel, d.other_const_features, b.primary_sf, g.bedroom_ratio, g.parking_ratio_unit, b.zoning_code, x.subtype, y.definition as occupancy_type, f.shop_anchor_tenant, f.shop_other_tenant, b.traffic_count, f.store_avg_month_gallon, f.store_month_store_sales, d.oe_pgi, d.oe_vacancy_credit_loss, d.oe_other_income, d.oe_expences, d.oe_total_noi, (d.oe_vacany_pct/100) as oe_vacany_pct, c.store_sales_mult, c.confirm_1_source, c.relationship_1, CONCAT(ai.firstname,IF(ai.midname = '',' ',CONCAT(' ',ai.midname,' ')),ai.lastname, IF(ai.designation = '','',CONCAT(', ',ai.designation))) as confirm_by, c.confirm_date, c.mc_file_no, c.sale_comments, c.underlying_land_value_primary 
FROM report a 
JOIN property b on b.FK_ReportID = a.id 
LEFT OUTER JOIN saletrans c on c.FK_ReportID = a.id 
LEFT OUTER JOIN building d on d.FK_ReportID = a.id 
LEFT OUTER join proptypedetails f on f.FK_ReportID = a.id 
LEFT OUTER join impunit g on g.FK_ReportID = a.id 
LEFT OUTER JOIN appraisers ai on ai.id = c.confirm1
LEFT OUTER join WFDictionary y on y.id = d.occupancy_type 
LEFT OUTER join WFDictionary n on n.id = c.sale_status 
LEFT OUTER join WFDictionary o on o.id = c.prop_rights_conv 
LEFT OUTER join WFDictionary p on p.id = d.building_quality 
LEFT OUTER join WFDictionary q on q.id = d.building_class 
LEFT OUTER join WFDictionary t on t.id = d.ext_condition 
LEFT OUTER join subtype x on x.id = b.propertysubtype 
LEFT OUTER join WFDictionary u on u.id = f.off_elevator_service 
LEFT OUTER join WFDictionary v on v.id = f.ind_fire 
LEFT OUTER join WFDictionary w on w.id = f.ind_rail 
LEFT OUTER join WFDictionary r on r.id = g.park_cond 
LEFT OUTER join WFDictionary s on s.id = g.park_quality WHERE a.id in (" . implode( ',', ( array )$ids ) . ") order by FIELD (a.id,".$ids.")" ) ) {

    if ( $result->num_rows > 0 ) {
        $column = 7;
        while ( $record = $result->fetch_object() ) {
            $spreadsheet->getActiveSheet()
			->setCellValueByColumnAndRow( $column, 6, $record->property_name )
			->setCellValueByColumnAndRow( $column, 7, $record->address )
			->setCellValueByColumnAndRow( $column, 128, $record->city )
			->setCellValueByColumnAndRow( $column, 129, $record->state )
			->setCellValueByColumnAndRow( $column, 12, $record->record_date )
			->setCellValueByColumnAndRow( $column, 13, $record->sale_status )
			->setCellValueByColumnAndRow( $column, 14, $record->sale_price )
			->setCellValueByColumnAndRow( $column, 15, $record->eff_sale_price_stab )
			->setCellValueByColumnAndRow( $column, 17, $record->alloc_land_value )
			->setCellValueByColumnAndRow( $column, 21, $record->adj_price_comment )
			->setCellValueByColumnAndRow( $column, 22, $record->type_finance )
			->setCellValueByColumnAndRow( $column, 23, $record->prop_rights_conv )
			->setCellValueByColumnAndRow( $column, 24, $record->market_time )
			->setCellValueByColumnAndRow( $column, 130, "'" . $record->year_built )
			->setCellValueByColumnAndRow( $column, 131, $record->last_renovation )
			->setCellValueByColumnAndRow( $column, 29, $record->no_units )
			->setCellValueByColumnAndRow( $column, 30, $record->total_space )
			->setCellValueByColumnAndRow( $column, 31, $record->other_building_desc )
			->setCellValueByColumnAndRow( $column, 139, $record->no_single_wide )
			->setCellValueByColumnAndRow( $column, 140, $record->no_double_wide )
			->setCellValueByColumnAndRow( $column, 141, $record->no_triple_wide )
			->setCellValueByColumnAndRow( $column, 142, $record->no_rv_space )
			->setCellValueByColumnAndRow( $column, 36, $record->overall_gba )
			->setCellValueByColumnAndRow( $column, 37, $record->overall_nra )
			->setCellValueByColumnAndRow( $column, 38, $record->shop_inline_sf )
			->setCellValueByColumnAndRow( $column, 40, $record->ind_total_office )
			->setCellValueByColumnAndRow( $column, 42, $record->veh_showroom_sf )
			->setCellValueByColumnAndRow( $column, 44, $record->basement_type )
			->setCellValueByColumnAndRow( $column, 45, $record->total_basement_gba )
			->setCellValueByColumnAndRow( $column, 47, $record->total_basement_nra )
			->setCellValueByColumnAndRow( $column, 49, $record->storage_basement_sf )
			->setCellValueByColumnAndRow( $column, 50, $record->veh_tunnel )
			->setCellValueByColumnAndRow( $column, 51, $record->parking_ratio )
			->setCellValueByColumnAndRow( $column, 174, $record->floor_1_gba )
			->setCellValueByColumnAndRow( $column, 53, $record->no_building )
			->setCellValueByColumnAndRow( $column, 54, $record->no_stories )
			->setCellValueByColumnAndRow( $column, 55, $record->const_descr )
			->setCellValueByColumnAndRow( $column, 56, $record->building_quality )
			->setCellValueByColumnAndRow( $column, 57, $record->building_class )
			->setCellValueByColumnAndRow( $column, 58, $record->park_quality )
			->setCellValueByColumnAndRow( $column, 59, $record->park_condition )
			->setCellValueByColumnAndRow( $column, 60, $record->ext_condition )
			->setCellValueByColumnAndRow( $column, 61, $record->elevator_service )
			->setCellValueByColumnAndRow( $column, 62, $record->ind_clear_height )
			->setCellValueByColumnAndRow( $column, 132, $record->ind_truck_grade )
			->setCellValueByColumnAndRow( $column, 133, $record->ind_truck_dock )
			->setCellValueByColumnAndRow( $column, 64, $record->ind_fire )
			->setCellValueByColumnAndRow( $column, 65, $record->rail_served )
			->setCellValueByColumnAndRow( $column, 66, $record->store_canopy_desc )
			->setCellValueByColumnAndRow( $column, 67, $record->store_no_fuel )
			->setCellValueByColumnAndRow( $column, 68, $record->other_const_features )
			->setCellValueByColumnAndRow( $column, 71, $record->primary_sf )
			->setCellValueByColumnAndRow( $column, 73, $record->bedroom_ratio )
			->setCellValueByColumnAndRow( $column, 76, $record->parking_ratio_unit )
			->setCellValueByColumnAndRow( $column, 79, $record->zoning_code )
			->setCellValueByColumnAndRow( $column, 80, $record->subtype )
			->setCellValueByColumnAndRow( $column, 81, $record->occupancy_type )
			->setCellValueByColumnAndRow( $column, 82, $record->shop_anchor_tenant )
			->setCellValueByColumnAndRow( $column, 83, $record->shop_other_tenant )
			->setCellValueByColumnAndRow( $column, 86, $record->traffic_count )
			->setCellValueByColumnAndRow( $column, 87, $record->store_avg_month_gallon )
			->setCellValueByColumnAndRow( $column, 88, $record->store_month_store_sales )
			->setCellValueByColumnAndRow( $column, 91, $record->oe_pgi )
			->setCellValueByColumnAndRow( $column, 93, $record->oe_vacancy_credit_loss )
			->setCellValueByColumnAndRow( $column, 94, $record->oe_other_income )
			->setCellValueByColumnAndRow( $column, 97, $record->oe_expences )
			->setCellValueByColumnAndRow( $column, 98, $record->oe_total_noi )
			->setCellValueByColumnAndRow( $column, 103, $record->oe_vacany_pct )
			->setCellValueByColumnAndRow( $column, 126, $record->store_sales_mult )
			->setCellValueByColumnAndRow( $column, 146, $record->confirm_1_source )
			->setCellValueByColumnAndRow( $column, 147, $record->relationship_1 )
			->setCellValueByColumnAndRow( $column, 148, $record->confirm_by )
			->setCellValueByColumnAndRow( $column, 149, $record->confirm_date )
			->setCellValueByColumnAndRow( $column, 256, "'" . $record->mc_file_no )
			->setCellValueByColumnAndRow( $column, 152, $record->sale_comments )
			->setCellValueByColumnAndRow( $column, 173, $record->underlying_land_value_primary );
            $column++;
        }
    } else {
    echo "Error: " . $conn->error;
	}
}

$spreadsheet->getActiveSheet()->getRowDimension('6')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('7')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('13')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('21')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('24')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('31')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('80')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('146')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('150')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('152')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('187')->setRowHeight(-1);
$spreadsheet->getActiveSheet()->getRowDimension('188')->setRowHeight(-1);

$spreadsheet->getActiveSheet()->getStyle('W185')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('E14')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_CURRENCY_USD);
$spreadsheet->getActiveSheet()->getStyle('E12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('G12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('H12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('I12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('J12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('K12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('L12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('M12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('N12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('O12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('P12')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX17);
$spreadsheet->getActiveSheet()->getStyle('G149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('H149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('I149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('J149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('K149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('L149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('M149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('N149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('O149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
$spreadsheet->getActiveSheet()->getStyle('P149')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_XLSX14);
// close database connection
$conn->close();
header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
header( 'Content-Disposition: attachment;filename="Mobile Home ROW Improved Sales.xlsx"' );
header( 'Cache-Control: max-age=0' );
$writer = \PhpOffice\ PhpSpreadsheet\ IOFactory::createWriter( $spreadsheet, 'Xlsx' );
$writer->save( 'php://output' );
?>