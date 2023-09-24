<?php
ini_set("pcre.backtrack_limit", "10000000");

$templatePath = dirname(__FILE__).'/rentrowapartment.docx';
$outputFilename = 'ROW Multi-family Apartment Leases.docx';

require_once(dirname(__FILE__).'/../vendor/autoload.php');
require_once(dirname(__FILE__).'/../../../../includes/connect.php');

//extend class and add deleteRow function
class TemplateProcessor_my extends \PhpOffice\PhpWord\TemplateProcessor {
	public function deleteRow($search) {
		
		if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
			$search = '${' . $search . '}';
		}
		$tagPos = strpos($this->tempDocumentMainPart, $search);
		
		if (!$tagPos) {
			throw new Exception('Can not clone row, template variable not found or variable contains markup.');
		}
		$rowStart = $this->findRowStart($tagPos);
		$rowEnd = $this->findRowEnd($tagPos);
		$xmlRow = $this->getSlice($rowStart, $rowEnd);

		// Check if there's a cell spanning multiple rows.
		if (preg_match('#<w:vMerge w:val="restart"/>#', $xmlRow)) {
			// $extraRowStart = $rowEnd;
			$extraRowEnd = $rowEnd;
			while (true) {
				$extraRowStart = $this->findRowStart($extraRowEnd + 1);
				$extraRowEnd = $this->findRowEnd($extraRowEnd + 1);
				// If extraRowEnd is lower then 7, there was no next row found.
				if ($extraRowEnd < 7) {
					break;
				}
				// If tmpXmlRow doesn't contain continue, this row is no longer part of the spanned row.
				$tmpXmlRow = $this->getSlice($extraRowStart, $extraRowEnd);
				if (!preg_match('#<w:vMerge/>#', $tmpXmlRow) &&
					!preg_match('#<w:vMerge w:val="continue"\s*/>#', $tmpXmlRow)) {
					break;
				}
				// This row was a spanned row, update $rowEnd and search for the next row.
				$rowEnd = $extraRowEnd;
			}
			$xmlRow = $this->getSlice($rowStart, $rowEnd);
		}
		$result = str_replace($xmlRow, '', $this->tempDocumentMainPart);
		$this->tempDocumentMainPart = $result;
		return true;
	}
}

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \TemplateProcessor_my($templatePath);
$errors = [];

