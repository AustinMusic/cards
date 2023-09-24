<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, group_concat(concat(f.mappage,' - TL ',f.taxlot) separator ', ') as mappage, group_concat(f.parcelno separator ', ') as parcelno, sm.submarket, pt.propertytype as proptype, IF(st.subtype = '---','',CONCAT(' ',st.subtype)) as subtype, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS image, if(b.platmap = '','no-photo.jpg',CONCAT(a.id,'/',b.platmap)) AS platmap, if(b.streetview = '','no-photo.jpg',CONCAT(a.id,'/',b.streetview)) AS streetview, d.grantor, d.grantee, DATE_FORMAT(d.record_date, '%c/%e/%Y') as recdate, IF(d.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, FORMAT(d.sale_price,0) as saleprice, FORMAT(d.eff_sale_price_stab,0) as effpricestab, CONCAT(' ',d.adj_price_comment) as adjcomment, FORMAT(d.list_price,0) as listprice, CONCAT(d.list_price_change,'%') as listchange, d.type_finance as fintype, p.definition as proprights, d.conv_doc_rec_no as recno, IF(d.conv_doc_type = 3,'',CONCAT(', ',cdt.definition)) as doctype, d.market_time as markettime, FORMAT(d.adj_price_sf_net,2) as adjsfnet, FORMAT(d.adj_price_acre_net,0) as adjacrenet, b.gross_land_acre as grossacre, FORMAT(b.gross_land_sf,0) as grosssf, b.net_usable_acre as netacre, FORMAT(b.net_usable_sf,0) as netsf, b.zoning_code as zcode, b.zoning_desc as zdesc, d.current_use as currentuse, IF(d.proposed_use_desc = '','No change in use',d.proposed_use_desc) as proposeduse, IF(d.cond_sale_desc = '','Not Applicable',d.cond_sale_desc) as condsale, b.utilities, top.definition as topography, sp.definition as shape, ori.definition as orientation, sa.definition as access, exp.definition as exposure, b.easement_desc as easement, fp.definition as floodplain, IF(b.fppanel = '','',CONCAT('/ ',b.fppanel)) as fppanel, b.other_land_comments as landcomments, d.sale_comments as salecomments, b.assessedyear, FORMAT(b.rmvland,0) as rmvland, FORMAT(b.rmvimp,0) as rmvimp, FORMAT(b.rmvtotal,0) as rmvtotal, FORMAT(b.taxes,2) as taxes, b.soiltype, d.datasource, d.confirm_1_source as source1, d.relationship_1 as relationship1, d.confirm_2_souce as source2, IF(d.relationship_2 = '','',CONCAT(', ',d.relationship_2)) as relationship2, d.confirm_by, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate, d.confirm1 as confirmedby, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, CONCAT(ap2.firstname, IF(ap2.midname = '','',CONCAT(' ',ap2.midname,' ')), ap2.lastname, IF(ap2.designation = '','',CONCAT(', ',ap2.designation))) as confirm2, IF(ap1.digsignature = '','no-photo.jpg',CONCAT(ap1.id,'/',ap1.digsignature)) as apponesig, IF(ap2.digsignature = '','no-photo.jpg',CONCAT(ap2.id,'/',ap2.digsignature)) as apptwosig FROM report a 
JOIN property b on b.FK_ReportID = a.id 
LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id 
LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1
LEFT OUTER JOIN appraisers ap2 on ap2.id = d.confirm2
LEFT OUTER JOIN subtype st on st.id = b.propertysubtype 
LEFT OUTER JOIN submarket sm on sm.id = b.submarkid 
LEFT OUTER JOIN assessedvalues f on f.FK_ReportID = a.id
LEFT OUTER JOIN propertytype pt on pt.id = b.propertytype 
LEFT OUTER JOIN WFDictionary p on p.id = d.prop_rights_conv 
LEFT OUTER JOIN WFDictionary ss on ss.id = d.sale_status 
LEFT OUTER JOIN WFDictionary cdt on cdt.id = d.conv_doc_type 
LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access 
LEFT OUTER JOIN WFDictionary top on top.id = b.topography 
LEFT OUTER JOIN WFDictionary sp on sp.id = b.shape 
LEFT OUTER JOIN WFDictionary exp on exp.id = b.exposure 
LEFT OUTER JOIN WFDictionary ori on ori.id = b.orientation 
LEFT OUTER JOIN WFDictionary fp on fp.id = b.flood_plain 
WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'landindcommrow.docx' );
  $templateProcessor->cloneBlock('my_block', $result->num_rows);
  $imagekey=0; $images=[];
  $platmapkey=0; $platmaps=[];
  $streetviewkey=0; $streetviews=[];
  $apponesigkey=0; $apponesigs=[];
  $apptwosigkey=0; $apptwosigs=[];
  // Creating the new document...  
  while ( $record = $result->fetch_object() ) {    
    $imagekey++;
    $platmapkey++;
    $streetviewkey++;
    $apponesigkey++;
    $apptwosigkey++;
    $templateProcessor->setValue( 'propname', $record->propname,1);
    $templateProcessor->setValue( 'address', $record->address,1);
    $templateProcessor->setValue( 'citystate', $record->citystate,1);
    $templateProcessor->setValue( 'county', $record->county,1);      
    $templateProcessor->setValue( 'mappage', $record->mappage,1);
    $templateProcessor->setValue( 'parcelno', $record->parcelno,1);
    $templateProcessor->setValue( 'datasource ', $record->datasource ,1);
    $templateProcessor->setValue( 'submarket', $record->submarket,1);
    $templateProcessor->setValue( 'proptype', $record->proptype,1);
    $templateProcessor->setValue( 'grantor', $record->grantor,1);
    $templateProcessor->setValue( 'grantee', $record->grantee,1);
    $templateProcessor->setValue( 'recdate', $record->recdate,1);
    $templateProcessor->setValue( 'salestatus', $record->salestatus,1);
    $templateProcessor->setValue( 'saleprice', $record->saleprice,1);
    $templateProcessor->setValue( 'effpricestab', $record->effpricestab,1);
    $templateProcessor->setValue( 'adjcomment', $record->adjcomment,1);      
    $templateProcessor->setValue( 'listprice', $record->listprice,1);
    $templateProcessor->setValue( 'listchange', $record->listchange,1);
    $templateProcessor->setValue( 'fintype', $record->fintype,1);
    $templateProcessor->setValue( 'proprights', $record->proprights,1);
    $templateProcessor->setValue( 'condsale', $record->condsale,1);
    $templateProcessor->setValue( 'recno', $record->recno,1);
    $templateProcessor->setValue( 'doctype', $record->doctype,1);
    $templateProcessor->setValue( 'markettime', $record->markettime,1);
    $templateProcessor->setValue( 'adjsfnet', $record->adjsfnet,1);
    $templateProcessor->setValue( 'adjacrenet', $record->adjacrenet,1);
    $templateProcessor->setValue( 'grossacre', $record->grossacre,1);
    $templateProcessor->setValue( 'grosssf', $record->grosssf,1);
    $templateProcessor->setValue( 'netacre', $record->netacre,1);
    $templateProcessor->setValue( 'netsf', $record->netsf,1);
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1);      
    $templateProcessor->setValue( 'utilities', $record->utilities,1);
    $templateProcessor->setValue( 'topography', $record->topography,1);
    $templateProcessor->setValue( 'shape', $record->shape,1);
    $templateProcessor->setValue( 'orientation', $record->orientation,1);
    $templateProcessor->setValue( 'access', $record->access,1);
    $templateProcessor->setValue( 'exposure', $record->exposure,1);
    $templateProcessor->setValue( 'assessedyear', $record->assessedyear,1);
    $templateProcessor->setValue( 'rmvland', $record->rmvland,1);
    $templateProcessor->setValue( 'rmvimp', $record->rmvimp,1);
    $templateProcessor->setValue( 'rmvtotal', $record->rmvtotal,1);
    $templateProcessor->setValue( 'taxes', $record->taxes,1);
    $templateProcessor->setValue( 'soiltype', $record->soiltype,1);
    $templateProcessor->setValue( 'floodplain', $record->floodplain,1);
    $templateProcessor->setValue( 'fppanel', $record->fppanel,1);
    $templateProcessor->setValue( 'easement', $record->easement,1);
    $templateProcessor->setValue( 'landcomments', $record->landcomments,1);
    $templateProcessor->setValue( 'confirm1', $record->confirm1,1);
    $templateProcessor->setValue( 'confirm2', $record->confirm2,1);
    $templateProcessor->setValue( 'source1', $record->source1,1);
    $templateProcessor->setValue( 'relationship1', $record->relationship1,1);
    $templateProcessor->setValue( 'source2', $record->source2,1);
    $templateProcessor->setValue( 'relationship2', $record->relationship2,1);
    $templateProcessor->setValue( 'confirmdate', $record->confirmdate,1);
    $templateProcessor->setValue( 'currentuse', $record->currentuse,1);
    $templateProcessor->setValue( 'proposeduse', $record->proposeduse,1);
    $salescomments = str_replace("$", "dollarsign", $record->salecomments);
    $templateProcessor->setValue( 'salecomments', $salescomments,1);
    $templateProcessor->tempDocumentMainPart = str_replace("dollarsign", "$", $templateProcessor->tempDocumentMainPart);
    $templateProcessor->setValue('image', '${image_'.$imagekey.':325:325}' ,1);
    $images['image_'.$imagekey] = $record->image;
    $templateProcessor->setValue('platmap', '${platmap_'.$platmapkey.':325:325}' ,1);
    $platmaps['platmap_'.$platmapkey] = $record->platmap;
    $templateProcessor->setValue('streetview', '${streetview_'.$streetviewkey.':325:325}' ,1);
    $streetviews['streetview_'.$streetviewkey] = $record->streetview;
    $templateProcessor->setValue('apponesig', '${apponesig_'.$apponesigkey.'}' ,1);
    $apponesigs['apponesig_'.$apponesigkey] = $record->apponesig;
    $templateProcessor->setValue('apptwosig', '${apptwosig_'.$apptwosigkey.'}' ,1);
    $apptwosigs['apptwosig_'.$apptwosigkey] = $record->apptwosig;
  }
} else {
  echo "Error: " . $conn->error;
}

// close database connection
$conn->close();

foreach($images as $key => $item) {
        $templateProcessor->setImageValue($key, '../../comp_images/'.$item);
}
foreach($platmaps as $key => $item) {
  $templateProcessor->setImageValue($key, '../../comp_images/'.$item);
}
foreach($streetviews as $key => $item) {
  $templateProcessor->setImageValue($key, '../../comp_images/'.$item);
}
foreach($apponesigs as $key => $item) {
        $templateProcessor->setImageValue($key, '../../app_images/'.$item);
}
foreach($apptwosigs as $key => $item) {
  $templateProcessor->setImageValue($key, '../../app_images/'.$item);
}

$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
$templateProcessor->saveAs( $temp_file );
header( "Content-Disposition: attachment; filename=Eminent Domain - Industrial - Commercial - Land Comps.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
