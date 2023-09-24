<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);

require( "../maps/function.php");

if(isset($_POST['func'])){
	echo json_encode(array("status"=>"ok","data"=>$_POST['func']()));
}

function getStatus(){
	$statqry = "select id, status from WFStatus order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $statqry);
	$repStatus = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repStatus;
}

function getPriority(){
	$priqry = "select id, priority from WFPriority order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $priqry);
	$repPriority = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repPriority;
}

function getAssigned(){
	$assqry = "select id, CONCAT(firstname,' ',lastname) as name from appraisers where isLockedOut = 0 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $assqry);
	$repAssigned = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repAssigned;
}

function getOwner(){
	$ownqry = "select id, CONCAT(firstname,' ',lastname) as name from appraisers where isLockedOut = 0 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $ownqry);
	$repOwner = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repOwner;
}

function getCreated(){
	$creqry = "select id, CONCAT(firstname,' ',lastname) as name from appraisers where isLockedOut = 0 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $creqry);
	$repCreated = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repCreated;
}

function getModified(){
	$modqry = "select id, CONCAT(firstname,' ',lastname) as name from appraisers where isLockedOut = 0 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $modqry);
	$repModified = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repModified;
}

function getShape(){
	$shapeqry = "select id, definition from WFDictionary where category = 'shape' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $shapeqry);
	$repShape = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repShape;
}

function getTopography(){
	$topoqry = "select id, definition from WFDictionary where category = 'topography' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $topoqry);
	$repTopo = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repTopo;
}

function getUtilities(){
	$utilqry = "select id, definition from WFDictionary where category = 'utilities' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $utilqry);
	$repUtilities = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repUtilities;
}

function getFloodPlain(){
	$floodqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $floodqry);
	$repFloodPlain = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repFloodPlain;
}

function getOrientation(){
	$oriqry = "select id, definition from WFDictionary where category = 'orientation' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $oriqry);
	$repOrientation = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repOrientation;
}

function getAccess(){
	$accqry = "select id, definition from WFDictionary where category = 'siteaccess' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $accqry);
	$repAccess = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repAccess;
}

function getExposure(){
	$expqry = "select id, definition from WFDictionary where category = 'exposure' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $expqry);
	$repExposure = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repExposure;
}

function getEasement(){
	$easeqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $easeqry);
	$repEasement = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repEasement;
}

function getRurElec(){
	$relecqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $relecqry);
	$repRurElec = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurElec;
}

function getRurSeptic(){
	$rseptqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $rseptqry);
	$repRurSeptic = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurSeptic;
}

function getRurSewer(){
	$rsewerqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $rsewerqry);
	$repRurSewer = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurSewer;
}

function getRurWater(){
	$rwatqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $rwatqry);
	$repRurWater = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurWater;
}

function getRurGas(){
	$rgasqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $rgasqry);
	$repRurGas = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurGas;
}

function getRurPhone(){
	$rphoneqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $rphoneqry);
	$repRurPhone = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurPhone;
}

function getRurCable(){
	$rcableqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $rcableqry);
	$repRurCable = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repRurCable;
}

function getGLStat(){
	$glstatqry = "select id, definition from WFDictionary where category = 'glstatus' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $glstatqry);
	$repGLStat = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repGLStat;
}

function getsaleStatus(){
	$salestatqry = "select id, definition from WFDictionary where category = 'salestatus' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $salestatqry);
	$repsaleStatus = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repsaleStatus;
}

function getconvDoc(){
	$convdocqry = "select id, definition from WFDictionary where category = 'convdoc' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $convdocqry);
	$convDoc = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $convDoc;
}

function getUseChange(){
	$usecqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $usecqry);
	$repUseChange = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $repUseChange;
}

function getresLand(){
	$reslandqry = "select id, definition from WFDictionary where category = 'ressale' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $reslandqry);
	$represLand = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $represLand;
}


function getpType(){
	$ptypeqry = "select id, definition from WFDictionary where category = 'parktype' order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $pType);
	$pType = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $pType;
}

function getbuildQual(){
	$bqualqry = "select id, definition from WFDictionary where category = 'condition' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $bqualqry);
	$buildQual = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $buildQual;
}

function getintCond(){
	$intcondqry = "select id, definition from WFDictionary where category = 'condition' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $intcondqry);
	$intCond = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $intCond;
}

function getappraisaltype(){
	$apptypeqry = "select id, definition from WFDictionary where category = 'appraisetype' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $apptypeqry);
	$appraisaltype = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $appraisaltype;
}

function getpurposeofappraisal(){
	$purpoofapprqry = "select id, definition from WFDictionary where category = 'appraisepurp' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $purpoofapprqry);
	$purposeofappraisal = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $purposeofappraisal;
}

