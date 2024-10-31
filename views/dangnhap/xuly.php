<?php
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if ($username === "nv" && $password === "1234") {
        $_SESSION["dangnhap"] = 'nv';
        header("Location:index.php?page=trangchu");
        exit();
    
    }elseif($username === "kh" && $password === "1234") {
        $_SESSION["dangnhap"] = 'kh';
        header("Location:index.php?page=trangchu");
        exit();
    } else {
        echo '<script>alert("Đăng nhập không thành công");</script>';
    }
}
?>
