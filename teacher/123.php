<?php
    require("dbconnect.php");
    $data = get_student_group();

    function get_student_group(){
        global $conn;
        $sql = "SELECT department, id, name, grouping FROM programming WHERE status = 1 order by grouping";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
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
                        <th style="text-align:center ">Department</th>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">Group</th>
                    </tr>
                    <?php
                        foreach($data as $row){
                            echo"<tr>";
                            foreach($row as $key => $value){
                                echo "<td>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="row"> 
                <div class="col s12">
                    <a class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="./teacher.php">返回</a>
                </div>
            </div>
        </div>
    </body>
</html>