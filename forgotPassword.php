<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<style>
.regisFrm input[type="text"], .regisFrm input[type="email"], .regisFrm input[type="password"] {
    width: 94.5%;
    padding: 10px;
    margin: auto;
    outline: none;
    color: #000;
    font-weight: 500;
    font-family: 'Roboto', sans-serif;
}
    .form-group .form-control {
            display: inline-block;
            border-color: #d8cebe;
            box-shadow: 0px 0px 4px #d8cebe;            
            padding: 5px 5px;
        }
        
        .form-group label {
            font-weight: 400;
            font-size: 14px;
            display: inline-block;
        }
        
        .form-group label {
            width: 80px;
        }
        
        .form-group .form-control {
            width: 100%;
        }
    .send-button {
            text-align: center;
            margin-top: 20px;
        }
        
        .send-button input[type="submit"] {
            padding: 5px 0;
            width: 60%;
            font-family: 'Calibri', sans-serif;
            font-size: 16px;
            font-weight: 400;
            border: none;
            outline: none;
            color: #FFF;
            background-color: #3fb44f;
            cursor: pointer;
        }
        
        .send-button input[type="submit"]:hover {
            background-color: #8ec548;
        }
</style>
<div class="header"></div>
<div class="headlight"></div>
<div class="headdark"></div>
<div class="mainpage">    
<div class="loginbox">
    <p>Enter the Email of Your Account to Reset New Password</p><br>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <div class="form-group">
            <input type="email" class="form-control" name="emailaddress" placeholder="EMAIL" required=""></div>
            <div class="send-button">
                <input type="submit" name="forgotSubmit" value="CONTINUE">
            </div>
            </div>
        </form>
    </div>
</div>