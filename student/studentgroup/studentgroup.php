<?php
    require("./userModel.php");
    $userID = $_GET['id'];
    $data = get_nameresult($userID);
    $data2 = get_groupresult($userID);
    $data3 = get_samegroupmember($userID);
    $data4 = get_groupleader($userID);
    $obj = json_decode($data); 
    //print($data);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    



    </head>
    <body class="white">
        <div class="container">
            <div class="row"> 
                <table class="striped">
                    <tr>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">Group</th>
                    </tr>
                    <tr>
                    <th style="text-align:center"><?php echo $data      ?></th>
                    <th style="text-align:center"><?php echo $data2     ?></th>
                    </tr>
                </table>
            <table class="striped">
                <tr>
                    <th style="text-align:center">同組組員</th>
                </tr>
            </table>
            <table class="striped">
                    <tr>
                        <th style="text-align:center">系級</th>
                        <th style="text-align:center">姓名</th>
                        <th style="text-align:center">學號</th>
                    </tr>
                    <?php
                    foreach($data3 as $row){
                        echo"<tr>";
                        foreach($row as $key => $value){
                            echo "<td style='text-align:center'>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
            </table>
            </div>
            <?php 
                if($data4 == 1){
                    $url = "http://3.229.31.138/chatroom/index02.php?n=第". $data4."組";
                    //echo $url;
                    echo "<p style='text-align:center'>"."我是組長" ."</p>";
                    echo "<center><input type='button' style='background-color:oldlace' value='回饋' onclick=location.href='$url' ></center>";
                }
               ?>
        </div>
    </body>
</html>