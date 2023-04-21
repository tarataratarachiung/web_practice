<?php
require_once('dbconfig.php');

//使用$_POST全局變量來獲取POST請求中提交的數據。如果有名為"vote"的數據提交，就可以判斷這是一個投票請求
//如果投票按鈕已被按下，接下來可以獲取選手ID和當前使用者username
if(isset($_POST['vote'])) {
  if (!isset($_SESSION['username'])) { //檢查有無登入
    // 未登入，導向登入頁面
    echo "<script>alert('請先登入會員，才能參與投票');</script>";
  }else{
    $player_id = $_POST['vote'];
    $username = $_SESSION['username'];

    // 檢查使用者今天是否已經投滿三票
    $today = date('Y-m-d');
    $sql = "SELECT COUNT(*) as total_votes FROM votes WHERE username = '$username' AND DATE(created_at) = '$today'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $total_votes = $row['total_votes'];

    if ($total_votes >= 3) {
      // 已達到投票限制，顯示錯誤訊息
      echo "<script>alert('每天最多只能投三票，已達投票上限，明天再來!');</script>";
    } else {
      // 紀錄投票
      $sql = "INSERT INTO votes (username, p_id, votes,created_at) VALUES ('$username', '$player_id', 1,NOW())";
      
      if (!mysqli_query($db, $sql)) {
        die("Error inserting record: " . mysqli_error($db));
      }
      echo "<script>alert('已完成投票');</script>";
    }
  }
} 


// 查詢投票總數
$sql = "SELECT p_id, SUM(votes) AS total_votes FROM votes GROUP BY p_id";
$result = mysqli_query($db, $sql);

// 把結果存儲到一個陣列中
$votes = array();
while ($row = mysqli_fetch_assoc($result)) {
  $votes[$row['p_id']] = $row['total_votes'];
}

$result = mysqli_query($db, "SELECT SUM(votes) AS total_votes FROM votes");
// 檢查是否有結果
if (mysqli_num_rows($result) > 0) {
    // 讀取結果中的總票數
    $row = mysqli_fetch_assoc($result);
    $total_votes = $row["total_votes"];
     // 在網頁上顯示總票數

}


?>
<head>

<!-- <script>
  // 初始化 Bootstrap Popover 功能
  $(function () {
    $('[data-bs-toggle="popover"]').popover();
  });
</script> -->

<script>

//倒數時間部分
// 設定倒數截止日期
var countdownDate = new Date("2023-05-31T00:00:00").getTime();

// 更新倒數時間 setInterval()用於定期重複執行一段程式碼
var countdownInterval = setInterval(function() {
  // 取得當前時間
  var now = new Date().getTime();

  // 計算距離截止日期的時間差
  var distance = countdownDate - now;

  // 計算倒數時間的天、時、分、秒 math.floor意思:將一個數字向下取整
  //將計算得到的時間間隔 (distance) 除以不同的單位（毫秒、秒、分、時、天）後的結果取整
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  //先對 distance 進行取餘運算 (%)，計算出 distance 除以一天的毫秒數 (1000 * 60 * 60 * 24) 後的餘數，這樣可以得到剩餘的毫秒數，即不足一天的部分。
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // 更新畫面上的倒數時間 
  //.textContent 是這個元素的屬性，用於讀取或設定元素的純文字內容
  //使用 = String(days).padStart(2, "0") 來將元素的內容設定為 days 變數的值.padStart(2, "0") 是在字串前面添加 "0" 字元，使其長度為 2
  document.getElementById("days").textContent = String(days).padStart(2, "0");
  document.getElementById("hours").textContent = String(hours).padStart(2, "0");
  document.getElementById("minutes").textContent = String(minutes).padStart(2, "0");
  document.getElementById("seconds").textContent = String(seconds).padStart(2, "0");
 

  // 判斷倒數結束，停止更新 //使用 clearInterval() 來停止
  if (distance < 0) {
    clearInterval(countdownInterval);
    document.getElementById("days").textContent = "00";
    document.getElementById("hours").textContent = "00";
    document.getElementById("minutes").textContent = "00";
    document.getElementById("seconds").textContent = "00";
  }
}, 1000); // 每秒更新一次

