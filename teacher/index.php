<?php
    session_start();
    //set the login mark to empty
    $_SESSION['id'] = "";
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./files/img/T1.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="./css/home.css">
  <title>teacher</title>
</head>

<body class="white">

  <div class="navbar-fixed">
    <nav class="nav-wrapper black" style="height:150px">
      <div class="container center-align">
        <h3 >
          智慧教室
        </h3>
        <h5>(老師版)</h5>
      </div>
    </nav>
  </div>

  <div class="container">
    <div class="row all_center">
      <div id="card1" class="card col s12 offset-m3 m6">
        <div class="card-content">
          <form method="post" action="./controller/loginCheck.php">
            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="text" id="formId" name="ID" required>
                <label for="formId">帳號</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s10 offset-m2 m8">
                <input type="password" id="formPassword" name="pwd" required>
                <label for="formPassword">密碼</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <button class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text " type="submit">登入</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
   
</body>

</html>