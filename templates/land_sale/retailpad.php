<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, d.gl_development_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ',b.state) as citystate, b.county, b.legal_desc as legal, sm.submarket, pt.propertytype as proptype, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS image, e.grantor, e.grantee, FORMAT(e.fee_equiv_price,0) as feeequiv, FORMAT(e.eff_sale_price_stab,0) as effpricestab, CONCAT(' ',e.adj_price_comment) as adjcomment, e.type_finance as fintype, prc.definition as proprights, DATE_FORMAT(e.record_date, '%c/%e/%Y') as recdate, if(e.record_date_two > '1901-01-01',CONCAT(' & ',DATE_FORMAT(e.record_date_two, '%c/%e/%Y')),'') as recdatetwo, IF(e.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, e.conv_doc_rec_no as docno, IF(e.conv_doc_type = 3,'',CONCAT(' ',cdt.definition)) as doctype, e.market_time as markettime, FORMAT(d.gl_total_project,0) as gla, d.gl_anchor_tenants as anchorten, FORMAT(b.net_usable_acre,3) as netacre, FORMAT(b.net_usable_sf,0) as netsf, FORMAT(d.gl_building_footprint,0) as footprint, CONCAT(f.site_cover_primary,'%') as scrprim, b.zoning_code as zcode, b.zoning_desc as zdesc, top.definition as topography, shp.definition as shape, d.gl_year_built as yearbt, d.gl_major_tenants as majorten, b.utilities, ori.definition as orientation, sa.definition as access, ex.definition as exposure, fp.definition as floodplain, b.easement_desc as easedesc, d.gl_length as length, FORMAT(d.gl_rent_begin,0) as rentbegin, d.gl_options_period as optsperiod, FORMAT(d.gl_rent_per_sf_land,2) as rentsf, d.gl_escalations as escalations, FORMAT(d.gl_rent_per_sf_footprint,2) as rentsffp, CONCAT(FORMAT(d.gl_rate_return,1),'%') as ratereturn, FORMAT(e.adj_price_sf_net,2) as adjsfnet, FORMAT(d.adj_price_sf_pad,2) as adjsfpad, e.sale_comments as salecomments, e.confirm_1_source as source1, e.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(e.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN groundlease d on d.FK_ReportID = a.id LEFT OUTER JOIN saletrans e on e.FK_ReportID = a.id LEFT OUTER JOIN building f on f.FK_ReportID = a.id LEFT OUTER JOIN appraisers ap1 on ap1.id = e.confirm1 LEFT OUTER JOIN assessedvalues g on g.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN propertytype pt on pt.id = b.propertytype LEFT OUTER JOIN WFDictionary top on top.id = b.topography LEFT OUTER JOIN WFDictionary shp on shp.id = b.shape LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access LEFT OUTER JOIN WFDictionary ori on ori.id = b.orientation LEFT OUTER JOIN WFDictionary fp on fp.id = b.flood_plain LEFT OUTER JOIN WFDictionary ex on ex.id = b.exposure LEFT OUTER JOIN WFDictionary ss on ss.id = e.sale_status LEFT OUTER JOIN WFDictionary cdt on cdt.id = e.conv_doc_type LEFT OUTER JOIN WFDictionary prc on prc.id = e.prop_rights_conv WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'retailpad.docx' );
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
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1);  
    $templateProcessor->setValue( 'grantor', $record->grantor,1);
    $templateProcessor->setValue( 'grantee', $record->grantee,1);
    $templateProcessor->setValue( 'recdate', $record->recdate,1);
    $templateProcessor->setValue( 'recdatetwo', $record->recdatetwo,1);
    $templateProcessor->setValue( 'fintype', $record->fintype,1);
    $templateProcessor->setValue( 'saleprice', $record->saleprice,1);
    $templateProcessor->setValue( 'effspstab', $record->effspstab,1);
    $templateProcessor->setValue( 'adjcomment', $record->adjcomment,1);
    $templateProcessor->setValue( 'effpricestab', $record->effpricestab,1);
    $templateProcessor->setValue( 'proprights', $record->proprights,1);
    $templateProcessor->setValue( 'salestatus', $record->salestatus,1);
    $templateProcessor->setValue( 'docno', $record->docno,1);
    $templateProcessor->setValue( 'doctype', $record->doctype,1);
    $templateProcessor->setValue( 'markettime', $record->markettime,1);
    $templateProcessor->setValue( 'topography', $record->topography,1);
    $templateProcessor->setValue( 'shape', $record->shape,1);
    $templateProcessor->setValue( 'access', $record->access,1);
    $templateProcessor->setValue( 'utilities', $record->utilities,1);
    $templateProcessor->setValue( 'exposure', $record->exposure,1);
    $templateProcessor->setValue( 'floodplain', $record->floodplain,1);
    $templateProcessor->setValue( 'easedesc', $record->easedesc,1);
    $templateProcessor->setValue( 'gla', $record->gla,1);
    $templateProcessor->setValue( 'anchorten', $record->anchorten,1);
    $templateProcessor->setValue( 'netacre', $record->netacre,1);
    $templateProcessor->setValue( 'netsf', $record->netsf,1);
    $templateProcessor->setValue( 'footprint', $record->footprint,1);
    $templateProcessor->setValue( 'scrprim', $record->scrprim,1);
    $templateProcessor->setValue( 'yearbt', $record->yearbt,1);
    $templateProcessor->setValue( 'majorten', $record->majorten,1);
    $templateProcessor->setValue( 'orientation', $record->orientation,1);
    $templateProcessor->setValue( 'length', $record->length,1);
    $templateProcessor->setValue( 'optsperiod', $record->optsperiod,1);
    $templateProcessor->setValue( 'rentbegin', $record->rentbegin,1);
    $templateProcessor->setValue( 'rentsf', $record->rentsf,1);
    $templateProcessor->setValue( 'escalations', $record->escalations,1);
    $templateProcessor->setValue( 'ratereturn', $record->ratereturn,1);
    $templateProcessor->setValue( 'rentsffp', $record->rentsffp,1);
    $templateProcessor->setValue( 'feeequiv', $record->feeequiv,1);
    $templateProcessor->setValue( 'adjsfnet', $record->adjsfnet,1);
    $templateProcessor->setValue( 'adjsfpad', $record->adjsfpad,1);
    $templateProcessor->setValue( 'landcomments', $record->landcomments,1); 
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
header( "Content-Disposition: attachment; filename=Retail Pad Land Sales.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
