<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS image, b.property_name AS propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, b.legal_desc as legal, sm.submarket, pt.propertytype as proptype, IF(st.subtype = '---','',CONCAT(' ',st.subtype)) as subtype, d.grantor, d.grantee, FORMAT(d.sale_price,0) as saleprice, FORMAT(d.eff_sale_price_stab,0) as effpricestab, CONCAT(' ',d.adj_price_comment) as adjcomment, d.type_finance as fintype, p.definition as proprights, DATE_FORMAT(d.record_date, '%c/%e/%Y') as recdate, if(d.record_date_two > '1901-01-01',CONCAT(' & ',DATE_FORMAT(d.record_date_two, '%c/%e/%Y')),'') as recdatetwo, IF(d.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, d.conv_doc_rec_no as docno, IF(d.conv_doc_type = 3,'',CONCAT(' ',cdt.definition)) as doctype, d.market_time as markettime, FORMAT(b.gross_land_acre,3) as grossacre, FORMAT(b.gross_land_sf,0) as grosssf, FORMAT(b.net_usable_acre,3) as netacre, FORMAT(b.net_usable_sf,0) as netsf, FORMAT(((b.net_usable_acre/b.gross_land_acre)*100),1) as netpct, top.definition as topography, shp.definition as shape, sa.definition as access, ex.definition as exposure, b.other_land_comments as landcomments, fp.definition as floodplain, b.easement_desc as easedesc, me.definition as rurelec, mw.definition as munwater, ms.definition as munsewer, mws.definition as wellseptic, b.zoning_desc as zdesc, b.zoning_code as zcode, b.fut_zoning_code as futzcode, b.fut_zoning_desc as futzdesc, b.fut_zoning_juris as futzjuris, b.rezone_time as rezone, FORMAT(d.adj_price_acre_gross,0) as adjacregross, FORMAT(d.adj_price_acre_net,0) as adjacrenet, d.sale_comments as salecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id LEFT OUTER JOIN resland e on e.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN propertytype pt on pt.id = b.propertytype LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN assessedvalues f on f.FK_ReportID = a.id LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN WFDictionary p on p.id = d.prop_rights_conv LEFT OUTER JOIN WFDictionary ss on ss.id = d.sale_status LEFT OUTER JOIN WFDictionary cdt on cdt.id = d.conv_doc_type LEFT OUTER JOIN WFDictionary top on top.id = b.topography LEFT OUTER JOIN WFDictionary shp on shp.id = b.shape LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access LEFT OUTER JOIN WFDictionary fp on fp.id = b.flood_plain LEFT OUTER JOIN WFDictionary ex on ex.id = b.exposure LEFT OUTER JOIN WFDictionary me on me.id = b.rural_electricity LEFT OUTER JOIN WFDictionary mw on mw.id = b.municiple_water LEFT OUTER JOIN WFDictionary ms on ms.id = b.municiple_sewer LEFT OUTER JOIN WFDictionary mws on mws.id = b.well_septic WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'rural.docx' );
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
    $templateProcessor->setValue( 'grossacre', $record->grossacre,1);
    $templateProcessor->setValue( 'netacre', $record->netacre,1);
    $templateProcessor->setValue( 'grosssf', $record->grosssf,1);
    $templateProcessor->setValue( 'netpct', $record->netpct,1);
    $templateProcessor->setValue( 'adjacregross', $record->adjacregross,1);
    $templateProcessor->setValue( 'adjacrenet', $record->adjacrenet,1);
    $templateProcessor->setValue( 'topography', $record->topography,1);
    $templateProcessor->setValue( 'shape', $record->shape,1);
    $templateProcessor->setValue( 'access', $record->access,1);
    $templateProcessor->setValue( 'exposure', $record->exposure,1);
    $templateProcessor->setValue( 'floodplain', $record->floodplain,1);
    $templateProcessor->setValue( 'easedesc', $record->easedesc,1);
    $templateProcessor->setValue( 'landcomments', $record->landcomments,1);
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1); 
    $templateProcessor->setValue( 'futzcode', $record->futzcode,1);
    $templateProcessor->setValue( 'futzjuris', $record->futzjuris,1); 
    $templateProcessor->setValue( 'futzdesc', $record->futzdesc,1); 
    $templateProcessor->setValue( 'rezone', $record->rezone,1);      
    $templateProcessor->setValue( 'rurelec', $record->rurelec,1);
    $templateProcessor->setValue( 'munwater', $record->munwater,1);
    $templateProcessor->setValue( 'munsewer', $record->munsewer,1);
    $templateProcessor->setValue( 'wellseptic', $record->wellseptic,1);     
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
header( "Content-Disposition: attachment; filename=Agriculture Rural Land Sales.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
