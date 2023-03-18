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
            //驗證通過，使用者的帳號名稱儲存在 session 中，並且導向到 home.html 頁面。
            $_SESSION['username'] = $username;
            header('Location: home.html');
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
    body {
        background-color: #1c2331;
        color: #fff;
      }
    /* 將表單元素設為區塊元素 */
    form {
        
        text-align: center;
    }

   </style>
<body>
    <h2  style="text-align: center">登入</h2>
    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST">
        <label  style="margin: 5px auto;
        width: 20%;">帳號：</label>
        <input type="text" name="username" required><br><br>
        <label  style="margin: 5px auto;
        width: 20%;">密碼：</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="登入">
        <a href="register.php" style="color:#fff">註冊</a></div>
        <a href="home.html" style="color:#fff">返回首頁</a></div>

    </form>
</body>
</html>
