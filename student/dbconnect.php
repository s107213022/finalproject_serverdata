<?php
$host = 'localhost';
$user = 'root';
$pass = '1qaz3edc.J';
$db = 'android';
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn, "SET NAMES utf8"); //選擇編碼
