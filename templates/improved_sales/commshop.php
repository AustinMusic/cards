<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, b.legal_desc as legal, sm.submarket, st.subtype, IF(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as image, d.grantor, d.grantee, FORMAT(d.sale_price,0) as saleprice, FORMAT(d.eff_sale_price_stab,0) as effpricestab, IF(d.adj_price_comment = '','',CONCAT(' - ',d.adj_price_comment)) as adjcomment, d.type_finance as fintype, p.definition as proprights, DATE_FORMAT(d.record_date, '%c/%e/%Y') as recdate, IF(d.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, d.conv_doc_rec_no as docno, IF(d.conv_doc_type = 3,'',CONCAT(' ',cdt.definition)) as doctype, d.market_time as markettime, c.year_built as yearbt, CONCAT(' ',c.last_renovation) as reno, FORMAT(c.overall_gba,0) as gba, FORMAT(c.overall_nra,0) as nra, ot.definition as occupancy, c.const_descr as constdesc, bq.definition as bquality, ec.definition as extc, ic.definition as intc, c.no_building as nobldgs, c.no_stories as stories, c.parking_ratio as pratio, c.other_const_features as constfeat, FORMAT(g.shop_inline_sf,0) as inlinesf, CONCAT(FORMAT(g.shop_inline_pct,1), '%') as inlinepct, g.shop_anchor_tenant as anchor, g.shop_other_tenant as tenants, b.zoning_code as zcode, b.zoning_desc as zdesc, b.primary_acre as primacre, FORMAT(b.primary_sf,0) as primsf, c.land_build_ratio_primary as ltbprim, CONCAT(c.site_cover_primary,'%') as site_cover_primary, sa.definition as access, exp.definition as exposure, ori.definition as orientation, c.oe_income_actual_proforma as proforma, c.oe_income_source as isource, FORMAT(c.oe_pgi,0) as pgi, FORMAT(c.pgi_sf_nra,2) as pgisfnra, CONCAT(FORMAT(c.oe_vacany_pct,1), '%') as vacpct, FORMAT(c.oe_vacancy_credit_loss,0) as vaccredloss, FORMAT(c.vacancy_sf_nra,2) as vacsfnra, FORMAT(c.oe_egi,0) as egi, FORMAT(c.egi_sf_nra,2) as egisfnra, CONCAT(FORMAT(c.oe_expence_ratio,1),'%') as expratio, FORMAT(c.oe_expences,0) as expences, FORMAT(c.expence_sf_nra,2) as expsfnra, FORMAT(c.oe_total_noi,0) as noi, FORMAT(c.oe_noi_sf_nra,2) as noisfnra, FORMAT(d.adj_price_sf_nra,2) as adjsfnra, CONCAT(FORMAT(d.cap_rate,2),'%') as caprate, FORMAT(d.adj_price_sf_gba,2) as adjsfgba, CONCAT(FORMAT(d.egim,2),'x') as egim, d.sale_comments as salecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id LEFT OUTER JOIN proptypedetails g on g.FK_ReportID = a.id LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN WFDictionary p on p.id = d.prop_rights_conv LEFT OUTER JOIN WFDictionary ss on ss.id = d.sale_status LEFT OUTER JOIN WFDictionary cdt on cdt.id = d.conv_doc_type LEFT OUTER JOIN WFDictionary ot on ot.id = c.occupancy_type LEFT OUTER JOIN WFDictionary bq on bq.id = c.building_quality LEFT OUTER JOIN WFDictionary ec on ec.id = c.ext_condition LEFT OUTER JOIN WFDictionary ic on ic.id = c.int_condition LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access LEFT OUTER JOIN WFDictionary exp on exp.id = b.exposure LEFT OUTER JOIN WFDictionary ori on ori.id = b.orientation WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'commshop.docx' );
  $templateProcessor->cloneBlock('my_block', $result->num_rows);
  $imagekey=0; $images=[];
  // Creating the new document...  
  while ( $record = $result->fetch_object() ) {    
    $imagekey++;
    $templateProcessor->setValue( 'propname', $record->propname,1);
    $templateProcessor->setValue( 'address', $record->address,1);
    $templateProcessor->setValue( 'citystate', $record->citystate,1);
    $templateProcessor->setValue( 'county', $record->county,1);       
    $templateProcessor->setValue( 'legal', $record->legal,1);
    $templateProcessor->setValue( 'submarket', $record->submarket,1);
    $templateProcessor->setValue( 'proptype', $record->proptype,1);
    $templateProcessor->setValue( 'subtype', $record->subtype,1);
    $templateProcessor->setValue( 'grantor', $record->grantor,1);
    $templateProcessor->setValue( 'grantee', $record->grantee,1);
    $templateProcessor->setValue( 'recdate', $record->recdate,1);
    $templateProcessor->setValue( 'fintype', $record->fintype,1);
    $templateProcessor->setValue( 'saleprice', $record->saleprice,1);
    $templateProcessor->setValue( 'scr', $record->scr,1);
    $templateProcessor->setValue( 'effpricestab', $record->effpricestab,1);
    $templateProcessor->setValue( 'adjcomment', $record->adjcomment,1);
    $templateProcessor->setValue( 'proprights', $record->proprights,1);
    $templateProcessor->setValue( 'salestatus', $record->salestatus,1);
    $templateProcessor->setValue( 'docno', $record->docno,1);
    $templateProcessor->setValue( 'doctype', $record->doctype,1);
    $templateProcessor->setValue( 'markettime', $record->markettime,1);
    $templateProcessor->setValue( 'yearbt', $record->yearbt,1);
    $templateProcessor->setValue( 'reno', $record->reno,1);
    $templateProcessor->setValue( 'gba', $record->gba,1);
    $templateProcessor->setValue( 'occupancy', $record->occupancy,1);
    $templateProcessor->setValue( 'constdesc', $record->constdesc,1);
    $templateProcessor->setValue( 'pratio', $record->pratio,1);
    $templateProcessor->setValue( 'bquality', $record->bquality,1);
    $templateProcessor->setValue( 'extc', $record->extc,1);
    $templateProcessor->setValue( 'intc', $record->intc,1);
    $templateProcessor->setValue( 'nra', $record->nra,1);
    $templateProcessor->setValue( 'nobldgs', $record->nobldgs,1);
    $templateProcessor->setValue( 'inlinesf', $record->inlinesf,1);
    $templateProcessor->setValue( 'inlinepct', $record->inlinepct,1);
    $templateProcessor->setValue( 'anchor', $record->anchor,1);
    $templateProcessor->setValue( 'tenants', $record->tenants,1);
    $templateProcessor->setValue( 'proforma', $record->proforma,1);
    $templateProcessor->setValue( 'isource', $record->isource,1);
    $templateProcessor->setValue( 'vacpct', $record->vacpct,1);
    $templateProcessor->setValue( 'expratio', $record->expratio,1);
    $templateProcessor->setValue( 'pgi', $record->pgi,1);
    $templateProcessor->setValue( 'pgisfnra', $record->pgisfnra,1);
    $templateProcessor->setValue( 'vaccredloss', $record->vaccredloss,1);
    $templateProcessor->setValue( 'vacsfnra', $record->vacsfnra,1);
    $templateProcessor->setValue( 'egi', $record->egi,1);
    $templateProcessor->setValue( 'egisfnra', $record->egisfnra,1);
    $templateProcessor->setValue( 'expences', $record->expences,1);
    $templateProcessor->setValue( 'expsfnra', $record->expsfnra,1);
    $templateProcessor->setValue( 'noisfnra', $record->noisfnra,1);
    $templateProcessor->setValue( 'noi', $record->noi,1);
    $templateProcessor->setValue( 'stories', $record->stories,1);
    $templateProcessor->setValue( 'caprate', $record->caprate,1);
    $templateProcessor->setValue( 'egim', $record->egim,1);
    $templateProcessor->setValue( 'adjsfgba', $record->adjsfgba,1);
    $templateProcessor->setValue( 'adjsfnra', $record->adjsfnra,1);
    $templateProcessor->setValue( 'constfeat', $record->constfeat,1);
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1); 
    $templateProcessor->setValue( 'primacre', $record->primacre,1);
    $templateProcessor->setValue( 'primsf', $record->primsf,1);
    $templateProcessor->setValue( 'ltbprim', $record->ltbprim,1);
    $templateProcessor->setValue( 'access', $record->access,1);
    $templateProcessor->setValue( 'exposure', $record->exposure,1);
    $templateProcessor->setValue( 'orientation', $record->orientation,1);  
    $templateProcessor->setValue( 'confirm1', $record->confirm1,1);
    $templateProcessor->setValue( 'source1', $record->source1,1);
    $templateProcessor->setValue( 'source2', $record->source2,1);
    $templateProcessor->setValue( 'confirmdate', $record->confirmdate,1);
    $salescomments = str_replace("$", "dollarsign", $record->salecomments);
    $templateProcessor->setValue( 'salecomments', $salescomments,1);
    $templateProcessor->tempDocumentMainPart = str_replace("dollarsign", "$", $templateProcessor->tempDocumentMainPart);
    $templateProcessor->setValue('image', '${image_'.$imagekey.':270:270}' ,1);
    $images['image_'.$imagekey] = $record->image;
  }
} else {
  echo "Error: " . $conn->error;
}

// close database connection
$conn->close();

foreach($images as $key => $item) {
        $templateProcessor->setImageValue($key, '../../comp_images/'.$item);
}

$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Shopping Center Improved Sales.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
