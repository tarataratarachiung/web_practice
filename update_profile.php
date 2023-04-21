<?php
  session_start();
  require_once('dbconfig.php');   


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 取得表單資料
    $username = $_POST['username'];
    // $password = $_POST['Password'];
    $newPassword = $_POST["new_password"];
    $newPasswordConfirm = $_POST["new_password_confirm"];

    // 檢查新密碼是否一致
    if ($newPassword != $newPasswordConfirm) {
        echo  "<script>alert('輸入不一致，請重新輸入'); window.location.href='Member_Center.php';</script>";
        exit;
    }

    // 更新密碼
    $sql = "UPDATE users SET password = ? WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ss", $newPassword, $username);
    $stmt->execute();
    $stmt->close();

    // 關閉資料庫連線
    $db->close();
    // 密碼更新成功
    echo "<script>alert('密碼已更新'); window.location.href='Member_Center.php';</script>";
}

?>
