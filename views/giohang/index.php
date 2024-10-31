<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoDeli Cart</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Thêm Font Awesome -->
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
    }

    .container {
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
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
      align-items: center; /* Canh giữa biểu tượng */
      margin-left: auto;
    }

    .right-item a {
      color: #fff;
      text-decoration: none;
      margin-left: 15px; /* Khoảng cách giữa các biểu tượng */
      font-size: 20px; /* Kích thước biểu tượng */
    }

    /* Order Summary */
    .order-summary {
      border: 1px solid #ddd;
      background-color: #fff;
      padding: 20px;
      width: 48%;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
      width: 60px; /* Giảm kích thước hình */
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

    .item-quantity {
      display: flex;
      align-items: center;
    }

    .item-quantity button {
      background-color: #ff6b00;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
      margin: 0 5px;
    }

    .item-quantity span {
      font-size: 16px;
    }

    .item-price {
      font-weight: bold;
      color: #ff6b00;
      width: 20%;
      text-align: right;
    }

    .remove-item {
      background-color: #ff0000; /* Nền màu đỏ */
      color: #fff; /* Chữ màu trắng */
      border: none;
      padding: 3px 8px; /* Kích thước nhỏ hơn */
      cursor: pointer;
      font-size: 14px; /* Chữ nhỏ */
      border-radius: 5px;
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

    /* Menu Items */
    .menu-items {
      border: 1px solid #ddd;
      background-color: #fff;
      padding: 20px;
      width: 48%;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .menu-items h2 {
      margin-bottom: 20px;
      font-size: 22px;
      color: #ff6b00;
      border-bottom: 2px solid #ff6b00;
      padding-bottom: 10px;
    }

    .menu-item {
      display: flex;
      align-items: center; /* Hình và tên nằm trên cùng một dòng */
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
      position: relative;
    }

    .menu-item:hover {
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .menu-item img {
      width: 60px; /* Giảm kích thước hình */
      height: auto;
      margin-right: 10px;
      border-radius: 5px;
    }

    .menu-item .item-details {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .menu-item .item-name {
      font-weight: bold;
      font-size: 16px;
    }

    .menu-item .item-price {
      color: #ff6b00;
      font-weight: bold;
      font-size: 16px;
    }

    .menu-item button {
      position: absolute;
      bottom: 1px; /* Đặt nút nằm dưới cùng */
      right: 25px;
      background-color: #fff;
      color: #ff6b00;
      border: 1px solid #ff6b00;
      padding: 5px 10px; /* Nhỏ hơn */
      cursor: pointer;
      border-radius: 5px;
      font-size: 14px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .menu-item button:hover {
      background-color: #ff6b00;
      color: #fff;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        padding: 10px;
      }

      .order-summary,
      .menu-items {
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
      <h2>Giỏ hàng của bạn:</h2>
      <div class="order-item">
        <img src="IMAGE/ảnh món nướng/CaNuong.png" alt="Gà không cay">
        <div class="item-details">
          <div class="item-name">Gà giòn không cay</div>
          <div class="item-quantity">
            <button>-</button>
            <span>2</span>
            <button>+</button>
          </div>
          <div class="item-price">74.000 đ</div>
          <button class="remove-item">Xóa</button>
        </div>
      </div>
      <div class="order-item">
        <img src="IMAGE/NuocUong/BiaSG.jpg" alt="Coca Cola">
        <div class="item-details">
          <div class="item-name">Coca Cola</div>
          <div class="item-quantity">
            <button>-</button>
            <span>1</span>
            <button>+</button>
          </div>
          <div class="item-price">18.000 đ</div>
          <button class="remove-item">Xóa</button>
        </div>
      </div>
      <div class="order-total">
        <span>Tổng cộng:</span>
        <span>92.000 đ</span>
      </div>
      <button class="checkout-btn" onclick="location.href='index.php?page=thanhtoan';">Thanh toán</button>

    </div>

    <div class="menu-items">
      <h2>Thực đơn gợi ý</h2>
      <div class="menu-item">
        <img src="IMAGE/ảnh món nướng/HauNuong.jpg" alt="Gà giòn không cay">
        <div class="item-details">
          <div class="item-name">Pizza chicken</div>
          <div class="item-price">45.000 đ</div>
        </div>
        <button>Thêm vào giỏ</button>
      </div>
      <div class="menu-item">
        <img src="IMAGE/NuocUong/NuocCam.jpg" alt="Coca Cola">
        <div class="item-details">
          <div class="item-name">Nước Cam</div>
          <div class="item-price">35.000 đ</div>
        </div>
        <button>Thêm vào giỏ</button>
      </div>
      <div class="menu-item">
        <img src="IMAGE/MonKhac/salab-tom.jpg" alt="Coca Cola">
        <div class="item-details">
          <div class="item-name">Banana Bread</div>
          <div class="item-price">65.000 đ</div>
        </div>
        <button>Thêm vào giỏ</button>
      </div>
      
    </div>
  </div>
