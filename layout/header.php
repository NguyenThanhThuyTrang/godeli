<?php
session_start(); // Khởi động phiên làm việc

// Kiểm tra nếu người dùng đã xác nhận đăng xuất
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_destroy(); // Hủy phiên làm việc
    header('Location: index.php?page=dangnhap'); // Chuyển hướng đến trang đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="layout/style.css?v=2">
    <link rel="stylesheet" href="js/assets/css/dx.css">
    <link rel="stylesheet" href="js/assets/css/footer/footer.css" />
    
    <title>Godeli</title>
    <link rel="shortcut icon" href="images/Godeli.png" type="image/x-icon" />
</head>
<body>
    <header>
        <nav class="container">
            <div class="nav">
                <a href="index.php?page=trangchu">Trang chủ</a>
                <a href="index.php?page=sanpham">Thực đơn</a>
                <a href="index.php?page=giohang" class="cart-icon" style="text-decoration: none;">
                    Giỏ hàng
                    <i class="fa fa-cart-plus"></i> 
                </a>
            </div>
            <div class="search-container">
                <form action="index.php" method="get">
                    <input type="hidden" name="page" value="sanpham">
                    <input type="text" name="search" placeholder="Tìm kiếm món ăn">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="nav">
                <?php
                    if (isset($_SESSION["login"]) && $_SESSION["login"]) {
                        echo '<a href="#" id="logoutButton" style="text-decoration: none; padding: 0;"> <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
                    } else {
                        echo '<a href="index.php?page=dangky" style="text-decoration: none; margin-left: 20px;"> <i class="fas fa-user-plus"></i> Đăng ký</a>/';
                        echo '<a href="index.php?page=dangnhap" style="text-decoration: none; margin-left: 10px;"> <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>';
                    }
                ?>
            </div>
        </nav>
    </header>

    <!-- Modal xác nhận -->
    <div id="logoutModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">×</span>
            <h4>Xác nhận đăng xuất</h4>
            <p>Bạn có chắc chắn muốn đăng xuất không?</p>
            <button onclick="confirmLogout()">Có</button>
            <button onclick="closeModal()">Không</button>
        </div>
    </div>

    <script>
        const logoutButton = document.getElementById('logoutButton');
        const logoutModal = document.getElementById('logoutModal');

        // Hiển thị modal xác nhận khi nhấn Đăng xuất
        if (logoutButton) {
            logoutButton.onclick = function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định
                logoutModal.style.display = 'block';
            };
        }

        function closeModal() {
            logoutModal.style.display = 'none';
        }

        function confirmLogout() {
            window.location.href = 'index.php?page=dangxuat&confirm=yes'; // Thêm confirm=yes để xác nhận đăng xuất
        }

        window.onclick = function(event) {
            if (event.target === logoutModal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
