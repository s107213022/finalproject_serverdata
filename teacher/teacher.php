<?php
session_start();
if (! isset($_SESSION['ID'])) {
	header("Location: index.php");
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="./css/home.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap">
  <title></title>
</head>

<body class="#e0e0e0 grey lighten-2">
<div class="navbar-fixed">
    <nav class="nav-wrapper black " style="height:100px">
      <div class="container center-align">
        <h3 style= "font-size:50px; font-family:Noto Sans TC,sans-serif;">
            老師
        </h3>
      </div>
    </nav>
</div>

<div class="container">
    <div class="row"> 
        <div class="col s12" style="text-align:center;height:50px">
        </div>
    </div>
    <!--<div class="row center-align ">-->
      <!-- <div class="col s1">1</div>
      <div class="col s1">2</div>
      <div class="col s1">3</div>
      <div class="col s1">4</div> -->
      <!-- <div class="col s2 yellow" style="display:none">5</div> -->

      <div class="col s6 row center-align">
        <a style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #b2dfdb teal lighten-4 black-text center-align" href="./form.php"><h5 style="line-height: 70px; font-size:40px;">已簽到</h5></a>
      </div>

      <div style="height:10px">
      </div>
    
      <div class="col s6 row center-align">
        <a style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #4db6ac teal lighten-2 black-text center-align" href="./draw.php"><h5 style="line-height: 70px; font-size:40px;">抽籤</h5></a>
      </div>

      <div style="height:10px">
      </div>

      <div class="col s6 row center-align" >
        <a style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px;box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #00796b teal darken-2 black-text center-align" href="./group.php"><h5 style="line-height: 70px; font-size:40px;">分組</h5></a>
      </div>

      <div style="height:10px">
      </div>

      
      <div class="col s6 row center-align">
        <a style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #26a69a teal lighten-1 black-text center-align" href="./get_student_group.php"><h5 style="line-height: 70px; font-size:40px;">分組名單</h5></a>
      </div>

      <div style="height:10px">
      </div>

      <div class="col s6 row center-align">
        <a style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #4db6ac teal lighten-2 black-text center-align" href="http://35.169.182.156:3001/" target="_blank"><h5 style="line-height: 70px; font-size:40px;">及時測驗</h5></a>
      </div>
      
      <div style="height:10px">
      </div>

      <div class="col s6 row center-align">
        <a style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #80cbc4 teal lighten-3 black-text center-align" href="http://3.229.31.138/chatroom/index01.php?n=teacher" target="_blank"><h5 style="line-height: 70px; font-size:40px;">聊天室</h5></a>
      </div>


      <div style="height:10px">
      </div>

      <div class="col s6 row center-align">
        <a onclick="recall()" style="width: 50%;height:100px; font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn-large waves-effect #b2dfdb teal lighten-4 black-text center-align"><h5 style="line-height: 70px; font-size:40px;">重新點名</h5></a>
      </div>
      <!-- <div class="col s1">10</div>
      <div class="col s1">11</div>
      <div class="col s1">12</div> -->
</div>


    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
      $(document).ready(function () {
        $('.sidenav').sidenav();
      });
    </script>

    <script>
          function recall() {
            var yes = confirm("確定要重新點名?");
    
            if (yes) {
              window.location.href="./recall.php";
              alert("已重新點名");
            }
            else {
              return;
            }
          }
        </script>
</body>

</html>