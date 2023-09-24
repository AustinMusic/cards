<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/unitmix.php");
require("classes/dataSourceController.php");
require("classes/unitmixDBController.php");
require("classes/rbe_mediaUtilities.php");

$unitmix = new unitmix();




// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
	// get 'id' from URL
	$id = intval($_GET[ 'id' ]);
	
	$unitmixDBController = new unitmixDBController();
	$unitmixDBController->db = $db;
	$rows = $unitmixDBController->getRecord($id);
	if(count($rows)>0){
	    $keys = array_keys($rows[0]);
	    for($i=0;$i<count($keys);$i++){
	        $method = "set".$keys[$i];
	        if(method_exists($unitmix,$method)){
	            $unitmix->$method($rows[0][$keys[$i]]);
	        }else{
	            echo "method ".$method." not exists<br/>";
	        }
	    
	    }
	}
}

if(isset($_POST['submit'])){
    $keys = array_keys($_POST);
    for($k=0;$k<count($keys);$k++){
        $method = "set".$keys[$k];
        if(method_exists($unitmix,$method)){
            $unitmix->$method($_POST[$keys[$k]]);
        }  
    }
    
    $unitmix->setNo_units(str_replace(',','', $_POST['no_units']));
    $unitmix->setNo_these_units(str_replace(',','', $_POST['no_these_units']));
    $unitmix->setPct_total_units(str_replace(array(',','%',' '),'', $_POST['pct_total_units']));;
    $unitmix->setUnit_size(str_replace(array(',','SF',' '),'', $_POST['unit_size']));
    $unitmix->setNo_bedrooms(str_replace(',','', $_POST['no_bedrooms']));
    $unitmix->setNo_bathrooms(str_replace(',','', $_POST['no_bathrooms']));
    
    if ( $unitmix->getNo_units()=="") {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    }else{

        //if everything is fine, update the record in the database
       
        $unitmixDBController = new unitmixDBController();
        $unitmixDBController->db = $db;
        $unitmix = $unitmixDBController->unitmxOperation($unitmix,$user_id);
        //die();

		
        // redirect the user once the form is updated
//        header("location: _unitmix.php?id=". $unitmix->getId());	
		$unitmixDBController = new unitmixDBController();
        $unitmixDBController->db = $db;	
		$unitmixData = $unitmixDBController->getTableRecord($unitmix->getId());
		
		$_GET['id'] = $unitmix->getId();
	}
}
//DATASOURCES
//following are the results of queries served as datasources for drop downs
//data format is an associative array

$dataSourceController = new dataSourceControler();
$dataSourceController->db = $db;

require("templates/templateUnitMix.php");

