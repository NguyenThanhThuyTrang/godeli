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
    $sdt = trim($_POST["sdt"]);
    $date = $_POST["date"];
    $address = $_POST["text"];

    // Kiểm tra hợp lệ
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword) || empty($sdt) || empty($date) || empty($address)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Email không hợp lệ.");</script>';
    } elseif (!is_numeric($sdt)) {
        echo '<script>alert("Số điện thoại phải là số.");</script>';
    } elseif (strlen($sdt) < 10 || strlen($sdt) > 11) {
        echo '<script>alert("Số điện thoại phải từ 10 đến 11 chữ số.");</script>';
    } elseif ($password !== $confirmPassword) {
        echo '<script>alert("Mật khẩu xác nhận không khớp.");</script>';
    } elseif (strlen($password) < 6) {
        echo '<script>alert("Mật khẩu phải ít nhất 6 ký tự.");</script>';
    } else {
        // Gọi hàm tạo tài khoản (sửa lại hàm tạo tài khoản theo yêu cầu)
        $check = $cUser->createUser($username, $email, $password, $sdt, $date, $address);
        if ($check === 1) {
            echo '<script>alert("Tài khoản đã tồn tại");</script>';
        } elseif ($check === 2) {
            echo '<script>alert("Đăng ký không thành công");</script>';
        } else {
            echo '<script>alert("Đăng ký thành công");</script>';
            header("Refresh: 0; url=index.php?page=trangchu");
        }
    }
}

?>
