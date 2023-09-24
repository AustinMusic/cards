<?php
<?php
require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ( $result = $conn->query( "SELECT a.id, b.property_name as propname, CONCAT(b.streetnumber,' ',b.streetname) as address, CONCAT(b.city,', ', b.state) as citystate, b.county, IF(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as image, gm.genmarket, sm.submarket, st.subtype, c.year_built as yearbt, CONCAT(' ',c.last_renovation) as reno, m.mf_total_spaces as spaces, m.mf_vacant_unit as vacancy, CONCAT(FORMAT(m.mf_pct_vacancy,1),'%') AS vacpct, pkt.definition as ptype, pc.definition as pcond, pq.definition as pquality, m.mf_unit_absorb_mo as unitabsorbmo, m.mf_no_single as nosing, m.mf_no_double as nodoub, m.mf_no_triple as notrip, m.mf_no_rv_spaces as norv, format(m.mf_sw_low_rent,0) as swlowrent, format(m.mf_sw_high_rent,0) as swhighrent, format(m.mf_sw_avg_rent,0) as swavgrent, format(m.mf_dw_low_rent,0) as dwlowrent, format(m.mf_dw_high_rent,0) as dwhighrent, format(m.mf_dw_avg_rent,0) as dwavgrent, format(m.mf_tw_low_rent,0) as twlowrent, format(m.mf_tw_high_rent,0) as twhighrent, format(m.mf_tw_avg_rent,0) as twavgrent, format(m.mf_rv_low_rent,0) as rvlowrent, format(m.mf_rv_high_rent,0) as rvhighrent, format(m.mf_rv_avg_rent,0) as rvavgrent, m.mf_last_increase as lastinc, CONCAT(if(m.mf_spa = 2,'Spa, ',''), if(m.mf_exercise = 2,'Exercise Facility, ',''), if(m.mf_wd_hookup = 2,'Washer Dryer Hookup','')) as projamenities, CONCAT(if(m.mf_landlord_water = 2,'Water, ',''), if(m.mf_landlord_trash = 2,'Trash, ',''), if(m.mf_landlord_gas = 2,'Gas, ',''), if(m.mf_landlord_hot_water = 2,'Hot Water, ',''), if(m.mf_landlord_heat = 2,'Heat, ',''), if(m.mf_landlord_internet = 2,'Internet, ',''), if(m.mf_landlord_cable = 2,'Cable, ',''), if(m.mf_landlord_sewer = 2,'Sewer, ',''), if(m.mf_landlord_rpt = 2,'RPT, ',''), if(m.mf_landlord_insurance = 2,'Insurance, ',''), if(m.mf_landlord_mgmt_fees = 2,'Management Fees, ',''), if(m.mf_landlord_cam = 2,'CAM','')) as llpays, d.concessions_desc as consessdesc, y.no_mos_absorb as nomoabsorb, d.lease_comment as leasecomments, d.confirm_1_source as source1, d.confirm_2_souce as source2, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, DATE_FORMAT(d.confirm_date, '%c/%e/%Y') as confirmdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN leasetrans d on d.FK_ReportID = a.id LEFT OUTER JOIN multifamily m on m.FK_ReportID = a.id LEFT OUTER JOIN yardabsorb y on y.FK_ReportID = a.id LEFT OUTER JOIN appraisers ap1 on ap1.id = d.confirm1 LEFT OUTER JOIN subtype st on st.id = b.propertysubtype LEFT OUTER JOIN genmarket gm on gm.id = b.genmarket LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER JOIN WFDictionary pkt on pkt.id = b.park_type LEFT OUTER JOIN WFDictionary pc on pc.id = m.park_cond LEFT OUTER JOIN WFDictionary pq on pq.id = m.park_quality WHERE a.id in (" . $_GET[ 'id' ] . ") group by FIELD(a.id," . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")" ) ) {
 
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
    $templateProcessor->setValue( 'genmarket', $record->genmarket,1);
    $templateProcessor->setValue( 'submarket', $record->submarket,1);
    $templateProcessor->setValue( 'proptype', $record->proptype,1);
    $templateProcessor->setValue( 'subtype', $record->subtype,1);
    $templateProcessor->setValue( 'yearbt', $record->yearbt,1);
    $templateProcessor->setValue( 'reno', $record->reno,1);
    $templateProcessor->setValue( 'spaces', $record->spaces,1);
    $templateProcessor->setValue( 'vacancy', $record->vacancy,1);
    $templateProcessor->setValue( 'vacpct', $record->vacpct,1);
    $templateProcessor->setValue( 'ptype', $record->ptype,1);
    $templateProcessor->setValue( 'pcond', $record->pcond,1);
    $templateProcessor->setValue( 'pquality', $record->pquality,1);
    $templateProcessor->setValue( 'unitabsorbmo', $record->unitabsorbmo,1);
    $templateProcessor->setValue( 'nosing', $record->nosing,1);
    $templateProcessor->setValue( 'nodoub', $record->nodoub,1);
    $templateProcessor->setValue( 'notrip', $record->notrip,1);
    $templateProcessor->setValue( 'norv', $record->norv,1);
    $templateProcessor->setValue( 'swlowrent', $record->swlowrent,1);
    $templateProcessor->setValue( 'swhighrent', $record->swhighrent,1);
    $templateProcessor->setValue( 'swavgrent', $record->swavgrent,1);
    $templateProcessor->setValue( 'dwlowrent', $record->dwlowrent,1);
    $templateProcessor->setValue( 'dwhighrent', $record->dwhighrent,1);
    $templateProcessor->setValue( 'dwavgrent', $record->dwavgrent,1);
    $templateProcessor->setValue( 'twlowrent', $record->twlowrent,1);
    $templateProcessor->setValue( 'twhighrent', $record->twhighrent,1);
    $templateProcessor->setValue( 'twavgrent', $record->twavgrent,1);
    $templateProcessor->setValue( 'rvlowrent', $record->rvlowrent,1);
    $templateProcessor->setValue( 'rvhighrent', $record->rvhighrent,1);
    $templateProcessor->setValue( 'rvavgrent', $record->rvavgrent,1);
    $templateProcessor->setValue( 'lastinc', $record->lastinc,1);
    $templateProcessor->setValue( 'nomoabsorb', $record->nomoabsorb,1);
    $templateProcessor->setValue( 'projamenities', $record->projamenities,1);
    $templateProcessor->setValue( 'llpays', $record->llpays,1);
    $consessdesc = str_replace("$", "dollarsign", $record->consessdesc);
    $templateProcessor->setValue( 'consessdesc', $consessdesc,1); 
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
header( "Content-Disposition: attachment; filename=Mobile Home Park Leases.docx" );
readfile( $temp_file ); // or echo file_get_contents($temp_file);
unlink( $temp_file ); // remove temp file
