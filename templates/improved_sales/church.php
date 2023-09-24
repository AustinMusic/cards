<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, b.legal_desc as legal, sm.submarket, st.subtype, IF(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as image, d.grantor, d.grantee, FORMAT(d.sale_price,0) as saleprice, FORMAT(d.eff_sale_price_stab,0) as effpricestab, FORMAT(d.eff_sale_price_stab,0) as effpricestab2, IF(d.adj_price_comment = '','',CONCAT(' - ',d.adj_price_comment)) as adjcomment, d.type_finance as fintype, p.definition as proprights, DATE_FORMAT(d.record_date, '%c/%e/%Y') as recdate, IF(d.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, d.conv_doc_rec_no as docno, IF(d.conv_doc_type = 3,'',CONCAT(' ',cdt.definition)) as doctype, d.market_time as markettime, c.year_built as yearbt, CONCAT(' ',c.last_renovation) as reno, FORMAT(c.overall_gba,0) as gba, c.no_stories as stories, c.const_descr as constdesc, bq.definition as bquality, ec.definition as extc, ic.definition as intc, c.parking_ratio as pratio, c.other_const_features as constfeat, b.zoning_code as zcode, b.zoning_desc as zdesc, b.primary_acre as primacre, FORMAT(b.primary_sf,0) as primsf, c.land_build_ratio_primary as ltbprim, sa.definition as access, exp.definition as exposure, ori.definition as orientation, FORMAT(d.underlying_land_value_primary,2) as underlandvalprim, FORMAT(d.alloc_land_value,0) as alloclandvalue, FORMAT(d.alloc_imp_value,0) as allocimpvalue, FORMAT(c.replace_cost,2) as replcost, FORMAT(c.est_rcn,0) as rcn, FORMAT(c.less_alloc_imp_price,0) as lessallocimp, FORMAT(c.depreciation_all_sources,0) as depreciation, CONCAT(FORMAT(c.implied_total_pct_deprec,1),'%') as implieddeprec, c.eff_age_years as effage, CONCAT(FORMAT(c.physical_depreciation,1),'%') as physdeprec, CONCAT(FORMAT(c.inplied_func_obsol,1),'%') as funcobsol, FORMAT(d.adj_price_sf_gba,2) as adjsfgba, FORMAT(d.alloc_imp_value_sf_gba,2) as allocsfgba, d.sale_comments as salecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate	FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id LEFT OUTER JOIN proptypedetails g on g.FK_ReportID = a.id LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN WFDictionary p on p.id = d.prop_rights_conv LEFT OUTER JOIN WFDictionary ss on ss.id = d.sale_status	LEFT OUTER JOIN WFDictionary cdt on cdt.id = d.conv_doc_type LEFT OUTER JOIN WFDictionary bq on bq.id = c.building_quality LEFT OUTER JOIN WFDictionary ec on ec.id = c.ext_condition  LEFT OUTER JOIN WFDictionary ic on ic.id = c.int_condition LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access LEFT OUTER JOIN WFDictionary exp on exp.id = b.exposure	LEFT OUTER JOIN WFDictionary ori on ori.id = b.orientation WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'church.docx' );
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
    $templateProcessor->setValue( 'effpricestab', $record->effpricestab,1);
    $templateProcessor->setValue( 'effpricestab2', $record->effpricestab2,1);
    $templateProcessor->setValue( 'adjcomment', $record->adjcomment,1);
    $templateProcessor->setValue( 'proprights', $record->proprights,1);
    $templateProcessor->setValue( 'salestatus', $record->salestatus,1);
    $templateProcessor->setValue( 'docno', $record->docno,1);
    $templateProcessor->setValue( 'doctype', $record->doctype,1);
    $templateProcessor->setValue( 'markettime', $record->markettime,1);
    $templateProcessor->setValue( 'yearbt', $record->yearbt,1);
    $templateProcessor->setValue( 'reno', $record->reno,1);
    $templateProcessor->setValue( 'stories', $record->stories,1);
    $templateProcessor->setValue( 'gba', $record->gba,1);
    $templateProcessor->setValue( 'pratio', $record->pratio,1);
    $templateProcessor->setValue( 'constdesc', $record->constdesc,1);
    $templateProcessor->setValue( 'bquality', $record->bquality,1);
    $templateProcessor->setValue( 'extc', $record->extc,1);
    $templateProcessor->setValue( 'intc', $record->intc,1);
    $templateProcessor->setValue( 'constfeat', $record->constfeat,1);
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1); 
    $templateProcessor->setValue( 'primacre', $record->primacre,1);
    $templateProcessor->setValue( 'primsf', $record->primsf,1);
    $templateProcessor->setValue( 'ltbprim', $record->ltbprim,1);
    $templateProcessor->setValue( 'access', $record->access,1);
    $templateProcessor->setValue( 'exposure', $record->exposure,1);
    $templateProcessor->setValue( 'orientation', $record->orientation,1);
    $templateProcessor->setValue( 'underlandvalprim', $record->underlandvalprim,1); 
    $templateProcessor->setValue( 'alloclandvalue', $record->alloclandvalue,1);  
    $templateProcessor->setValue( 'allocimpvalue', $record->allocimpvalue,1);  
    $templateProcessor->setValue( 'replcost', $record->replcost,1);  
    $templateProcessor->setValue( 'rcn', $record->rcn,1);  
    $templateProcessor->setValue( 'lessallocimp', $record->lessallocimp,1);  
    $templateProcessor->setValue( 'depreciation', $record->depreciation,1);  
    $templateProcessor->setValue( 'implieddeprec', $record->implieddeprec,1);  
    $templateProcessor->setValue( 'effage', $record->effage,1);  
    $templateProcessor->setValue( 'physdeprec', $record->physdeprec,1);  
    $templateProcessor->setValue( 'funcobsol', $record->funcobsol,1);  
    $templateProcessor->setValue( 'adjsfgba', $record->adjsfgba,1);  
    $templateProcessor->setValue( 'allocsfgba', $record->allocsfgba,1);    
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
header( "Content-Disposition: attachment; filename=Church School Improved Sales.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
