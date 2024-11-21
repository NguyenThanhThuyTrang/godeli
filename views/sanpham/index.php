<?php
session_start();
echo '<link rel="stylesheet" href="css/sanpham/style.css?v=2">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
include 'controller/csanpham.php'; 

$controllers = new CSanPham(); 
$tatCaSanPham = [];

if (isset($_GET['category']) && $_GET['category'] !== 'all') {
    $category = $_GET['category'];
    $tatCaSanPham = $controllers->laySanPhamTheoLoai($category);
} elseif (isset($_GET['search']) && !empty($_GET['search'])) {
    $ten = $_GET['search'];
    $tatCaSanPham = $controllers->timKiemSanPham($ten);
} else {
    $tatCaSanPham = $controllers->layTatCaSanPham();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $mama = $_POST['mama'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $makh = $_SESSION['makh'] ?? null;

    if (!$makh) {
        echo '<script>
                alert("Bạn phải đăng nhập để tiếp tục đặt món!");
                window.location.href = "index.php?page=dangnhap";
              </script>';
        exit;
    } elseif ($mama && $soluong > 0 && $dongia > 0) {
        $result = $controllers->themVaoGioHang($mama, $soluong, $dongia, $makh);
        if ($result === true) {
            echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng thành công!");</script>';
        } else {
            echo '<script>alert("' . $result . '");</script>';
        }
    }
}
?>
<body>
    <form action="" method="get">
        <div class="container">
            <div class="sidebar">
                <h2>Lọc món ăn</h2>
                <ul id="category-list">
                    <li>
                        <a href="index.php?page=sanpham&category=all" class="category-button">All</a>
                    </li>
                    <li>
                        <a href="index.php?page=sanpham&category=Gà Rán" class="category-button">Gà rán</a>
                    </li>
                    <li>
                        <a href="index.php?page=sanpham&category=Nước Ngọt" class="category-button">Nước ngọt</a>
                    </li>
                    <li>
                        <a href="index.php?page=sanpham&category=Mì Ý" class="category-button">Mì ý</a>
                    </li>
                    <li>
                        <a href="index.php?page=sanpham&category=Khoai Tây Chiên" class="category-button">Khoai tây chiên</a>
                    </li>
                    <li>
                        <a href="index.php?page=sanpham&category=Combo" class="category-button">Combo</a>
                    </li>
                </ul>
            </div>
            <div class="content" id="product-list">
                <?php
                    foreach ($tatCaSanPham as $sp) {
                        echo '
                        <div class="recipe-card">
                            <a href="#" class="product-link" data-mama="' . $sp['mama'] . '" data-tenma="' . $sp['tenma'] . '" data-hinhanh="' . $sp['hinhanh'] . '" data-giaban="' . $sp['giaban'] . '">
                                <img src="images/' . $sp['hinhanh'] . '" alt="' . $sp['tenma'] . '" class="recipe-image">
                                <div class="recipe-info">
                                    <h3>' . $sp['tenma'] . '</h3>
                                    <div class="recipe-meta">
                                        <b><span>' . number_format($sp['giaban'], 0, ',', '.') . ' VND</span></b>
                                    </div>
                                    <br>
                                </div>
                            </a>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </form>

    <div class="product-overlay" id="productOverlay" onclick="closeProductDetails()"></div>
    <form class="product-detail-form" id="productDetailForm" style="display: none;" method="post">
        <span class="close-button" onclick="closeProductDetails()">×</span>  
        <div class="detail-content">  
            <img id="detailImage" src="" alt="Product Image" class="detail-image">  
            <div class="detail-info">  
                <h2 id="detailName" class="product-name"></h2>  
                <p id="detailDescription" class="product-description"></p>  
                <p id="detailPrice" class="product-price"></p>  
                <div class="quantity-control">  
                    <button type="button" class="quantity-btn" id="decrease-btn">-</button>  
                    <input type="number" name="soluong" value="1" min="1" class="quantity-input" id="quantity-input">  
                    <button type="button" class="quantity-btn" id="increase-btn">+</button>  
                </div>  
                <input type="hidden" name="makh" id="makh">
                <input type="hidden" name="mama" id="mama">
                <input type="hidden" name="dongia" id="dongia">
                <button type="submit" name="add_to_cart" class="add-to-cart-button">Thêm vào giỏ hàng</button>  
            </div>  
        </div>  
    </form>

</body>
<script src="js/sanpham/sanpham.js"></script>
</html>
