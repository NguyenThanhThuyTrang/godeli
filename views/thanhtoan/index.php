<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoDeli Order Checkout</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="shortcut icon" href="js/assets/logo/Godeli.png" type="image/x-icon" />
  <style>
    /* Reset CSS */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Global Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      color: #333;
      padding-top: 100px;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    /* Header */
    .header {
      display: flex;
      align-items: center;
      background-color: #ff6b00;
      padding: 10px 20px;
      color: #fff;
      justify-content: space-between;
    }

    .header-menu {
      display: flex;
      list-style-type: none;
      flex-wrap: wrap;
      flex: 1;
      justify-content: space-between;
      margin-left: 20px;
    }

    .header-menu li {
      margin-right: 20px;
    }

    .header-menu li a {
      color: #fff;
      text-decoration: none;
      padding: 5px 10px;
    }

    .right-item {
      display: flex;
      align-items: center;
      margin-left: auto;
    }

    .right-item a {
      color: #fff;
      text-decoration: none;
      margin-left: 15px;
      font-size: 20px;
    }

    /* Order Summary */
    .order-summary {
      border: 1px solid #ddd;
      background-color: #fff;
      padding: 20px;
      width: 46%;
      height: 30%;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-right: auto; /* Đẩy phần "Đơn hàng của bạn" sang trái */
    }

    .order-summary h2 {
      margin-bottom: 20px;
      font-size: 22px;
      color: #ff6b00;
      border-bottom: 2px solid #ff6b00;
      padding-bottom: 10px;
    }

    .order-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
    }

    .order-item img {
      width: 60px;
      height: auto;
      border-radius: 5px;
    }

    .order-item .item-details {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      margin-left: 10px;
    }

    .item-name {
      font-weight: bold;
      width: 40%;
      font-size: 16px;
    }

    .item-price {
      font-weight: bold;
      color: #ff6b00;
      width: 20%;
      text-align: right;
    }

    .order-total {
      font-size: 18px;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      padding: 15px 0;
      margin-top: 10px;
      border-top: 2px solid #ff6b00;
    }

    .checkout-btn {
      background-color: #ff6b00;
      color: #fff;
      border: none;
      padding: 15px 30px;
      font-size: 18px;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      width: 100%;
      margin-top: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s ease;
    }

    .checkout-btn:hover {
      background-color: #e65a00;
    }

    /* Delivery Information Form */
    .delivery-info {
      border: 2px solid #ff6b00; /* Tăng độ nổi bật với đường viền cam đậm */
      background-color: #fff;
      padding: 20px;
      width: 48%;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .delivery-info h2 {
      margin-bottom: 20px;
      font-size: 22px;
      color: #ff6b00;
      border-bottom: 2px solid #ff6b00;
      padding-bottom: 10px;
    }

    .delivery-info label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .delivery-info input,
    .delivery-info select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .delivery-info .submit-btn {
      background-color: #ff6b00;
      color: #fff;
      border: none;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .delivery-info .submit-btn:hover {
      background-color: #e65a00;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        padding: 10px;
      }

      .order-summary,
      .delivery-info {
        width: 100%;
        margin-bottom: 20px;
      }

      .header-menu li {
        margin-right: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="order-summary">
      <h2>Đơn hàng của bạn:</h2>
      <div class="order-item">
        <img src="IMAGE/ảnh món nướng/CaNuong.png" alt="Gà không cay">
        <div class="item-details">
          <div class="item-name">Gà giòn không cay</div>
          <div class="item-price">74.000 đ</div>
        </div>
      </div>
      <div class="order-item">
        <img src="IMAGE/NuocUong/BiaSG.jpg" alt="Coca Cola">
        <div class="item-details">
          <div class="item-name">Coca Cola</div>
          <div class="item-price">18.000 đ</div>
        </div>
      </div>
      <div class="order-total">
        <span>Tổng cộng:</span>
        <span>92.000 đ</span>
      </div>
      <br>
      <center><i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
      <p style="color: red;">Vui lòng nhập đúng thông tin Khách hàng, kiểm tra Giỏ hàng trước khi Đặt hàng.</p></center>
      
      
    </div>
    

    <div class="delivery-info">
      <h2>Thông tin nhận hàng</h2>
      <form action="tt3.html" method="POST">
        <label for="name">Tên khách hàng:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Địa chỉ nhận hàng:</label>
        <input type="text" id="address" name="address" required>

        <label for="branch">Chọn chi nhánh:</label>
        <select id="branch" name="branch" required>
          <option value="tanbinh">Chi nhánh Quận 1</option>
          <option value="govap">Chi nhánh Gò Vấp</option>
          <option value="binhthanh">Chi nhánh Bình Thạnh</option>
        </select>

        <label for="email">Email (nếu có):</label>
        <input type="email" id="email" name="email">

        <label for="note">Ghi chú (nếu có):</label>
        <input type="text" id="note" name="note">

        <button type="submit" class="submit-btn">Hoàn tất đơn hàng</button>
      </form>
    </div>
  </div>
