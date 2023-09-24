<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/appraiser.php");
require("classes/dataSourceController.php");
require("classes/appraiserDBController.php");
require("classes/rbe_mediaUtilities.php");

$appraiser = new appraiser();


if(isset($_POST['submit'])){
    $keys = array_keys($_POST);
    for($k=0;$k<count($keys);$k++){
        $method = "set".$keys[$k];
        if(method_exists($appraiser,$method)){
            $appraiser->$method($_POST[$keys[$k]]);
        }  
    }
    
    if(empty($user_id)){
        $user_id = 1;
    }else{
        $user_id = $user_id;
    }

    if ( $appraiser->getUsername()=="") {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    }else{

        //if everything is fine, update the record in the database
       
        $appraiserDBController = new appraiserDBController();
        $appraiserDBController->db = $db;
        $appraiser = $appraiserDBController->appraiserOperation($appraiser,$user_id);
        //die();

        // redirect the user once the form is updated
        header("location: appraisers.php");
        die();
    }
 
}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
	// get 'id' from URL
	$id = intval($_GET[ 'id' ]);
	
	$appraiserDBController = new appraiserDBController();
	$appraiserDBController->db = $db;
	$rows = $appraiserDBController->getRecord($id);
	if(count($rows)>0){
	    $keys = array_keys($rows[0]);
	    for($i=0;$i<count($keys);$i++){
	        $method = "set".$keys[$i];
	        if(method_exists($appraiser,$method)){
	            $appraiser->$method($rows[0][$keys[$i]]);
	        }else{
	            echo "method ".$method." not exists<br/>";
	        }
	    
	    }
	}
	
	
}
//DATASOURCES
//following are the results of queries served as datasources for drop downs
//data format is an associative array

$dataSourceController = new dataSourceControler();
$dataSourceController->db = $db;

$apptitleData = $dataSourceController->getWFDictionaryDataSource("apptitle",3);
$salutationData = $dataSourceController->getWFDictionaryDataSource("salutation",3);



require("templates/templateAppraiser.php");

