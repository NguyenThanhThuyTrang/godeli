<?php
include "models/mUser.php";
include "models/User.php";
class cUser {
    function createUser($username, $email, $password) : int {
        $mUser = new mUser();
        $isUser = $mUser->getUser($username);
        if ($isUser !== null) return 1;
        $user = new User($username, $email, $password);
        $status = $mUser->createUser($user);
        if($status === false) return 2;
        return 0;
    }
    function login($username, $password) {
        $mUser = new mUser();
        $hashPassword = md5($password); // Mã hóa mật khẩu
        $user = $mUser->verifyPassword($username, $hashPassword);
    
        return $user; // Trả về thông tin người dùng hoặc null
    }
}

?>