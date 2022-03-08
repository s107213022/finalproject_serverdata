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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap">
    <title></title>
    <!-- <script type="text/javascript" src="jquery-3.5.1.min.js"></script> -->
    <script language="javascript">
        function load(){
            console.log("window loaded");
            
        }
        window.onload = load;
     //function showName(){
     //    return;
     //}
     //function showGroup() {
     //    console.log("showName loaded");
     //    var xmlhttp = new XMLHttpRequest();
     //    xmlhttp.onreadystatechange = function() {
     //        if (this.readyState == 4 && this.status == 200) {
     //            document.getElementById("List").value = this.responseText;
     //            console.log(this.responseText);
     //        }
     //    }
     //    xmlhttp.open("GET", "group_algo.php", true);
     //    xmlhttp.send();
     //}

</script>
</head>
<body>
<!-- <div class="card">&nbsp</div> -->
<div class="container">
    <div class="row-mt-8 ustify-content-md-center" style="text-align:center">
        <br><br>
        <div class="col-mt-8">
            <div class="card">
            <form action="group_algo.php" method="get">
                <h4 style= "font-size:60px; font-family:Noto Sans TC,sans-serif;" class="card-header"><strong>分組</strong></h4>
                <div class="card-body">
                    <h5  style= "font-size:30px; font-family:Noto Sans TC,sans-serif;" class="card-title"><strong>請輸入要分幾組</strong></h5>
                    <input type="text" id="Groupnum" name="Groupnum" value="" class="form-control">
                    <br>
                    <!-- <a class="btn btn-outline-secondary btn-lg" href="./get_student_group.php">開始分組</a> -->
                    <!-- <a class="btn btn-outline-secondary btn-lg" type='submit'>開始分組</a> -->
                    <button type="submit" class="btn btn-outline-secondary btn-lg" style="border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;"><strong>開始分組</strong></button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>