function getpdftype(){
	$pdftypeqry = "select id, definition from WFDictionary where category = 'pdftype' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $pdftypeqry);
	$pdftype = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $pdftype;
}

function getextCond(){
	$extondqry = "select id, definition from WFDictionary where category = 'condition' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $extondqry);
	$extCond = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $extCond;
}

function getbuildClass(){
	$bclassqry = "select id, definition from WFDictionary where category = 'bclass' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $bclassqry);
	$buildClass = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $buildClass;
}

function getparkingType(){
	$parktypeqry = "select id, definition from WFDictionary where category = 'parkingtype' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $parktypeqry);
	$parkingType = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $parkingType;
}

function getofficeFire(){
	$offfiqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $offfiqry);
	$officeFire = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $officeFire;
}

function getofficeElev(){
	$offelqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $offelqry);
	$officeElev = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $officeElev;
}

function getlvlServ(){
	$lvlservqry = "select id, definition from WFDictionary where category = 'lvlservice' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $lvlservqry);
	$lvlServ = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $lvlServ;
}

function getdriveThru(){
	$drivetqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $drivetqry);
	$driveThru = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $driveThru;
}

function getalcoholServe(){
	$alcoholqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $alcoholqry);
	$alcoholServe = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $alcoholServe;
}

function getPlaygroung(){
	$playqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $playqry);
	$Playgroung = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $Playgroung;
}

function getindFire(){
	$indfireqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $indfireqry);
	$indFire = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $indFire;
}

function getcodeAccess(){
	$codeaccqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $codeaccqry);
	$codeAccess = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $codeAccess;
}

function getalarmUnit(){
	$alarmqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $alarmqry);
	$alarmUnit = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $alarmUnit;
}

function getheatUnit(){
	$heatuqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $heatuqry);
	$heatUnit = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $heatUnit;
}

function getsecCam(){
	$seccamqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $seccamqry);
	$secCam = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $secCam;
}

function getboatStor(){
	$boatqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $boatqry);
	$boatStor = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $boatStor;
}

function getosManager(){
	$osmgrqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $osmgrqry);
	$osManager = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $osManager;
}

function getmanagerRes(){
	$mgrresqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $mgrresqry);
	$managerRes = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $managerRes;
}

function getsubProj(){
	$subproqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $subproqry);
	$subProj = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $subProj;
}

function getparkCond(){
	$parkconqry = "select id, definition from WFDictionary where category = 'condition' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $parkconqry);
	$parkCond = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $parkCond;
}

function getparkQual(){
	$parkqualqry = "select id, definition from WFDictionary where category = 'condition' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $parkqualqry);
	$parkQual = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $parkQual;
}

function getexcersise(){
	$exerqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $exerqry);
	$excersise = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $excersise;
}

function getisSpa(){
	$spaqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $spaqry);
	$isSpa = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $isSpa;
}

function getwashDry(){
	$subproqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $subproqry);
	$washDry = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $washDry;
}

function getbuyerStat(){
	$buystatqry = "select id, definition from WFDictionary where category = 'buyerstatus' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $buystatqry);
	$buyerStat = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $buyerStat;
}

function getpropRight(){
	$proprightqry = "select id, definition from WFDictionary where category = 'proprights' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $proprightqry);
	$propRight = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $propRight;
}

function getlesseeType(){
	$lesstypeqry = "select id, definition from WFDictionary where category = 'lesseetype' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $lesstypeqry);
	$lesseeType = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $lesseeType;
}

function getspaceGen(){
	$spacegenqry = "select id, definition from WFDictionary where category = 'lesseetype' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $spacegenqry);
	$spaceGen = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $spaceGen;
}

function getReportType(){
	$reportType = array(array("rid"=>1,"reportTypeName"=>1,"reportTypeName"=>1),array("rid"=>2,"reportTypeName"=>2,"reportTypeName"=>2),array("rid"=>3,"reportTypeName"=>3,"reportTypeName"=>3),array("rid"=>4,"reportTypeName"=>4,"reportTypeName"=>4));

	return $reportType;
}

function getCounties(){
	$countiesqry = "select distinct county from property order by county ASC";
	$result = mysqli_query($GLOBALS['con'], $countiesqry);
	$counties = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	return $counties;
}

function getReportsForCopy(){
	$qry = "select id, reportname,property_name,address FROM report INNER JOIN property ON  report.id=property.FK_ReportID WHERE FK_ReportTypeID = '".intval($_POST['reportTypeID'])."' AND isDeleted = 0 AND reportname LIKE '%".$_POST['reportName']."%' ORDER BY id ASC";
	$result = mysqli_query($GLOBALS['con'], $qry);
	$gen = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	return $gen;
}
?>