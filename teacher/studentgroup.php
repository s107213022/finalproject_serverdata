<?php
    require("./model/userModel.php");
    $data = get_nameresult();
    $data2 = get_groupresult();
    $data3 = get_samegroupmember();
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
        <link rel="stylesheet" href="./css/home.css">



    </head>
    <body class="white">
        <div class="container">
            <div class="row">
              <nav class="nav-wrapper black" style="height:150px">
                <div class="col s12" style="text-align:center">
                  <h3>分組名單</h3>
                </div>
              </nav>
            </div>
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
            <div class="row"> 
                <div class="col s12">
                    <a class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="./student.php">返回</a>
                </div>
            </div>
        </div>
    </body>
</html>