</script>
</head>
<style>
     body {
        background-color:#152037  ;
        color: #fff;
      }
     /* 投票的頭像設定 */
     .img-circle{
        border-radius: 50%;
        width: 80%;
        height: auto;
        /* border: 3px solid #FFF; */
      }

      .img-circle:hover{
        cursor: pointer;
        box-shadow: 0 0 10px rgba(255,255,255,0.5);
      }
      .progress:hover{
        cursor: pointer;
        box-shadow: 0 0 10px rgba(255,255,255,0.5);
      }
     .modal-body{
        color:black;
        text-align: center;
      }
    .modal-header{
        color:black;
        text-align: center;
    }
  
    .model-vedio{
        margin:2%;
        margin-top:4%;
    }
    .player1 {
      /* background-color:#000; */
      padding: 2%;
      color:#fff;
      /* border: 2px solid #FFF ;
      border-radius:15px; */
    }
    .player2 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player3 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player4 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player5 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player6 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player7 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player8 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player9 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player10 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    .player11 {
      padding: 2%;
      margin-top:5%;
      color:#FFF;
    }
    /* 投票間距設定 */
    .votecontainer{
      margin: auto;
      float: none;
      max-width: 60%;
      margin-top:40px;
      padding:2%;
      /* background-color:#FEAC2C; */
      border-radius:6px;
      /* border: 1px solid #ffffff; */
    }
    /* 倒數時間設定 */
    .countdown-clock {
      font-size: 24px;
      background-color:black; 
      max-width: 50%;
      text-align: center;
      margin: auto;
      margin-top:30px;
      padding:2.5%;
      border-radius: 20px;
      border: 3px solid #ffffff;
    }
    .progress {
      font-weight: bold; /* 設定字體為粗體 */
    }

     /* 箭頭動畫 */
     @keyframes moveAndReset {
      0% {
        transform: translateY(0); /* 起始位置為 Y 軸位移 0 */
      }
      50% {
        transform: translateY(12px); /* 中間位置為 Y 軸位移 10px */
      }
      100% {
        transform: translateY(0); /* 結束位置為 Y 軸位移 0，回到原處 */
      }
    }


</style>

<!-- 投票部分 -->

<h3 style="margin-top:40px;"><strong>支持你喜歡的選手!</strong></h3>

<div class="countdown-clock">
  <h4 style="color:#FEAC2C;"><strong>剩餘時間</strong><img src="images/history.png" style="width:4%;height:4%;"></h4>
  <strong><span id="days" style="color:#FEAC2C;">00</span> 天
  <span id="hours" style="color:#FEAC2C;">00</span> 時
  <span id="minutes" style="color:#FEAC2C;">00</span> 分
  <span id="seconds" style="color:#FEAC2C;">00</span> 秒</strong>
  <div style="white-space: nowrap;">
  <h4 style="margin-top:3%;">截止日期 2023/5/31 00:00</h4>
  <?php  
    echo "<h4 style='display: inline;'>目前總投票數</h4>&nbsp";
    echo "<h4 class='label label-danger' style='display: inline;'>$total_votes 票</h4>";
  ?>
  </div>
  <!-- <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button> -->
  <h4 style="margin-top:3%;">需先登入才能進行投票</h4>
  <h4>每個帳號每日最多投三票</h4>
</div>
<!-- 箭頭圖片 -->
<div style="display: flex;margin-top:3%;justify-content: center;align-items: center;animation: moveAndReset 2s infinite;">
  <h4><strong>下滑投票</strong></h4>
  <img src="images/arrow.png" class="arrow" style="margin-top:3%;width:3%;height:auto;  ">
</div>