$_GET['id'] = $conn->real_escape_string($_GET['id']);
$sql ="select a.id, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS image, b.property_name as propname, concat(b.streetnumber,' ',b.streetname) as address, b.city, b.state, b.county, n.propertytype, o.subtype, p.genmarket, q.submarket, concat(c.year_built,IF(c.last_renovation = '','',c.last_renovation)) as yearbuilt, format(d.mf_no_unit,0) as nounits, format(d.mf_vacant_unit,0) as vacant, concat(d.mf_pct_vacancy,'%') as pctvacancy, c.no_stories as stories, c.const_descr as constr, r.definition as quality, s.definition as intc, t.definition as extc, u.definition as ptype, d.mf_parking_rent as prent, CONCAT(if(d.mf_spa = 2,'Spa, ',''), if(d.mf_exercise = 2,'Exercise Facility, ',''), if(d.mf_wd_hookup = 2,'Washer Dryer Hookups','')) as projamenities, d.mf_other_amenities as amenities, concat('$',format(d.mf_application_fee,0)) as appfee, concat('$',format(d.mf_movein_fee,0)) as movefee, IF(d.mf_non_refund = '','None',d.mf_non_refund) as refund, e.concessions_desc as concession, CONCAT(if(d.mf_landlord_water = 2,'Water, ',''), if(d.mf_landlord_trash = 2,'Trash, ',''), if(d.mf_landlord_gas = 2,'Gas, ',''), if(d.mf_landlord_hot_water = 2,'Hot Water, ',''), if(d.mf_landlord_heat = 2,'Heat, ',''), if(d.mf_landlord_internet = 2,'Internet, ',''), if(d.mf_landlord_cable = 2,'Cable, ',''), if(d.mf_landlord_sewer = 2,'Sewer, ',''), if(d.mf_landlord_insurance = 2,'Insurance, ',''), if(d.mf_landlord_rpt = 2,'RPT, ',''), if(d.mf_landlord_mgmt_fees = 2,'Management Fees, ',''), if(d.mf_landlord_cam = 2,'CAM','')) as llpays, REPLACE(e.lease_comment,'$','dollarsign') as leasecomments, e.confirm_1_source as source1, e.relationship_1 as relationship1, e.confirm_2_souce as source2, IF(e.relationship_2 = '','',CONCAT(', ',e.relationship_2)) as relationship2, e.datasource, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, CONCAT(ap2.firstname, IF(ap2.midname = '','',CONCAT(' ',ap2.midname,' ')), ap2.lastname, IF(ap2.designation = '','',CONCAT(', ',ap2.designation))) as confirm2, IF(ap1.digsignature = '','no-photo.jpg',CONCAT(ap1.id,'/',ap1.digsignature)) as apponesig, IF(ap2.digsignature = '','no-photo.jpg',CONCAT(ap2.id,'/',ap2.digsignature)) as apptwosig, DATE_FORMAT(e.confirm_date,'%c/%e/%Y') as confirmdate from report a join property b on b.FK_ReportID = a.id join building c on c.FK_ReportID = a.id join multifamily d on d.FK_ReportID = a.id join leasetrans e on e.FK_ReportID = a.id LEFT OUTER JOIN appraisers ap1 on ap1.id = e.confirm1 LEFT OUTER JOIN appraisers ap2 on ap2.id = e.confirm2 join propertytype n on n.id = b.propertytype join subtype o on o.id = b.propertysubtype join genmarket p on p.id = b.genmarket join submarket q on q.id = b.submarkid join WFDictionary r on r.id = c.building_quality join WFDictionary s on s.id = c.int_condition join WFDictionary t on t.id = c.ext_condition join WFDictionary u on u.id = d.mf_parking_type where a.id in (" . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")";

