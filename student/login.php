<?php
    require("dbconnect.php");
    // 設定 MySQL 的連線資訊並開啟連線
    // 資料庫位置、使用者名稱、使用者密碼、資料庫名稱
    //$link = mysqli_connect("localhost", "admin", "******", "newdatabase");
    //$link -> set_charset("UTF8"); // 設定語系避免亂碼
    $account = $_GET['a'];
    $password = $_GET['p'];
    htmlspecialchars($password);
    htmlspecialchars($account);
    //echo $password;
    //echo $account;
    //$account = "123456";
    //$password = "1qaz2wsx";
    //update where account = 
    $sql = "select * from `programming` where `password` = '$password' and `account` = '$account';";
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
    //$result = $link -> query("SELECT * FROM `newtable`");
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) // 當該指令執行有回傳
    {
        //echo $row['name'];
        $count = $count + 1;
        $output[] = $row; // 就逐項將回傳的東西放到陣列中
        $ans = (json_encode($output, JSON_UNESCAPED_UNICODE));
        echo $ans;
        //echo $count;
    }
    $result -> close(); 
    //echo $count;
    if($count == 0){
        $id = -1;
        //echo $count;
        //echo $id;
        $sql1 = "select * from `programming` where `id` = $id ;";
        $result1 = mysqli_query($conn, $sql1) or die("DB Error: Cannot retrieve message.");
        while($nothing = mysqli_fetch_assoc($result1)){
            $output1[] = $nothing;
            $ans1 = (json_encode($output1, JSON_UNESCAPED_UNICODE));
            echo $ans1;
        }
        $result1 -> close(); 
    }
    
    // 將資料陣列轉成 Json 並顯示在網頁上，並要求不把中文編成 UNICODE
    // SQL 指令
    //$account=$_POST['account'];
    //$password=$_POST['password'];
    //$account = "123456";
    //$password = "1qaz2wsx";
    //$sql = "select * from `user` ;";
?>