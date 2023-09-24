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
    <p><center>Please enter in your new password in the fields below.</center></p><br>
<div class="loginbox">
        <form action="userAccount.php" method="post">
            <div class="form-group padding-5">
            <input type="password" name="password" placeholder="PASSWORD" required="">
                </div>
            <div class="form-group padding-5">
            <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required=""></div>
            <div class="send-button">
                <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                <input type="submit" name="resetSubmit" value="RESET">
            </div>
        </form>
    </div>
</div>