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
        echo "<script>alert('註冊成功!'); window.location.href = 'home.html';</script>";

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
    <h2  style="text-align: center">註冊</h2>
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
        <input type="submit" name="submit" value="註冊">
        <a href="login.php" style="color:#fff">登入</a></div>
        <a href="home.html" style="color:#fff">返回首頁</a></div>
    </form>
</body>
</html>
