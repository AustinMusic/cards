<?php ob_start();
include('connect.php');
/*if (session_status() == PHP_SESSION_NONE) {
	session_set_cookie_params(28800);
    session_start();
	$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 28800;
}*/
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 315360000);
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
// each client should remember their session id for EXACTLY 1 hour
ini_set('session_set_cookie_params', 315360000);
session_start();
$user_check=$_SESSION['username'];

//$ses_sql = mysqli_query($conn,"SELECT id, username, firstname, lastname, isAdmin, isPowerUser FROM WFUsers WHERE username='$user_check' and isLockedOut = 0 ");
$ses_sql = mysqli_query($conn,"SELECT id, username, firstname, lastname, isAdmin, isPowerUser, isReadOnly FROM appraisers WHERE username='$user_check' and isLockedOut = 0 ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$user_id=$row['id'];
$login_user=$row['username'];
$login_name=$row['firstname'];
$login_last=$row['lastname'];
$login_admin=$row['isAdmin'];
$login_power=$row['isPowerUser'];
$login_ro=$row['isReadOnly'];
if(!isset($user_check))
{
	
	$refferer = "";
	if(isset($_SERVER['REQUEST_URI'])){
		$refferer = "http://www.l3valuation.net".$_SERVER['REQUEST_URI'];
	}
	$_SESSION['redirect'] = $refferer;
	header("Location: http://www.l3valuation.net/cards/index.php");
}
mysqli_close($conn);
