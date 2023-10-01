<?php
$hostname = "localhost";
$dbuser = "warmspringsdev";
$dbname = "devl3val_L3Properties";
$dbpass = "Abbycat30!";

$db = 'mysql:host='.$hostname.';dbname='.$dbname.'';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
	$db = new PDO($db, $dbuser, $dbpass, $options);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
	echo $e->getMessage();
}





	


      