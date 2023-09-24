<?php
ini_set("pcre.backtrack_limit", "10000000");

$templatePath = dirname(__FILE__).'/rentrowstorage.docx';
$outputFilename = 'ROW Self Storage Leases.docx';

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
$sql ="select a.id, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS image, b.property_name as propname, concat(b.streetnumber,' ',b.streetname) as address, b.city, b.state, b.county, o.subtype, p.genmarket, q.submarket, concat(c.year_built,IF(c.last_renovation = '','',c.last_renovation)) as yearbuilt, c.no_building as nobldgs, c.no_stories as stories, c.const_descr as constr, r.definition as quality, s.definition as intc, t.definition as extc, m.ms_total_units as nounits, m.ms_no_vacant_unit as vacant, CONCAT(FORMAT(m.ms_pct_vacant_unit,1),'%') as pctvacancy, m.ms_vacancy_comment as vaccomment, osm.definition as onsitemgr, m.ms_manager_res as mgrres, CONCAT(if(m.ms_coded_access = 2,'Coded Access, ',''), if(m.ms_alarm = 2,'Alarmed Units, ',''), if(m.ms_heated_unit = 2,'Heated Units','')) as siteamenities, m.ms_access_hours as hours, m.ms_concessions as concessions, REPLACE(e.lease_comment,'$','dollarsign') as leasecomments, e.confirm_1_source as source1, e.relationship_1 as relationship1, e.confirm_2_souce as source2, IF(e.relationship_2 = '','',CONCAT(', ',e.relationship_2)) as relationship2, e.datasource, CONCAT(ap1.firstname, IF(ap1.midname = '','',CONCAT(' ',ap1.midname,' ')), ap1.lastname, IF(ap1.designation = '','',CONCAT(', ',ap1.designation))) as confirm1, CONCAT(ap2.firstname, IF(ap2.midname = '','',CONCAT(' ',ap2.midname,' ')), ap2.lastname, IF(ap2.designation = '','',CONCAT(', ',ap2.designation))) as confirm2, IF(ap1.digsignature = '','no-photo.jpg',CONCAT(ap1.id,'/',ap1.digsignature)) as apponesig, IF(ap2.digsignature = '','no-photo.jpg',CONCAT(ap2.id,'/',ap2.digsignature)) as apptwosig, DATE_FORMAT(e.confirm_date,'%c/%e/%Y') as confdate FROM report a JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building c on c.FK_ReportID = a.id LEFT OUTER JOIN selfstorage m on m.FK_ReportID = a.id LEFT OUTER JOIN leasetrans e on e.FK_ReportID = a.id LEFT OUTER JOIN appraisers ap1 on ap1.id = e.confirm1 LEFT OUTER JOIN appraisers ap2 on ap2.id = e.confirm2 join subtype o on o.id = b.propertysubtype join genmarket p on p.id = b.genmarket join submarket q on q.id = b.submarkid join WFDictionary r on r.id = c.building_quality join WFDictionary s on s.id = c.int_condition join WFDictionary t on t.id = c.ext_condition LEFT OUTER JOIN WFDictionary osm on osm.id = m.ms_onsite_mgr where a.id in (" . $_GET[ 'id' ] . ") order by FIELD(a.id," . $_GET[ 'id' ] . ")";

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
			$templateProcessor->setValue('nobldgs#'. $m, $record->nobldgs, 1);
			$templateProcessor->setValue('stories#'. $m, $record->stories, 1);
			$templateProcessor->setValue('constr#'. $m, $record->constr, 1);
			$templateProcessor->setValue('quality#'. $m, $record->quality, 1);
			$templateProcessor->setValue('vaccomment#'. $m, $record->vaccomment, 1);
			$templateProcessor->setValue('extc#'. $m, $record->extc, 1);
			$templateProcessor->setValue('intc#'. $m, $record->intc, 1);
			$templateProcessor->setValue('onsitemgr#'. $m, $record->onsitemgr, 1);
			$templateProcessor->setValue('mgrres#'. $m, $record->mgrres, 1);
			$templateProcessor->setValue('siteamenities#'. $m, $record->siteamenities, 1);
			$templateProcessor->setValue('hours#'. $m, $record->hours, 1);
			$templateProcessor->setValue('concessions#'. $m, $record->concessions, 1);
            $templateProcessor->setValue( 'leasecomments#'. $m, $record->leasecomments,1);
            $templateProcessor->tempDocumentMainPart = str_replace("dollarsign", "$", $templateProcessor->tempDocumentMainPart);            
            $templateProcessor->setValue( 'confirm1#'. $m, $record->confirm1,1);
            $templateProcessor->setValue( 'confirm2#'. $m, $record->confirm1,1);
            $templateProcessor->setValue( 'source1#'. $m, $record->source1,1);
            $templateProcessor->setValue( 'source2#'. $m, $record->source2,1);
            $templateProcessor->setValue( 'relationship1#'. $m, $record->relationship1,1);
            $templateProcessor->setValue( 'relationship2#'. $m, $record->relationship2,1);
            $templateProcessor->setValue( 'datasource#'. $m, $record->datasource,1);
			$templateProcessor->setValue('confdate#'. $m, $record->confdate, 1);
						
			$sql2 = "select FK_ReportID, sssize, ssunittype, format(ssrentmo,2) as ssrentmo, format(ssrentsf,2) as ssrentsf from ssmatrix where FK_ReportID in (" . $record->id . ") order by FIELD(FK_ReportID,'" . $record->id. "')";
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
						'sssize' => $record2->sssize,
						'ssunittype' => $record2->ssunittype,
						'ssrentmo' => $record2->ssrentmo,
						'ssrentsf' => $record2->ssrentsf
					];
				}	
				for ($i = 1;  $i <= $numRecords ; $i++) {		
				 	$templateProcessor->setValue('unit-type#'.$m.'#'. $i, $values[$i-1]['sssize'], 1);
					$templateProcessor->setValue('size#'.$m.'#'. $i, $values[$i-1]['ssunittype'], 1);
					$templateProcessor->setValue('rent#'.$m.'#'. $i, $values[$i-1]['ssrentmo'], 1);
					$templateProcessor->setValue('rent-sf#'.$m.'#'. $i, $values[$i-1]['ssrentsf'], 1);
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

