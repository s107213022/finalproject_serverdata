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
  <title></title>
</head>

<body class="white">
<div class="navbar-fixed">
    <nav class="nav-wrapper black " style="height:100px">
      <div class="container center-align">
        <h3 >
            學生功能
        </h3>
      </div>
    </nav>
</div>
<div class="container">
    <div class="row"> 
        <div class="col s12" style="text-align:center;height:80px">
        </div>
    </div>
    <div class="row center-align ">
      <!-- <div class="col s1">1</div>
      <div class="col s1">2</div>
      <div class="col s1">3</div>
      <div class="col s1">4</div> -->
      <!-- <div class="col s2 yellow" style="display:none">5</div> -->
      <div class="col s2">
        <a style="width: 100%;height:140px;" class="btn-large waves-effect green black-text center-align" href="./studentgroup.php"><h5 style="line-height: 100px;">分組</h5></a>
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
</body>

</html>