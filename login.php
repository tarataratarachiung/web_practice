<?php
session_start();
require_once('dbconfig.php');

// 檢查是否已經提交表單
if(isset($_POST['submit'])){
    //在對從前端傳來的 username 和 password 資料進行防 SQL 注入的處理
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    // 建立與資料庫的連線
    $query = "SELECT * FROM users WHERE username='$username'";
    //從 MySQL 查詢結果集中取得一行作為關聯數組（associative array），並將它儲存在 $row 變數中。
    
    $result = mysqli_query($db, $query);
    //如果 mysqli_num_rows() 回傳的值為 1，代表有一筆資料符合查詢條件，程式碼就會執行 mysqli_fetch_assoc() 函數，取得該筆資料的欄位名稱與值，並存入 $row 關聯陣列中
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        //檢查使用者輸入的密碼是否與資料庫中該使用者的密碼相符合
        if($password == $row['password']){
            //驗證通過，使用者的帳號名稱儲存在 session 中，並且導向到 home.php 頁面。
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: home.php');
        }else{
          echo "<script>alert('密碼錯誤，請重新輸入');</script>";        
        }
    }else{
      echo "<script>alert('帳號不存在，請註冊帳號');</script>";       
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>登入</title>
</head>
<style>
/* 標題設定： */
h2 {
  display: flex; 
  justify-content: center; 
  align-items: center; 
  font-size: 3rem; 
  margin-bottom: 2rem;
  text-align: center;;
  -webkit-text-stroke: 1px white; /* 設定白色邊框 */
  -webkit-text-fill-color: transparent; /* 設定文字為透明 */;
  }


form {
  display: flex; 
  flex-direction: column; 
  justify-content: center; 
  align-items: center; 
  background-color: #fff; 
  border-radius: 5px; 
  padding: 2rem;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
  width: 30%;
  margin: 0 auto;
}

/* 表單欄位設定： */
.form-group {
  display: flex;
  justify-content: center; 
  align-items: center;  
  flex-direction: column; 
  margin-bottom: 1rem; 
  Color: #FFFAFA
}

/* 欄位標籤設定： */
label {
  font-size: 1rem; 
  margin-bottom: 0.5rem; 
  text-align: left;
  font-family:Microsoft JhengHei;
  font-weight: 900;
  font-size:115%;
}

/* 欄位輸入框設定 */
input {
  padding: 1rem;
  font-size: 1rem; 
  border: none; 
  width: 30%; 
  margin-bottom: 2rem;
  border-radius: 85px
}

/* 登入按鈕設定 */
.btn-login {
  margin-top: 2rem; 
  padding: 0.75rem 1.5rem; 
  border: none; 
  border-radius: 5px; 
  background-color: #FFFAFA; 
  color: ##DCDCDC; 
  width: 20%;
  font-size: 1.2rem;
  font-weight: bold; 
  cursor: pointer; 
  transition: all 0.3s ease-in-out; 
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  flex-direction: column;
}

/* 滑鼠移過登入按鈕的樣式 */
.btn-login:hover {
   background-color:#1c2331; 
   color: #fff;
}

/* 毛玻璃特效 */
.backdrop-blur {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  -moz-backdrop-filter: blur(10px);
  z-index: 1;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

/* 影片容器 */
.video-container {
  /* position: relative; */
  max-width: auto;
  height: 100%;
  /* padding-top: 56.25%; 16:9 影片比例的容器高度，可以自行調整 */
}
.video-container video {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
}

</style>
<body>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <div class="video-container">
    <video autoplay muted loop >
      <source src="dance_vedio.mp4" type="video/mp4">
    </video> 
    <form method="POST">
      <div class="backdrop-blur">
      <!-- <div style="justify-content: center;align-items: center;flex-direction: column;"> -->
      <h2  style="h2">The Dancers</h2> 
        <div class="form-group">
          <label>帳號</label>
          <input type="text" name="username" placeholder="請輸入帳號" required>
        </div>
        <div class="form-group">
          <label>密碼</label>
          <input type="password" name="password" placeholder="請輸入密碼" required>
          <input type="submit" name="submit" class="btn-login"  value="登入">
          <a href="register.php" style="color:#fff">註冊</a>
          <a href="home.php" style="color:#fff">返回首頁</a>
        </div>  
      </div>
    </form>
    </div>
</body>
</html>


