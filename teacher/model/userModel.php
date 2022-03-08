<?php
require_once("dbconnect.php");
$username = "張晏菘";

function checkUserIDPwd($userID, $passWord) {
	global $conn;
	$isValid = false;
	
	$sql = "SELECT `password` FROM `teacher` WHERE `account` = 'teacher'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
		if ($passWord == $row['password']) {
				$isValid = true;
			}
		}
	}
	return $isValid;
}

function get_student_checked(){
	global $conn;
	$sql = "SELECT `department`, `id`, name FROM `programming` WHERE status = 1";
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
	global $Groupnum;
	$sql = "SELECT `department`, `id`, `name`, grouping FROM `programming` WHERE `status` = 1 order by grouping";
	$result = mysqli_query($conn,$sql);
	return $result;
	$mysqli -> close();
}

function recall(){
	global $conn;
    $sql = "update `programming` set`x` = 0, `y` = 0";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    
    $sql = "select `department`, `id`, `name`, `x`, `y` from `programming` where `status` = 1";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
	$mysqli -> close();
}


function get_group_leader(){
	global $conn;
	$sql = "select `department`,`id`,`name`,`grouping` FROM `programming` WHERE `group_leader` = 1 order by `grouping` ";
	$result = mysqli_query($conn,$sql);
	return $result;
	$mysqli -> close();
}


function get_nameresult(){
	global $conn, $username;
	$sql = "SELECT `name` FROM `programming` WHERE `name`='$username'";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key => $value){
		$ans = $value;
	}
	return $ans;
} 
function get_groupresult(){
	global $conn, $username;
	$sql = "SELECT `grouping` FROM `programming` WHERE `name`='$username'";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	$row = mysqli_fetch_assoc($result);
	foreach($row as $key => $value){
		$ans = $value;
	}
	return $ans;
} 
function get_samegroupmember(){
	global $conn, $username;
	$sql="SELECT `department`,`name`,`id` FROM `programming` WHERE grouping=(SELECT `grouping` FROM `programming` WHERE `name` ='$username') and `status` =1";
	$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
	return $result;	
}
?>