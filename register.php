<?php
session_start();
require_once('dbconfig.php');

// 檢查是否已經提交表單
if(isset($_POST['submit'])){

    // 從前端傳來的 username 和 password 資料進行防 SQL 注入的處理
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // 檢查使用者帳號是否已經存在於資料庫
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    //如果查詢結果有符合條件的資料
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('該帳號已經存在，請重新輸入');</script>";
    }else{
        // 將密碼加密後儲存到資料庫中
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 將新使用者資料插入到資料庫中
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($db, $insert_query);

        // 註冊成功，使用者的帳號名稱儲存在 session 中，並且導向到 home.html 頁面。
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "<script>alert('註冊成功!'); window.location.href = 'home.php';</script>";

    }

    // 關閉資料庫連接
    mysqli_close($db);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>註冊</title>
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
  /* position: relative;
  max-width: auto; */
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
        <h2  style="h2">The Dancers</h2> 
        <div class="form-group">
        <label>帳號</label>
          <input type="text" name="username" placeholder="請輸入帳號" required>
        </div>
        <div class="form-group">
            <label>密碼</label>
            <input type="password" name="password" placeholder="請輸入密碼" required>
            <input type="submit" name="submit" class="btn-login"  value="註冊">
            <a href="login.php" style="color:#fff">登入</a>
            <a href="home.php" style="color:#fff">返回首頁</a>
        </div>
        </div>
    </form>
    </div>
</body>
</html>
