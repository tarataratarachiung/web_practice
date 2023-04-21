<?php
require_once('dbconfig.php');
$name = $_POST['name'];
$nickname = $_POST['nickname'];
$birth = $_POST['birth'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$intro = $_POST['intro'];
$demoaddress = $_POST['demoaddress'];
$sql = "INSERT INTO participants (name, nickname, birth, address, phone, intro, demoaddress)
        VALUES ('$name', '$nickname', '$birth', '$address', '$phone', '$intro', '$demoaddress')";

if ($db->query($sql) === TRUE) {
    echo "<script>alert('已完成報名'); window.location.href='home.php';</script>";
} else {
    echo "發生錯誤: " . $sql . "<br>" . $db->error;
    header('Location: home.php');
}

?>