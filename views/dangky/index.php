<?php
    echo'<link rel="shortcut icon" href="js/assets\ico\cookerTon.png" />
        <link rel="stylesheet" href="js/assets/css/login.css" />';
    include "handle.php";
?>
<style>
  body{
    padding-top: 80px;
  }
</style>
  </head> 
  <body>
    <div class="app">
      <div class="login-container">
        <div class="img-body-left">
          <img src="js/assets/img/gifBody.gif" class="img-body" alt="">
        </div>
        <!-- Sign-up -->
        <div class="login__inner">
          <h1>Đăng ký</h1>
          <form method="post">
            <div class="form-control">
              <input type="text" id="username" name="username" placeholder="Username" />
              <span></span>
              <small></small>
            </div>
            <div class="form-control">
              <input type="email" id="email" name="email" placeholder="Email" />
              <span></span>
              <small></small>
            </div>
            <div class="form-control">
              <input type="password" id="password" name="password" placeholder="Password" />
              <span></span>
              <small></small>
            </div>
            <div class="form-control">
              <input
                type="password"
                id="confirm_password"
                name="confirm_password"
                placeholder="Confirm Password"
              />
              <span></span>
              <small></small>
            </div>
            <input
              type="submit"
              value="Đăng ký"
              id="signUp"
              name="signUp"
              data-target="#signUpModal"
              data-toggle="modal"
              style="background-color: orange";
            />
            <div class="signup_link">
            <a href="login.html">Login Here!</a>
            </div>
            <div class="signup_link" style="border-bottom: 1px solid gray">
              Others <i class="fa-solid fa-arrow-down"></i>
            </div>
            <div class="other_login">
              <a href="https://www.facebook.com/"
                ><i class="fa-brands fa-facebook"></i> Facebook</a
              >
              <a href="https://accounts.google.com/"
                ><i class="fa-brands fa-google"></i> Google</a
              >
              <a href="https://appleid.apple.com/sign-in"
                ><i class="fa-brands fa-apple"></i> Apple</a
              >
            </div>
          </form>
        </div>

        <div
          class="modal fade"
          id="signUpModal"
          role="dialog"
          aria-hidden="true"
          tabindex="-1"
        >
          <div class="modal-dialog">
            <div class="modal-content" style="text-align: center">
              <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">
                  Cooker Ton
                </h1>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <a href="./index.html" class="btn" id="backHome"
                  >Go on the homepage</a
                >
                <a
                  href="./login.html"
                  class="btn"
                  id="goSignIn"
                  style="font-size: 15px"
                  >Go To Login</a
                >
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
