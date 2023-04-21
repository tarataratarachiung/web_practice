<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
    <title>The Dancers 選秀網站</title>
    <style>
      /* 上方欄固定不動 */
      .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #000;
        color: #fff;
        padding: 0.7%;
        height:3%;
        z-index: 999;
        /* text-align: center; 設定文字置中 */
        /* s */
        
      }
      .Dancers{
        color:#fff;
        text-decoration:none;
        display: inline-block;
        margin:0.5%;
      }
          /* 登入註冊設定 */
          .loginandregister {
        color:#fff;
        float: right;
        margin:0.5%;
        display: inline-block;
        /* text-align: right; */
      }
    </style>
  </head>

  <body>
    <!-- 上方欄 -->
    <div class="navbar"> 
      <div class = "Dancers">The Dancers</div>
      <a href="login.php" class="loginandregister">登入</a>
      <a href="register.php" class="loginandregister">註冊</a>
    </div>
  </body>
</html>
