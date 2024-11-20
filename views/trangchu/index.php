<?php
session_start();
include 'controller/csanpham.php'; 
echo '<link rel="stylesheet" href="css/trangchu/style.css?v=3">';

$controllers = new CSanPham();

$sanPhamMoi = $controllers->laySanPhamMoiNhat();
$sanPhamCombo = $controllers->laySanPhamCombo();

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

<main>
    <!-- banner -->
    <div class="background-header">
        <a href="index.php?page=sanpham"><img class="background-header-img" src="images/banner1.jpg" alt=""></a>
        <div class="dots"></div>
    </div>

    <!-- sản phẩm mới -->
    <section class="products container">
        <div class="new-products">
            <h3 class="title-newproducts">SẢN PHẨM MỚI NHẤT</h3>
            <div class="product-grid">
                <?php
                if (!empty($sanPhamMoi)) {
                    foreach ($sanPhamMoi as $sp) {
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
                } else {
                    echo "<p>Không có sản phẩm mới.</p>";
                }
                ?>
            </div>
            <div class="btn-xem-all">
            <button type="button" class="view-all-button" onclick="window.location.href='index.php?page=sanpham';">Xem tất cả</button>
            </div>
        </div>
    </section>

    <section class="products container">
        <div class="new-products">
            <h3 class="title-newproducts">COMBO BÙNG NỔ</h3>
            <div class="product-grid">
                <?php
                if (!empty($sanPhamCombo)) {
                    foreach ($sanPhamCombo as $sp) {
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
                }
                ?>
            </div>
            <div class="btn-xem-all">
            <button type="button" class="view-all-button" onclick="window.location.href='index.php?page=sanpham&category=Combo';">Xem tất cả</button>
            </div>
        </div>
    </section>

    <!-- liên hệ đặt bàn  -->
    <section class="hero container">
        <div class="hero-content">
            <h1><span>GoDeli</span></h1>
            <h2>Cung cấp dịch vụ chuyên nghiệp</h2>
            <p>Luôn lắng nghe, tiếp thu ý kiến của khách hàng với tinh thần cầu thị, nhân viên công ty luôn phục vụ bằng lương tâm và trách nhiệm.</p>
            <a href="#" class="cta-button">Đặt bàn ngay</a>
        </div>
        <div class="hero-image">
            <img src="images/blog-3.jpg?height=400&width=600" alt="Restaurant scene">
        </div>
    </section>

    <!-- modal chi tiết sản phẩm -->
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
</main>
<script src="js/sanpham/sanpham.js"></script>

