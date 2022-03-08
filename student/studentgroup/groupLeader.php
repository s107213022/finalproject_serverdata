<?php 
require_once("dbconnect.php");

$id = $_GET['id'];

$sql = "select `group_leader` from `programming` where `account` = '$id';";
$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
$row = mysqli_fetch_assoc($result);
foreach($row as $key => $value){
	$ans = $value;
}
echo $ans;
?>