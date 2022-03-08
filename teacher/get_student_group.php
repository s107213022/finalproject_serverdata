<?php
    require("./model/userModel.php");
    $data = get_student_group();
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
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap">


    </head>
    <body class="#c8e6c9 green lighten-4">
        <div class="container">
            <div class="row">
              <nav class="nav-wrapper black" style="height:150px">
                <div class="col s12" style="text-align:center">
                  <h3 style= "font-size:50px; font-family:Noto Sans TC,sans-serif;">分組名單</h3>
                </div>
              </nav>
            </div>
            <div class="row"> 
                <table class="striped">
                    <tr>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">系級</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">學號</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">姓名</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">組別</th>
                    </tr>
                    <?php
                        foreach($data as $row){
                            echo"<tr >";
                            foreach($row as $key => $value){
                                echo "<td style='text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;'>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>

            <div class="container">
                <div class="row"> 
                    <div class="col s3">
                        <a style="width: 90%;height:50px; text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="./teacher.php"><h6>回到主畫面</h6></a>
                    </div>

                    <div class="col s3">
                        <a style="width: 90%;height:50px; text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="http://3.229.31.138/chatroom/index02.php?n=teacher" target="_blank"><h6>聊天室</h6></a>
                    </div>

                </div>
            <div>
        </div>
    </body>
</html>