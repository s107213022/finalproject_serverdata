<?php
require_once("dbconnect.php");

function checkTeacherIDPwd($userID, $passWord) {
	global $conn;
	$isValid = false;
	
	$sql = "SELECT `password` FROM teacher WHERE account = 'teacher'";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if ($passWord == $row['password']) {
		$isValid = true;
	}

	return $isValid;
}

function checkStuIDPwd($userID, $passWord) {
	global $conn;
	$isValid = false;
	
	$sql = "SELECT `account`,`password` FROM `programming` WHERE status=1 and account='$userID' ";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if ($userID == $row['account'] && $passWord == $row['password']) {
		$isValid = true;
	}

	return $isValid;
}

function get_student_checked(){
	global $conn;
	$sql = "SELECT department, id, name, x, y FROM `programming` WHERE status = 1";
	$result = mysqli_query($conn,$sql);
	return $result;
}


function getName(){
    global $conn;
    $sql = "select * from `programming` where `identity` = 1";
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
    $count = 0;
    $members = array();
    while ($row = mysqli_fetch_assoc($result)){
        $members[$count] = $row;
        $count = $count + 1;
    }
    $result -> close();
    $nam = rand(0,$count-1);
    $name = "";
    $name = $members[$nam]['name'];
    return $name;
}

function get_student_group(){
	global $conn;
	$sql = "SELECT department, id, name, `grouping` FROM `programming` WHERE status = 1 order by `grouping`";
	$result = mysqli_query($conn,$sql);
	return $result;
	// return $result;
}
function get_nameresult($userID){
	global $conn;
	$sql = "SELECT name FROM `programming` WHERE account='$userID'";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key => $value){
		$ans = $value;
	}
	return $ans;
} 
function get_groupresult($userID){
	global $conn;
	$sql = "SELECT `grouping` FROM `programming` WHERE account='$userID'";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key => $value){
		$ans = $value;
	}
	return $ans;
} 
function get_samegroupmember($userID){
	global $conn;
	$sql="SELECT department,name,account FROM `programming` WHERE `grouping`=(SELECT `grouping` FROM `programming` WHERE account='$userID') and status =1";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	return $result;	
}
function get_groupleader($userID){
	global $conn;
	$sql = "SELECT group_leader FROM `programming` WHERE account='$userID'";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key => $value){
		$ans = $value;
	}
	return $ans;
}


#function getTest(){
#global $conn;
#    $sql = "select * from `program test`";
#    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
#    $count = 0;
#    $members = array();
#    while ($row = mysqli_fetch_assoc($result)){
#        $members[$count] = $row;
#        $count = $count + 1;
#    }
#    $result -> close();
#    $nam = rand(0,$count-1);
#    $name = "";
#    $name = $members[$nam]['examination'];
#    return $name;
#}

?>