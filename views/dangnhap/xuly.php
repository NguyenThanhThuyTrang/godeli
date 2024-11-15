<?php
session_start();
include "controller/cUser.php";
$cUser = new cUser();

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $check = $cUser->login($username, $password);
    if($check) {
        // create a new variable for the checking login yet
        $_SESSION["login"] = true;
        header("Refresh: 0; url=index.php?page=trangchu");
    } else {
        echo '<script>alert("Đăng nhập không thành công");</script>';
    }
}
?>

