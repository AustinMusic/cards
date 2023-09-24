<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
require("../../../includes/connectPDO.php");


define("APPRAISERS_TABLE","appraisers",false);
define("WFDICTIONARY_TABLE","WFDictionary",false);


$limit_sql ="";
$search_sql = array();
$search_sql_debug = array();

$search_sql_stmt = "";
$tables_sql = array();
$tables_sql_stmt = "";
$addtable_sql = array();
$addtable_sql_stm = "";
$sql_groupby = "";
$orderBy_stmt = "";
$sql_fields = array();
$sql_fields_stmt = "";

if(isset($_POST['sq'])){
	$qInput = json_decode($_POST['sq'],true);
	
	//print_r($qInput);
	$tables = array();
	$fields = array();
	$conditions = array();
	$ckeys = array_keys($qInput);
	$search_sql_stmt = "";
	$reportTypeID = array();
	for($k=0;$k<count($ckeys);$k++){
		$condition = "";
		$skeys = array_keys($qInput[$ckeys[$k]]['criteria']);
		$_search_sql = array();
		//$extraRange = count($skeys);
		
		for($s=0;$s<count($skeys);$s++){
			if(!in_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'],$tables)){
				$tables[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'];
			}
			$fields[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName'];
			if($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']=="FK_ReportTypeID"){
				$reportTypeID = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']];
			}
			
			// if($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['data-type']=="dropdownvarchar"){
				// echo "HERE";
				// die();
			// }else{
				$operator = "=";
				if($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator']!="0" && $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator']!=""){
					$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
				}
				if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
					if($operator=="between"){
						$condition = "(".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName'].">=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1";
						$condition.=" AND ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."<=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2)";
					}elseif(strtolower($operator)=="in"){
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" OR ",$condition).")";
					}elseif(strtolower($operator)=="not in"){
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."!=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" AND ",$condition).")";
					}elseif(strtolower($operator)=="vin"){
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']." LIKE :".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" OR ",$condition).")";
					}else{
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']." NOT LIKE :".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" AND ",$condition).")";
					}
					//$extraRange++;
				}else{
					$condition = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName'].$operator.":".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s;
				}
			// }
			
			
			//$condition_debug = $qInput[$ckeys[$k]][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]][$skeys[$s]]['fieldName']."=".$qInput[$ckeys[$k]][$skeys[$s]][$qInput[$ckeys[$k]][$skeys[$s]]['fieldName']];
			//$search_sql_stmt.= $condition;
			if($s<(count($skeys)-1)){
				$condition.=" ".strtoupper($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['condition'])." ";
			}
			$_search_sql[] = $condition;
		}
		
		$search_sql[$k] = "(".implode(" ",$_search_sql).")";
		if($k<(count($ckeys)-1)){
			$search_sql[$k].=" ".strtoupper($qInput[$ckeys[$k]]['condition']);
		}
		//echo $sQuery."<br/>";
	}

	/*the required fields that we want to retreive fro mthe sql query*/
	$sql_fields[] = APPRAISERS_TABLE.".id";
	$sql_fields[] = APPRAISERS_TABLE.".compname";
	$sql_fields[] = APPRAISERS_TABLE.".firstname";
	$sql_fields[] = APPRAISERS_TABLE.".lastname";
	$sql_fields[] = APPRAISERS_TABLE.".emailaddress";
	$sql_fields[] = APPRAISERS_TABLE.".phoneone";
	$sql_fields[] = APPRAISERS_TABLE.".designation";
	
	$sql_fields[] = WFDICTIONARY_TABLE."B.definition AS apptitle";


	/*building table joins*/
	$tables_sql[] = APPRAISERS_TABLE;
	$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' AS '.WFDICTIONARY_TABLE.'B ON '.APPRAISERS_TABLE.'.apptitle='.WFDICTIONARY_TABLE.'B.id';
	
	if(count($sql_fields)>0){
		$sql_fields_stmt.=" ".implode(",",$sql_fields)." ";
	}

	$tables_sql_stmt.=" FROM ".implode(" ",$tables_sql);

	if(count($search_sql)>0){
		$search_sql_stmt.=" WHERE ".implode(" ",$search_sql)." ";
	}

	$limit_sql = ""; // LIMIT 1000 REMOVE WHEN THE SERVER LIMITATION REMOVED
	$sql_groupby = "";
	$orderBy_stmt = "ORDER BY ".APPRAISERS_TABLE.".id DESC";

				
	$sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;

	//echo $sql;
	//die();
	$stmt = $db->prepare($sql);

	$ckeys = array_keys($qInput);
	for($k=0;$k<count($ckeys);$k++){
		$sQuery = "";
		$skeys = array_keys($qInput[$ckeys[$k]]['criteria']);
		//$extraRange = count($skeys);
		for($s=0;$s<count($skeys);$s++){
			//echo $qInput[$ckeys[$k]][$skeys[$s]]['data-type']."<br/>";
			
			switch($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['data-type']){
				case "int":
					if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
						$operator = "=";
						if(isset($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'])){
							$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
						}
						if($operator=="between"){
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1 ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0]."<br/>";
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2 ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1]."<br/>";
							//$extraRange++;
						}else{
							for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
								$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o], PDO::PARAM_STR);
								//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."<br/>";
							}
						}
						//$extraRange++;
					}else{
						$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
						//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
					}
				break;
				case "varchar":
					if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
						$operator = "=";
						if(isset($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'])){
							$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
						}
						if(strtolower($operator)=="vin" || strtolower($operator)=="vnot in"){
							for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
								$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o,"%".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."%", PDO::PARAM_STR);
								//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."<br/>";
							}
						}
						//$extraRange++;
					}else{
						$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
						//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
					}
				break;
				case "date":
					if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
						$operator = "=";
						if(isset($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'])){
							$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
						}
						if($operator=="between"){
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0]."<br/>";
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2 ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1]."<br/>";
							//$extraRange++;
						}else{
							for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
								$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o], PDO::PARAM_STR);
								//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."<br/>";
							}
						}
						//$extraRange++;
					}else{
						$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
						//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
					}
				break;
				case "dropdown":
					$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_INT);
					//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
				break;
				case "dropdownvarchar":
					$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_INT);
					//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
				break;
				default:
					$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
					//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
				break;
				
			}
		}
		
	}

	$stmt->execute();
	/*DEBUG PURPOSE ONLY*/
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//$data = array_splice($data,0,2000); //REMOVE WHEN SERVER LIMITATION HAS BEEN GONE AWAY
	$jStr = json_encode(array('status' => 'ok', 'data' => $data));
	echo $jStr;
}
die();


?>