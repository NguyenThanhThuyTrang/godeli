<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoDeli Order Checkout</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="shortcut icon" href="js/assets/logo/Godeli.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/giohang/day_donhang.css">
  <style>
    .notification {
        padding: 15px;
        margin: 20px auto;
        border-radius: 5px;
        max-width: 600px;
        text-align: center;
    }

    .success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <?php
  session_start();
  include_once 'controller/cthanhtoan.php';

  $makh = isset($_SESSION['makh']) ? $_SESSION['makh'] : null;

  if (!$makh) {
      echo "<p style='color:red; text-align:center;'>Vui lòng đăng nhập để xem giỏ hàng!</p>";
      exit;
  }

  $checkoutController = new CheckoutController();
  $danhSachSP = $checkoutController->HienThiSP($makh);

  if (empty($danhSachSP)) {
      echo "<p style='color:red; text-align:center;'>Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán.</p>";
      exit;
  }

  $danhSachCuaHang = $checkoutController->layDanhSachCuaHang();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ten = $_POST['name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $mach = $_POST['branch'];
      $ghichu = $_POST['note'];
      $tongtien = $_POST['tongtien'];

      if (empty($ten) || empty($phone) || empty($address)) {
          echo "<div class='notification error'>Vui lòng điền đầy đủ thông tin!</div>";
      } else {
          $result = $checkoutController->taoDonHang($makh, $mach, $tongtien, $ghichu);

          if ($result['status']) {
              echo "<div class='notification success'>{$result['message']}</div>";
          } else {
              echo "<div class='notification error'>{$result['message']}</div>";
          }

          echo "<script>
                  setTimeout(function() {
                      window.location.href = 'index.php?page=trangchu';
                  }, 3000);
                </script>";
      }
  }
  ?>

  <div class="container">
    <div class="order-summary">
      <h2>Đơn hàng của bạn:</h2>
      <?php 
      $tongTien = 0;
      foreach ($danhSachSP as $item): 
          $subtotal = $item['giaban'] * $item['soluong']; 
          $tongTien += $subtotal;
      ?>
          <div class="order-item">
            <img src="images/<?php echo $item['hinhanh']; ?>" alt="<?php echo $item['tenma']; ?>">
            <div class="item-details">
              <div class="item-name"><?php echo $item['tenma']; ?></div>
              <div class="item-price">
                 x <?php echo $item['soluong']; ?>
              </div>
              <div class="item-subtotal">
               <?php echo number_format($subtotal, 0, ',', '.'); ?> đ
              </div>
            </div>
          </div>
      <?php endforeach; ?>
      <div class="order-total">
        <span>Tổng cộng:</span>
        <span><?php echo number_format($tongTien, 0, ',', '.'); ?> đ</span>
      </div>
    </div>  

    <div class="delivery-info">
      <h2>Thông tin nhận hàng</h2>
      <form method="POST" action="">
        <label for="name">Tên khách hàng:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên người nhận" required>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>

        <label for="address">Địa chỉ nhận hàng:</label>
        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ nhận hàng" required>

        <label for="branch">Chọn chi nhánh:</label>
        <select id="branch" name="branch" required>
          <?php foreach ($danhSachCuaHang as $cuaHang): ?>
            <option value="<?php echo $cuaHang['mach']; ?>">
                <?php echo $cuaHang['tench']; ?>
            </option>
          <?php endforeach; ?>
        </select>

        <label for="email">Email (nếu có):</label>
        <input type="email" id="email" name="email" placeholder="Nhập email nếu có">

        <label for="note">Ghi chú (nếu có):</label>
        <input type="text" id="note" name="note" placeholder="Nhập ghi chú nếu có">

        <input type="hidden" name="tongtien" value="<?php echo $tongTien; ?>">

        <button type="submit" class="submit-btn">Hoàn tất đơn hàng</button>
      </form>
    </div>
  </div>
</body>
</html>
