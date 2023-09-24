<?php
date_default_timezone_set( 'America/Los_Angeles' );
error_reporting( E_ALL );
ini_set( 'display_errors', TRUE );

require( "../../../includes/connectPDO.php" );
include( "../../../includes/check.php" );
require( "../config/databaseTables.php" );

require( "classes/bugs.php" );
require( "classes/dataSourceController.php" );
require( "classes/bugsDBController.php" );
require( "classes/rbe_mediaUtilities.php" );

$issues = new issues();

if ( isset( $_POST[ 'submit' ] ) ) {
    $keys = array_keys( $_POST );
    for ( $k = 0; $k < count( $keys ); $k++ ) {
        $method = "set" . $keys[ $k ];
        if ( method_exists( $issues, $method ) ) {
            $issues->$method( $_POST[ $keys[ $k ] ] );
        }
    }

    if ( empty( $user_id ) ) {
        $user_id = 1;
    } else {
        $user_id = $user_id;
    }

    if ( $issues->getShort() == "" ) {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    } else {

        //if everything is fine, update the record in the database
        $issues->setDateModified(date('Y-m-d H:i:s'));

        $issuesDBController = new issuesDBController();
        $issuesDBController->db = $db;
        $issues = $issuesDBController->issuesOperation( $issues, $user_id );
        //die();

        // redirect the user once the form is updated
        header( "location: buglist.php");
        die();
    }

}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
    // get 'id' from URL
    $id = intval( $_GET[ 'id' ] );

    $issuesDBController = new issuesDBController();
    $issuesDBController->db = $db;
    $rows = $issuesDBController->getRecord( $id );
    if ( count( $rows ) > 0 ) {
        $keys = array_keys( $rows[ 0 ] );
        for ( $i = 0; $i < count( $keys ); $i++ ) {
            $method = "set" . $keys[ $i ];
            if ( method_exists( $issues, $method ) ) {
                $issues->$method( $rows[ 0 ][ $keys[ $i ] ] );
            } else {
                echo "method " . $method . " not exists<br/>";
            }

        }
    }


}

//DATASOURCES
//following are the results of queries served as datasources for drop downs
//data format is an associative array

$dataSourceController = new dataSourceControler();
$dataSourceController->db = $db;

$issuetypeData = $dataSourceController->getWFDictionaryDataSource( "bugtype", 3 );
$prioritytypeData = $dataSourceController->getWFDictionaryDataSource( "bugprior", 3 );
$statustypeData = $dataSourceController->getWFDictionaryDataSource( "bugstat", 3 );

$bugimg = array();
if($issues->getID()!=""){
    $sql = "SELECT CONCAT(FK_ReportID,'/', file_name) as image FROM images
        WHERE FK_ReportID = '".$issues->getID()."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $bugimg = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require( "templates/templateBugs.php" );