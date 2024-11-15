<?php
class CheckLegal {
    function isLogin() {
        $isLogin = $_SESSION['login'];
        if(!$isLogin)
            header("Refresh: 0; url=index.php?page=trangchu");
    }
}


?>