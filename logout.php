<?php
session_start(); // 啟動 Session

// 如果 Session 中有儲存使用者名稱，則清除 Session
if (isset($_SESSION['username'])) {
  unset($_SESSION['username']);
}

// 導向到登入頁面或其他頁面
header('Location: login.php');
exit();
?>
