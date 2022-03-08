<?php
session_start();
require("../model/dbconnect.php");
require("../model/userModel.php");

$userID = $_POST['ID'];
$passWord = $_POST['pwd'];

if (checkUserIDPwd($userID, $passWord)) {
	// set sessoin
	$_SESSION['ID'] = $userID;
	
	header("Location: ../teacher.php");
} 
else {
	$_SESSION['ID']="";
	// $_SESSION['m']="帳號或密碼輸入錯誤";
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
<div class="container">
    <div class="row"> 
        <div class="col s12" style="text-align:center">
            <h3>智慧教室</h3>
        </div>
    </div>
<div>
</body>
</html>