<!-- <input class="form-control" id="myInput" type="text" placeholder="Search.." style="10%"> -->
  <div class="votecontainer" id="myDIV">
    <!-- 選手1 -->
    <div class ="player1"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer1.jpg" class="img-circle" data-toggle="modal" data-target="#Vote_dance1">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>Andy</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Choreography</p>
          <div class="progress" style="margin-top:7%;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo round(($votes[1]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[1] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[1]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
        <!-- 為了要接收post故用form包起來 -->
        <form method="post" action="">
          <!-- name=vote,value=1 -->
          <button  class="btn btn-danger btn-lg " style="margin-top:30px" name="vote" value="1"><strong>投票</strong></button>
        </form>
        </div>
      </div>
    </div>
    <!-- 選手2 -->
    <div class ="player2"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer2.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance2">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>Ben</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 HipHop</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[2]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[2] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[2]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=2 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="2"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手3 -->
    <div class ="player3"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer3.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance3">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>虹宇</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Dancehall,Sexy Jazz</p>
          <div class="progress" style="margin-top:7%;">
            <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[3]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[3] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[3]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=3 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="3"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手4 -->
    <div class ="player4"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer4.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance4">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>阿邦</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Locking</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[4]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[4] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[4]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=3 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="4"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手5 -->
    <div class ="player5"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer5.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance5">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>七七</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Waccking,Choreography</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[5]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[5] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[5]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=5 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="5"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手6 -->
    <div class ="player6"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer6.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance6">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>Sharron ninja</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Vogue</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[6]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[6] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[6]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=5 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="6"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手7 -->
    <div class ="player7"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer7.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance7">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>孫振</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Breaking</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[7]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[7] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[7]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=7 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="7"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手8 -->
    <div class ="player8"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer8.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance8">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>Rex</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 HipHop</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[8]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[8] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[8]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=7 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="8"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手9 -->
    <div class ="player9"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer9.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance9">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>Coffee</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Krump</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width:  <?php echo round(($votes[9]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[9] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[9]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=7 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="9"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手10 -->
    <div class ="player10"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer10.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance10">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>紀威</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Popping</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo round(($votes[10]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[10] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[10]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=7 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="10"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
    <!-- 選手11 -->
    <div class ="player11"> 
      <div class="row">
        <div class="col-sm-3">
          <img src="images/votedancer11.png" class="img-circle" data-toggle="modal" data-target="#Vote_dance11">
        </div>
        <div class="col-sm-6">
          <h4 class="card-title text-left"><strong>阿金</strong>&nbsp<img src="images/verified.png" style="width:7%;height:7%;"></h4>
          <p class="card-text text-left">擅長舞風 Popping</p>
          <div class="progress" style="margin-top:7%;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo round(($votes[11]/$total_votes)*100); ?>%;" 
            aria-valuenow="<?php echo $votes[11] ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_votes;?>"><?php echo round(($votes[11]/$total_votes)*100); ?>%</div>
          </div>
        </div>
        <div class="col-sm-3">
          <form method="post" action="">
            <!-- name=vote,value=7 -->
            <button class="btn btn-danger btn-lg" style="margin-top:30px" name="vote" value="11"><strong>投票</strong></button>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal 部分 -->
<!-- dancer1 -->
<div class="modal fade" id="Vote_dance1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer1.jpg" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>Andy</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Choreography</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hUeo8UOCL-s" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer2 -->
<div class="modal fade" id="Vote_dance2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer2.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>Ben</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: HipHop</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DwSo8eAFaVY" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer3 -->
<div class="modal fade" id="Vote_dance3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer3.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>虹宇</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Dancehall,Sexy Jazz</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/I5sAfz5Hzws" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer4 -->
<div class="modal fade" id="Vote_dance4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer4.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>阿邦</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Locking</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hNgon-E0D4k" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer5 -->
<div class="modal fade" id="Vote_dance5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer5.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>七七</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Waccking,Choreography</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sA_k2BfcNcs" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer6 -->
<div class="modal fade" id="Vote_dance6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer6.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>Sharron ninja</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Vogue</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/S2rtAgguE88" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer7 -->
<div class="modal fade" id="Vote_dance7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer7.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>孫振</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Breaking</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JumKMQtGNog" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer8 -->
<div class="modal fade" id="Vote_dance8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer8.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>Rex</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: HipHop</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2MF7FuFBFZA" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer9 -->
<div class="modal fade" id="Vote_dance9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer9.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>Coffee</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Krump</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1Rt0Z3Oblgs" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer10 -->
<div class="modal fade" id="Vote_dance10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer10.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>紀威</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Popping</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Aa0-vqlnSJI" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>
<!-- dancer11 -->
<div class="modal fade" id="Vote_dance11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title">選手介紹</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="modal-image">
              <img src="images/votedancer11.png" class="img-fluid rounded-circle mx-auto" alt="選手照片" style="margin-top:8%;width:85%;border-radius: 50%;" >
              <h2><strong>阿金</strong>&nbsp<img src="images/verified.png" style="width:10%;height:10%;"></h2>
              <p>擅長舞風: Popping</p>
            </div>
          </div>
          <div class="col-md-8">
            <div class="model-vedio">
              <!-- <p>選手影片</p> -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/5o8lx_2GEb0" id="my-iframe" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      </div>
    </div>
  </div>
</div>