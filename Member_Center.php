<?php
session_start();
require_once('dbconfig.php');


// 檢查是否已經設定了 username 和 password
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

} 


?>
<!DOCTYPE html>
<html>
<head>
  <title>會員中心</title>
  <style>
/* 設定背景顏色 */
body {
    background-color: #1c2331;
	  color: black;
  }
/* 白色背景的樣式 */
.outer-container {
  display: flex;
  flex-wrap: wrap;
  background-color:#fff;
  border-radius: 10px;
  padding: 1rem;
  margin: 2rem auto;
  max-width: 50%;
  max-height: 80%;
  justify-content: center; /* 水平置中 */
  align-items: center; /* 垂直置中 */
  flex-direction: column;
}
/* 內層的樣式 */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 2rem;
}
/* 標題的樣式 */
h1 {
    text-align: center;
    margin-bottom: 2rem;
  }
/* 表單的樣式 */
label {
    display: block;
    margin-bottom: 1rem;
    font-family:Microsoft JhengHei;
    font-size: 16px;
  }

/* 設定帳號、郵件、密碼樣式 */
input[type="text"], input[type="email"], input[type="password"], select {
    display: block;
    width: 200px; /* 將此處的數值改成相同的大小即可 */
    padding: 0.5rem;
    margin-bottom: 1rem;
    border-radius: 3px;
}

/* 設定選單的樣式 */
select {
    display: block;
    width: 220px; /* 將此處的數值改成不相同的大小即可 */
    padding: 0.5rem;
    margin-bottom: 1rem;
    border-radius: 3px;
}

/* 設定更改按鈕的樣式 */
input[type="submit"],select{
  margin-bottom: 1rem;
}    
/* 登入按鈕設定 */
  .btn-update {
  margin-top: 2rem; 
  padding: 0.75rem 1.5rem; 
  border: none; 
  border-radius: 5px; 
  background-color: #1c2331; 
  color: #fff; 
  width: 60%;
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
.btn-update:hover {
   background-color:RGB(0, 13, 145); 
   color: #fff;
}
/* 設定表單的樣式 */
form {
  margin: 0 auto;
  max-width: 1000px;
  display: flex; 
  flex-direction: column; 
  justify-content: center; 
  align-items: center; 
  background-color: #fff; 
  }


  </style>
</head>
<script>
// function showPassword() {
//     var passwordField = document.getElementById('passwordField');
//     // 將隱藏的密碼字段的類型更改為text，使其明文可見
//     passwordField.type = 'text';
// }
</script>
<body>
    <div class="outer-container">
        <div class="container">
            <h1>會員中心</h1>
            <div class="profile-info">
                <form action="update_profile.php" method="post">
                    <div class="form-group">
                        <label style="display:inline-block;">帳號</label>
                        <input type="hidden" name="username" value="<?php echo $username; ?>" style="display:inline-block;"><?php echo $username; ?><br>
                        
                        <!-- <label style="display:inline-block;">密碼</label>
                        <input type="hidden" name="password" id="passwordField" value="<?php echo $password; ?>" style="display:inline-block;">
                        
                        <input type="button" value="顯示密碼" onclick="showPassword()" style="display: inline-block;"><br> -->
                        
                        <label>新密碼 </label>
                        <input type="password" name="new_password" placeholder="輸入新密碼" required>
                        <input type="password" name="new_password_confirm" placeholder="再輸入一次新密碼" required>
                    </div>
                    <input type="submit" class="btn-update" name="" value="更新密碼">
                    <a href="home.php" style="color:#1c2331">回首頁</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
