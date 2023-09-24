<?php
ini_set( 'session.save_path', realpath( dirname( $_SERVER[ 'DOCUMENT_ROOT' ] ) . '/../../session' ) );
session_start();
if ( isset( $_SESSION[ 'username' ] ) ) {
    header( 'Location: home.php' );
} else {
    include( '../../includes/login.php' );
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for CARDS</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
* {
  	box-sizing: border-box;
  	font-family: -apple-system, Calibri, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #1e4959;
}
.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #3fb44f;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #3fb44f;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #74DC83;
  	transition: background-color 0.2s;
}
.forget {
  	width: 100%;
  	padding: 15px;
  	background-color: #1e4959;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
	line-height: 20px;
  	color: #ffffff;
  	transition: background-color 0.2s;
			
}
.forget a {
	color: #FFFFFF;
  	font-weight: bold;
}
@media only screen and (max-width: 400px) {
	.login {
    	width: 99%;
  	}
	.login form input[type="password"], .login form input[type="text"] {
  	width: calc(100% - 54px;
	}
}
</style>
</head>

<body>
    <div class="mainpage">
        <div class="login">
			<h1>Login</h1>
			<form method="post" action="">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" name="submit" value="Login"/>
			</form>
			<div class="forget"><center><a href="forgotPassword.php">Forgot password?</a></center></div>
		</div>
    </div>
</body>
</html>