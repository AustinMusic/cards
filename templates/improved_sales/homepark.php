<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, b.legal_desc as legal, sm.submarket, st.subtype, IF(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as image, d.grantor, d.grantee, FORMAT(d.sale_price,0) as saleprice, FORMAT(d.eff_sale_price_stab,0) as effpricestab, IF(d.adj_price_comment = '','',CONCAT(' - ',d.adj_price_comment)) as adjcomment, d.type_finance as fintype, p.definition as proprights, DATE_FORMAT(d.record_date, '%c/%e/%Y') as recdate, IF(d.sale_status = 3,'',CONCAT(' ',ss.definition)) as salestatus, d.conv_doc_rec_no as docno, IF(d.conv_doc_type = 3,'',CONCAT(' ',cdt.definition)) as doctype, d.market_time as markettime, c.year_built as yearbt, CONCAT(' ',c.last_renovation) as reno, b.zoning_code as zcode, b.zoning_desc as zdesc, b.primary_acre as primacre, FORMAT(b.primary_sf,0) as primsf, pq.definition as pquality, pc.definition as pcond, FORMAT(h.total_space,0) as spaces, h.space_acre as density, c.oe_income_actual_proforma as proforma, c.oe_income_source as isource, FORMAT(c.oe_pgi,0) as pgi, FORMAT(c.pgi_sf_nra,2) as pgisfnra, CONCAT(FORMAT(c.oe_vacany_pct,1), '%') as vacpct, FORMAT(c.oe_vacancy_credit_loss,0) as vaccredloss, FORMAT(c.vacancy_sf_nra,2) as vacsfnra, FORMAT(c.oe_egi,0) as egi, FORMAT(c.egi_sf_nra,2) as egisfnra, CONCAT(FORMAT(c.oe_expence_ratio,1),'%') as expratio, FORMAT(c.oe_expences,0) as expences, FORMAT(c.expence_sf_nra,2) as expsfnra, FORMAT(c.oe_total_noi,0) as noi, FORMAT(c.oe_noi_sf_nra,2) as noisfnra, FORMAT(h.pgi_unit,2) as pgiunit, FORMAT(h.vacancy_unit,2) as vacunit, FORMAT(h.egi_unit,2) as egiunit, FORMAT(h.expense_unit,2) as expunit, FORMAT(h.noi_unit,2) as noiunit, FORMAT(d.adj_price_unit,0) as adjunit, CONCAT(FORMAT(d.cap_rate,2),'%') as caprate, FORMAT(d.adj_price_sf_gba,2) as adjsfgba, CONCAT(FORMAT(d.egim,2),'x') as egim, d.sale_comments as salecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN saletrans d on d.FK_ReportID = a.id LEFT OUTER JOIN proptypedetails g on g.FK_ReportID = a.id LEFT OUTER JOIN impunit h on h.FK_ReportID = a.id LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN WFDictionary p on p.id = d.prop_rights_conv LEFT OUTER JOIN WFDictionary ss on ss.id = d.sale_status LEFT OUTER JOIN WFDictionary cdt on cdt.id = d.conv_doc_type LEFT OUTER JOIN WFDictionary ot on ot.id = c.occupancy_type LEFT OUTER JOIN WFDictionary bq on bq.id = c.building_quality  LEFT OUTER JOIN WFDictionary pq on pq.id = h.park_quality LEFT OUTER JOIN WFDictionary pc on pc.id = h.park_cond WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'homepark.docx' );
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
    $templateProcessor->setValue( 'adjcomment', $record->adjcomment,1);
    $templateProcessor->setValue( 'proprights', $record->proprights,1);
    $templateProcessor->setValue( 'salestatus', $record->salestatus,1);
    $templateProcessor->setValue( 'docno', $record->docno,1);
    $templateProcessor->setValue( 'doctype', $record->doctype,1);
    $templateProcessor->setValue( 'markettime', $record->markettime,1);
    $templateProcessor->setValue( 'yearbt', $record->yearbt,1);
    $templateProcessor->setValue( 'reno', $record->reno,1);
    $templateProcessor->setValue( 'proforma', $record->proforma,1);
    $templateProcessor->setValue( 'isource', $record->isource,1);
    $templateProcessor->setValue( 'vacpct', $record->vacpct,1);
    $templateProcessor->setValue( 'expratio', $record->expratio,1);
    $templateProcessor->setValue( 'pgi', $record->pgi,1);
    $templateProcessor->setValue( 'expences', $record->expences,1);
    $templateProcessor->setValue( 'vaccredloss', $record->vaccredloss,1);
    $templateProcessor->setValue( 'egi', $record->egi,1);
    $templateProcessor->setValue( 'noi', $record->noi,1);
    $templateProcessor->setValue( 'adjunit', $record->adjunit,1);
    $templateProcessor->setValue( 'pgiunit', $record->pgiunit,1);
    $templateProcessor->setValue( 'vacunit', $record->vacunit,1);
    $templateProcessor->setValue( 'egiunit', $record->egiunit,1);
    $templateProcessor->setValue( 'expunit', $record->expunit,1);
    $templateProcessor->setValue( 'noiunit', $record->noiunit,1);
    $templateProcessor->setValue( 'caprate', $record->caprate,1);
    $templateProcessor->setValue( 'egim', $record->egim,1);
    $templateProcessor->setValue( 'zcode', $record->zcode,1);
    $templateProcessor->setValue( 'zdesc', $record->zdesc,1); 
    $templateProcessor->setValue( 'primacre', $record->primacre,1);
    $templateProcessor->setValue( 'primsf', $record->primsf,1);
    $templateProcessor->setValue( 'pquality', $record->pquality,1);
    $templateProcessor->setValue( 'pcond', $record->pcond,1);
    $templateProcessor->setValue( 'spaces', $record->spaces,1);
    $templateProcessor->setValue( 'density', $record->density,1);  
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
header( "Content-Disposition: attachment; filename=Mobile Home Park Improved Sales.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
