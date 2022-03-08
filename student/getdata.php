<?php
    require("dbconnect.php");
    $id = $_GET['id'];
    $sql = "select * from `programming` where `identity` = '$id' ;";
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
    //$result = $link -> query("SELECT * FROM `newtable`");
    while ($row = mysqli_fetch_assoc($result)) // 當該指令執行有回傳
    {
        $output[] = $row; // 就逐項將回傳的東西放到陣列中
    }
    $ans = (json_encode($output, JSON_UNESCAPED_UNICODE));
    echo $ans;
    $result -> close(); 
?>