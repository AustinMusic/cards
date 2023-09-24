<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, IF(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as image, gm.genmarket, sm.submarket, st.subtype, c.year_built as yearbt, CONCAT(' ',c.last_renovation) as reno, FORMAT(c.overall_gba,0) as gba, FORMAT(c.overall_nra,0) as nra, FORMAT(c.vacancy_sf_nra,0) as vacsfnra, CONCAT(FORMAT(c.inline_vacancy_pct,2),'%') as inlinevacpct, ot.definition as occupancy, c.no_stories as stories, c.const_descr as constdesc, bq.definition as bquality, ec.definition as extc, ic.definition as intc, c.other_const_features as constfeat, FORMAT(b.gross_land_sf,0) as grosssf, c.parking_ratio as pratio, c.land_build_ratio_primary as ltbprim, sa.definition as access, exp.definition as exposure, g.shop_other_tenant as othtens, d.lessee_name as lessee, FORMAT(d.tenant_area_sf,0) as tenantsf, DATE_FORMAT(d.lease_start_date,'%c/%e/%Y') as startdate, IF(d.lease_start_comment = '','',CONCAT(' - ',d.lease_start_comment)) as startcomment, d.total_lease_term_mos as leaseterms, CONCAT(' ',mos.definition) as mos, d.lease_option_desc as optiondesc, let.definition as expterm, d.tenant_paid_cam_sf_yr as camsfyr, nor.definition as renewal, sgen.definition as spacegen, spos.definition as spacepos, FORMAT(d.init_rent_sf_yr,2) as initsfyr, d.lease_esc_terms_desc as escdesc, d.percentage_rent as pctrent, d.concessions_desc as consessdesc, d.desc_ti as tidesc, FORMAT(d.eff_rent_sf_yr,2) as effsfyr, IF(d.eff_rent_comment_1 = '','',CONCAT(' - ',d.eff_rent_comment_1)) AS effcomment, d.lease_comment as leasecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN leasetrans d on d.FK_ReportID = a.id LEFT OUTER JOIN proptypedetails g on g.FK_ReportID = a.id LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN genmarket gm on gm.id = b.genmarket LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN WFDictionary ot on ot.id = c.occupancy_type LEFT OUTER JOIN WFDictionary bq on bq.id = c.building_quality LEFT OUTER JOIN WFDictionary ec on ec.id = c.ext_condition LEFT OUTER JOIN WFDictionary ic on ic.id = c.int_condition LEFT OUTER JOIN WFDictionary sa on sa.id = b.site_access LEFT OUTER JOIN WFDictionary exp on exp.id = b.exposure LEFT OUTER JOIN WFDictionary ori on ori.id = b.orientation LEFT OUTER JOIN WFDictionary nor on nor.id = d.new_renewal LEFT OUTER JOIN WFDictionary sgen on sgen.id = d.space_generation LEFT OUTER JOIN WFDictionary spos on spos.id = d.space_position LEFT OUTER JOIN WFDictionary mos on mos.id = d.mos_vs_mos LEFT OUTER JOIN WFDictionary let on let.id = d.lease_expense_term WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
  $phpWord = new\ PhpOffice\ PhpWord\ PhpWord();
  $templateProcessor = new\ PhpOffice\ PhpWord\ TemplateProcessor( 'commmulti.docx' );
  $templateProcessor->cloneBlock('my_block', $result->num_rows);
  $imagekey=0; $images=[];
  // Creating the new document...  
  while ( $record = $result->fetch_object() ) {    
    $imagekey++;
    $templateProcessor->setValue( 'propname', $record->propname,1);
    $templateProcessor->setValue( 'address', $record->address,1);
    $templateProcessor->setValue( 'citystate', $record->citystate,1);
    $templateProcessor->setValue( 'county', $record->county,1);  
    $templateProcessor->setValue( 'genmarket', $record->genmarket,1);
    $templateProcessor->setValue( 'submarket', $record->submarket,1);
    $templateProcessor->setValue( 'proptype', $record->proptype,1);
    $templateProcessor->setValue( 'subtype', $record->subtype,1);
    $templateProcessor->setValue( 'grosssf', $record->grosssf,1);
    $templateProcessor->setValue( 'yearbt', $record->yearbt,1);
    $templateProcessor->setValue( 'reno', $record->reno,1);
    $templateProcessor->setValue( 'gba', $record->gba,1);
    $templateProcessor->setValue( 'nra', $record->nra,1);
    $templateProcessor->setValue( 'vacsfnra', $record->vacsfnra,1);
    $templateProcessor->setValue( 'inlinevacpct', $record->inlinevacpct,1);
    $templateProcessor->setValue( 'occupancy', $record->occupancy,1);
    $templateProcessor->setValue( 'stories', $record->stories,1);
    $templateProcessor->setValue( 'constdesc', $record->constdesc,1);
    $templateProcessor->setValue( 'bquality', $record->bquality,1);
    $templateProcessor->setValue( 'extc', $record->extc,1);
    $templateProcessor->setValue( 'intc', $record->intc,1);
    $templateProcessor->setValue( 'constfeat', $record->constfeat,1);
    $templateProcessor->setValue( 'pratio', $record->pratio,1);
    $templateProcessor->setValue( 'ltbprim', $record->ltbprim,1);
    $templateProcessor->setValue( 'access', $record->access,1);
    $templateProcessor->setValue( 'exposure', $record->exposure,1);
    $templateProcessor->setValue( 'orientation', $record->orientation,1); 
    $templateProcessor->setValue( 'othtens', $record->othtens,1);
    $templateProcessor->setValue( 'lessee', $record->lessee,1);   
    $templateProcessor->setValue( 'tenantsf', $record->tenantsf,1); 
    $templateProcessor->setValue( 'startdate', $record->startdate,1); 
    $templateProcessor->setValue( 'startcomment', $record->startcomment,1); 
    $templateProcessor->setValue( 'leaseterms', $record->leaseterms,1); 
    $templateProcessor->setValue( 'mos', $record->mos,1); 
    $templateProcessor->setValue( 'optiondesc', $record->optiondesc,1); 
    $templateProcessor->setValue( 'expterm', $record->expterm,1); 
    $camsfyr = str_replace("$", "dollarsign", $record->camsfyr);
    $templateProcessor->setValue( 'camsfyr', $camsfyr,1); 
    $templateProcessor->setValue( 'renewal', $record->renewal,1); 
    $templateProcessor->setValue( 'spacegen', $record->spacegen,1); 
    $templateProcessor->setValue( 'spacepos', $record->spacepos,1); 
    $templateProcessor->setValue( 'initsfyr', $record->initsfyr,1);
    $escdesc = str_replace("$", "dollarsign", $record->escdesc); 
    $templateProcessor->setValue( 'escdesc', $escdesc,1); 
    $pctrent = str_replace("$", "dollarsign", $record->pctrent); 
    $templateProcessor->setValue( 'pctrent', $pctrent,1); 
    $consessdesc = str_replace("$", "dollarsign", $record->consessdesc);
    $templateProcessor->setValue( 'consessdesc', $consessdesc,1); 
    $tidesc = str_replace("$", "dollarsign", $record->tidesc);
    $templateProcessor->setValue( 'tidesc', $tidesc,1); 
    $templateProcessor->setValue( 'effsfyr', $record->effsfyr,1); 
    $templateProcessor->setValue( 'effcomment', $record->effcomment,1); 
    $templateProcessor->setValue( 'effanntunnel', $record->effanntunnel,1); 
    $templateProcessor->setValue( 'confirm1', $record->confirm1,1);
    $templateProcessor->setValue( 'source1', $record->source1,1);
    $templateProcessor->setValue( 'source2', $record->source2,1);
    $templateProcessor->setValue( 'confirmdate', $record->confirmdate,1);
    $leasecomments = str_replace("$", "dollarsign", $record->leasecomments);
    $templateProcessor->setValue( 'leasecomments', $leasecomments,1);
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
header( "Content-Disposition: attachment; filename=Commercial Multi-tenant Leases.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
