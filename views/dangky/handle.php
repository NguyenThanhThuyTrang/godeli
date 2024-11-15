<?php
session_start();

include "controller/cUser.php";

$cUser = new cUser();

if (isset($_POST["signUp"])) {
    // Nhận dữ liệu từ form
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Kiểm tra hợp lệ
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Email không hợp lệ.");</script>';
    } elseif ($password !== $confirmPassword) {
        echo '<script>alert("Mật khẩu xác nhận không khớp.");</script>';
    } else {
        $check = $cUser->createUser($username, $email, $password);
        if ($check === 1) {
            echo '<script>alert("Tài khoản đã tồn tại");</script>';
        } elseif($check === 2){
            echo '<script>alert("Đăng ký không thành công");</script>';
        } else {
            echo '<script>alert("Đăng ký thành công");</script>';
            header("Refresh: 0; url=index.php?page=trangchu");
        }
    }
}
?>
