<?php
    $name = $_GET['n'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1">
    <title>歡迎來到分組聊天室</title>
    <!-- 匯入CSS檔案 -->
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <!-- 建立h3標題 -->
    <h3 id="title">歡迎來到聊天室</h3>
    <input type="text" id="name" style="display: none" value="<?php echo $name?>">
    <!-- 建立ul清單，用於顯示聊天室訊息 -->
    <ul id="messages"></ul>
    <!-- 建立form表單，內部包含input元件及button元件 -->
    <form id="form" action="">
        <input id="input" autocomplete="off">
        <button>Send</button>
    </form>
    <!-- 匯入Socket.IO套件 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
    <!-- 匯入JavaScript程式碼 -->
    <script src="index02.js"></script>
</body>

</html>