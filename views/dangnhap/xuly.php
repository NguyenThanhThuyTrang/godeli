

<?php
session_start();
include "controller/cUser.php";
$cUser = new cUser();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hàm login trả về thông tin tài khoản nếu đăng nhập thành công, false nếu thất bại
    $user = $cUser->login(username: $username, password: $password);

    if ($user && is_array($user)) { 
        // Kiểm tra xem dữ liệu trả về có đầy đủ thông tin hay không
        $_SESSION["login"] = true;
        $_SESSION["makh"] = $user["makh"]; // Lưu mã khách hàng vào session
        $_SESSION["tennd"] = $user["tennd"]; // Lưu tên người dùng (hoặc thông tin cần thiết khác)
        header("Location: index.php?page=trangchu"); // Điều hướng đến trang chủ
        exit;
    } else {
        echo '<script>alert("Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin.");</script>';
    }
}
?>

