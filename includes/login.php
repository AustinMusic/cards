<?php
	if (session_status() == PHP_SESSION_NONE) {
		ini_set('session.gc_maxlifetime', 28800);
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
	}

	include("connect.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect from MySQL injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($conn, $username);
			$password = mysqli_real_escape_string($conn, $password);
			$password = md5($password);
			
			//Check username and password from database
			//$sql="SELECT id FROM WFUsers WHERE username='$username' and password='$password' and isLockedOut=0 ";
			$sql="SELECT id FROM appraisers WHERE username='$username' and password='$password' and isLockedOut=0 ";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username; // Initializing Session
				if(isset($_SESSION['redirect'])){
					if($_SESSION['redirect']!=""){
						header("location: ".$_SESSION['redirect']);
						unset($_SESSION['redirect']);
						die();
					}
				}
				header("location: home.php"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}

		}
	}
mysqli_close($conn);

?>