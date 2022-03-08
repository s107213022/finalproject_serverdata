<?php
    require("./model/userModel.php");
    $data = get_student_checked();
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
                  <h3 style= "font-size:50px; font-family:Noto Sans TC,sans-serif;">在教室的學生名單</h3>
                </div>
              </nav>
            </div>
            <div class="row"> 
                <table class="striped">
                    <tr>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">系級</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">學號</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">姓名</th>
                    </tr>
                    <?php
                        foreach($data as $row){
                            echo"<tr>";
                            foreach($row as $key => $value){
                                echo "<td style='text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;'>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <!--<div class="row"> 
                <div class="col s12">
                    <a class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="./teacher.php"><h7 style= "font-size:30px; font-family:Noto Sans TC,sans-serif;">回到主畫面</h7></a>
                </div>
            </div>-->
        </div>
    </body>
</html>