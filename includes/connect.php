<?php
$hostname = "localhost";
$dbuser = "warmspring";
$dbname = "L3Properties";
$dbpass = "I3@ck0ps";

$conn=mysqli_connect ($hostname, $dbuser, $dbpass,$dbname);
$GLOBALS['con'] = $conn;
if (!$conn) {
  die('Not connected : ' . mysqli_connect_error());
}

      