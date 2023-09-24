<?php
session_start();
//date_default_timezone_set('Europe/Athens'); // if you don't set timezone then php is oging to use server configuration list is here http://php.net/manual/en/timezones.america.php this is crucial when you are generating timestamps


if(isset($_REQUEST['action'])){
    switch ($_REQUEST['action']){
        case "invalidate":
			$skeys = array_keys($_SESSION);
			for($k=0;$k<count($skeys);$k++){
				unset($_SESSION[$skeys[$k]]);
			}
			unset($_SESSION);
            session_unset();
			session_destroy();
			session_start();
			
			echo 0;
            break;
        case "refresh":
            $_SESSION['accessTime'] = time();
			echo 1;
		break;
    
    }
}else{
    echo "no Action";
}