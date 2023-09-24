<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, b.legal_desc as legal, sm.submarket, pt.propertytype as proptype, st.subtype as subtype, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS image, d.grantor, d.grantee, FORMAT(d.sale_price,0) as saleprice, FORMAT(d.eff_sale_price_stab,0) as effpricestab, CONCAT(' ',d.adj_price_comment) as adjcomment, d.type_finance as fintype, p.definition as proprights, DATE_FORMAT(d.record_date, '%c/%e/%Y') as recdate, if(d.record_date_two > '1901-01-01',CONCAT(' & ',DATE_FORMAT(d.record_date_two, '%c/%e/%Y')),'') as recdatetwo, IF(d.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, d.conv_doc_rec_no as docno, IF(d.conv_doc_type = 3,'',CONCAT(' ',cdt.definition)) as doctype, d.market_time as markettime, e.no_lots as nolots, trl.definition as typeresland, e.unit_lot_type as lottype, b.zoning_code as zcode, b.zoning_desc as zdesc, e.fut_finish_size_range as finsizerange, e.fut_finish_size_avg as finsizeavg, lt.definition as topography, e.original_price as origprice, e.report_price_lot as reportpricelot, e.ind_sale_pct_discount as pctdiscount, e.other_lot_comment as lotcomments, e.project_amenities as amenities, e.fut_avg_home_price as avgfutpricehome, e.lot_home_price_ratio as lthspratio, FORMAT(e.bulk_price_lot,0) as bulkpricelot, FORMAT(e.bulk_price_sf_avg,2) as bulkpricesf, d.sale_comments as salecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id LEFT OUTER JOIN resland e on e.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN propertytype pt on pt.id = b.propertytype LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN assessedvalues f on f.FK_ReportID = a.id LEFT OUTER JOIN WFDictionary p on p.id = d.prop_rights_conv LEFT OUTER JOIN WFDictionary ss on ss.id = d.sale_status LEFT OUTER JOIN WFDictionary cdt on cdt.id = d.conv_doc_type LEFT OUTER JOIN WFDictionary top on top.id = b.topography LEFT OUTER JOIN WFDictionary shp on shp.id = b.shape LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access LEFT OUTER JOIN WFDictionary lt on lt.id = e.lot_topography LEFT OUTER JOIN WFDictionary fp on fp.id = b.flood_plain LEFT OUTER JOIN WFDictionary ex on ex.id = b.exposure LEFT OUTER JOIN WFDictionary trl on trl.id = e.type_residential_land WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'sfbulk.docx' );
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
    $templateProcessor->setValue( 'nolots', $record->nolots,1);
    $templateProcessor->setValue( 'lottype', $record->lottype,1);
    $templateProcessor->setValue( 'typeresland', $record->typeresland,1);
    $templateProcessor->setValue( 'topography', $record->topography,1);
    $templateProcessor->setValue( 'amenities', $record->amenities,1);
    $templateProcessor->setValue( 'finsizerange', $record->finsizerange,1);
    $templateProcessor->setValue( 'finsizeavg', $record->finsizeavg,1);
    $templateProcessor->setValue( 'landcomments', $record->landcomments,1);
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1); 
    $templateProcessor->setValue( 'origprice', $record->origprice,1); 
    $templateProcessor->setValue( 'reportpricelot', $record->reportpricelot,1); 
    $templateProcessor->setValue( 'pctdiscount', $record->pctdiscount,1); 
    $templateProcessor->setValue( 'lotcomments', $record->lotcomments,1); 
    $templateProcessor->setValue( 'bulkpricelot', $record->bulkpricelot,1); 
    $templateProcessor->setValue( 'bulkpricesf', $record->bulkpricesf,1); 
    $templateProcessor->setValue( 'avgfutpricehome', $record->avgfutpricehome,1);
    $templateProcessor->setValue( 'lthspratio', $record->lthspratio,1);
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
header( "Content-Disposition: attachment; filename=Single Family Bulk Land Sales.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
