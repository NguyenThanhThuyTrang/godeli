<?php
    include("views/dangnhap/xuly.php");
?>  
<head>
  <link rel="stylesheet" href="js/assets/css/login.css?v=1" />
</head>
<body>
  <div class="app">
    <div class="login-container">
      <div class="img-body-left">
        <img src="js/assets/img/gifBody.gif" class="img-body" alt="">
        <h1 class="txt-body" id="txtFix1"></h1>
      </div>

      <!-- Login -->
      <div class="login__inner">
        <h1>Đăng nhập</h1>
        <form method="post">
          <div class="form-control">
            <input type="text" name="username" placeholder="Username" />
            <span></span>
            <small></small>
          </div>
          <div class="form-control">
            <input type="password" name="password" placeholder="Password" />
            <span></span>
            <small></small>
          </div>
          <input type="submit" value="Đăng nhập" style="background-color: orange;" id="login" data-target="#signUpModal" data-toggle="modal" name="login" />
          <div class="signup_link">
          <a href="index.php?page=dangky">Đăng ký!</a>
          </div>
          <div class="signup_link" style="border-bottom: 1px solid gray">
            Or <i class="fa-solid fa-arrow-down"></i>
          </div>
          <div class="other_login">
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="https://accounts.google.com/"><i class="fa-brands fa-google"></i> Google</a>
            <a href="https://appleid.apple.com/sign-in"><i class="fa-brands fa-apple"></i> Apple</a>
          </div>
        </form>
      </div>
    </div>
</div>