if ($result = $conn->query($sql)) {

	$templateProcessor->cloneBlock('clone', $result->num_rows, true, true);

	for ($m=1; $m <= $result->num_rows; $m++) {
		$record = $result->fetch_object();
		if($record != NULL) {	
			$templateProcessor->setValue('propname#'. $m, $record->propname, 1);
			$templateProcessor->setValue('address#'. $m, $record->address, 1);
			$templateProcessor->setValue('county#'. $m, $record->county, 1);
			$templateProcessor->setValue('city#'. $m, $record->city, 1);
			$templateProcessor->setValue('state#'. $m, $record->state, 1);
			$templateProcessor->setValue('genmarket#'. $m, $record->genmarket, 1);
			$templateProcessor->setValue('submarket#'. $m, $record->submarket, 1);
			$templateProcessor->setValue('subtype#'. $m, $record->subtype, 1);
			$templateProcessor->setImageValue('photo#'.$m, array('path' => '../../comp_images/' . $record->image, 'width' => 329, 'height' => 247, 'ratio' => false),1);
			$templateProcessor->setImageValue('apponesig#'.$m, array('path' => '../../comp_images/' . $record->apponesig, 'ratio' => false),1);
			$templateProcessor->setImageValue('apptwosig#'.$m, array('path' => '../../comp_images/' . $record->apptwosig, 'ratio' => false),1);
			$templateProcessor->setValue('yearbuilt#'. $m, $record->yearbuilt, 1);
			$templateProcessor->setValue('nounits#'. $m, $record->nounits, 1);
			$templateProcessor->setValue('vacant#'. $m, $record->vacant, 1);
			$templateProcessor->setValue('pctvacancy#'. $m, $record->pctvacancy, 1);
			$templateProcessor->setValue('stories#'. $m, $record->stories, 1);
			$templateProcessor->setValue('constr#'. $m, $record->constr, 1);
			$templateProcessor->setValue('quality#'. $m, $record->quality, 1);
			$templateProcessor->setValue('intc#'. $m, $record->intc, 1);
			$templateProcessor->setValue('extc#'. $m, $record->extc, 1);
			$templateProcessor->setValue('ptype#'. $m, $record->ptype, 1);
			$templateProcessor->setValue('prent#'. $m, $record->prent, 1);
			$templateProcessor->setValue('projamenities#'. $m, $record->projamenities, 1);
			$templateProcessor->setValue('amenities#'. $m, $record->amenities, 1);
			$templateProcessor->setValue('llpays#'. $m, $record->llpays, 1);
            $templateProcessor->setValue( 'leasecomments#'. $m, $record->leasecomments,1);
            $templateProcessor->tempDocumentMainPart = str_replace("dollarsign", "$", $templateProcessor->tempDocumentMainPart); 
            $templateProcessor->setValue( 'confirm1#'. $m, $record->confirm1,1);
            $templateProcessor->setValue( 'confirm2#'. $m, $record->confirm2,1);
            $templateProcessor->setValue( 'source1#'. $m, $record->source1,1);
            $templateProcessor->setValue( 'source2#'. $m, $record->source2,1);
            $templateProcessor->setValue( 'relationship1#'. $m, $record->relationship1,1);
            $templateProcessor->setValue( 'relationship2#'. $m, $record->relationship2,1);
            $templateProcessor->setValue( 'datasource#'. $m, $record->datasource,1);
			$templateProcessor->setValue('confirmdate#'. $m, $record->confirmdate, 1);
						
			$sql2 = "select FK_ReportID, mfsize, format(mftotalsf,0) as mftotalsf, format(mfrent,2) as mfrent, format(mfrentsf,2) as mfrentsf from mfmatrix where FK_ReportID in (" . $record->id . ") order by FIELD(FK_ReportID,'" . $record->id. "')";
			if ($result2 = $conn->query($sql2)) {
				//remove first row (bug with the top border)
				//$templateProcessor->deleteRow('first-row');

				$numRecords =$result2->num_rows;
				$templateProcessor->cloneRow('unit-type#'.$m, $numRecords);
				
				$values = [];
				for ($j=0; $j < $numRecords; $j++) { 
					# code...
					$record2 = $result2->fetch_object();
					$values[] = [
						'FK_ReportID' => $record2->FK_ReportID,
						'mfsize' => $record2->mfsize,
						'mftotalsf' => $record2->mftotalsf,
						'mfrent' => $record2->mfrent,
						'mfrentsf' => $record2->mfrentsf
					];
				}	
				for ($i = 1;  $i <= $numRecords ; $i++) {		
				 	$templateProcessor->setValue('unit-type#'.$m.'#'. $i, $values[$i-1]['mfsize'], 1);
					$templateProcessor->setValue('size#'.$m.'#'. $i, $values[$i-1]['mftotalsf'], 1);
					$templateProcessor->setValue('rent#'.$m.'#'. $i, $values[$i-1]['mfrent'], 1);
					$templateProcessor->setValue('rent-sf#'.$m.'#'. $i, $values[$i-1]['mfrentsf'], 1);
			 	}
			}
		}
	}
}

//close database connection
$conn->close();

//show errors and exit
if(!empty($errors)) {
	echo nl2br(htmlspecialchars(implode("\n", array_unique($errors))));
	exit;
}

$temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');

//<TO UNCOMMENT>
 header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="'.$outputFilename.'"');
header('Cache-Control: max-age=0');
$templateProcessor->saveAs($temp_file); 
readfile($temp_file); // or echo file_get_contents($temp_file);
unlink($temp_file); // remove temp file


//TESTING
//$templateProcessor->saveAs($outputFilename);

