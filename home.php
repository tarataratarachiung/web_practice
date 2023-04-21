<?php
session_start();
require_once('dbconfig.php');
// 檢查是否已經設定了 username 
if (isset($_SESSION['username']) ) {
  $username = $_SESSION['username'];
} 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script> -->
    <script>
      //在滾動時檢測是否達到滾動到指定點的條件，如果達到則將navbar的class改為"scrolled"
      window.addEventListener('scroll', function() {
      var navbar = document.querySelector('.navbar');
      var position = window.scrollY;

      if(position > 220) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });


    </script>
    <script type="text/javascript"></script>
    <title>The Dancers 選秀網站</title>
    <style>
      /* 設定整個網站的背景顏色為深藍色 */
      body {
        background-color: #152037;
        color: #fff;
      }
      /* 上方欄固定不動 */
      .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        /* background-color: #000; */
        color: #fff;
        padding: 0.7%;
        height:3%;
        z-index: 999;
        background-color: transparent; /* 設定初始為透明 */
        
        
      }
      /* 滾動後會變得樣子 */
      .navbar.scrolled { 
        background-color: #000; /* 設定滾動後的顏色 */
        transition: background-color 1s ease-in-out; /* 動畫過渡效果 */
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
      /* 下方圖片 */
      .cover-image {
        max-width: 100%;
        height: auto;
      }
      /* 功能按鈕 */
      .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ccc;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
      }
      .nav.nav-tabs.nav-fill{
        display: flex;
        justify-content: center;
        justify-content: space-between;
        align-items: center;
        /* background-color: #1c2331; */
        margin-top:1%;
      }
      /* 觸發歷屆選手和投票按鈕前的設定 */
      .nav-link{
        color: #FFFF ;
      }
      /* 歷屆選手和投票按鈕滑鼠懸停時的設定 */
      .nav-tabs .nav-link[data-toggle="tab"]:hover {
        background-color:  #152037;
        color:white;
        font-weight:bold;
        transition: .1s;
      }
      #Vote{
        color:#fff;
        text-align: center;
      }
      #Past_players{
        color:#fff;
        text-align: center;
      }
      /* 歷屆選手圖片位址設定 */
      .circle-images {
        display: flex;
        flex-wrap: wrap;
        padding: 5%;
      }
      /* 歷屆選手設定一排有三個 */
      .circle-images a {
        flex: 1 0 30%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      /* 歷屆選手圖片其他設定 */
      .circle-images img {
        border-radius: 50%;
        width: 55%;
        height: auto;
        margin: 15%;
      }
      /* 歷屆選手字的設定 */
      .caption {
        padding: 3%;
        text-align: center;
      }
      .video {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        z-index: -1;
      }

    
    </style>
  </head>
  <body>
    <!-- 上方欄 -->
    <div class="navbar"> 
      <div class = "Dancers">The Dancers</div>
      <!-- 判斷有無登入 -->
      <?php if(isset($_SESSION['username'])): ?>
        <a href="logout.php" class="loginandregister" style="color: white;">登出</a>
        <a href="Member_Center.php" class="loginandregister" style="color: white;"><?php echo $username;?>會員</a>
      <?php else: ?>
        <a href="login.php" class="loginandregister" style="color: white;">登入</a>
        <a href="register.php" class="loginandregister" style="color: white;">註冊</a>
      <?php endif; ?>
    </div>
    <!-- 下方影片 -->
    <div style="position: relative;">
      <video autoplay muted loop style="max-width: 100%; height: auto;">
      <source src="dance_vedio.mp4" type="video/mp4">
      </video>
    </div>


    <!-- <img src="images/banner.png" alt="The Dancers" class="cover-image" style="margin-top:3%;"> -->
     <!-- 功能按鈕 -->
     <ul class="nav nav-tabs nav-fill">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#Past_players">歷屆選手</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Vote">投票</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Introduce">舞風介紹</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#Form">報名表單</a>
      </li>
    </ul>

    <!--點擊功能後會出現的畫面-->
    <div class="tab-content">
    <!-- 投票 -->
    <div id="Vote" class="tab-pane fade in active">
      <?php include('Vote.php'); ?>
    </div>
    <!-- 歷屆選手部分 -->
    <div id="Past_players" class="tab-pane fade">
      <?php include('Past_player.php'); ?>
    </div>
    <!-- 舞風介紹 -->
    <div id="Introduce" class="tab-pane fade">
      <?php include('dance_introduce.php'); ?>
    </div>
    <!-- 報名表單 -->
    <div id="Form" class="tab-pane fade">
      <?php include('Form.php'); ?>
    </div>
    <!-- <hr class="border-secondary" style="margin-top:3%"> -->
    <!-- 底下黑框 -->
    <div  style="background-color:black;margin-top:5%;padding:1%;">
      <div class="container d-md-flex justify-content-md-between text-center">
        <div>
          <small>
            <a class="text-light" href="https://www.mtv.com.tw/service">服務條款</a>｜
            <a class="text-light" href="https://www.mtv.com.tw/privacy">隱私權政策</a>
          </small>
        </div>
        <small>Y&A音樂頻道 版權所有 ©2020 Viacom International Inc. All Rights Reserved.</small>
      </div>
    </div>
  </body>
</html>
