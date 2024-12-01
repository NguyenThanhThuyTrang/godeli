<?php
session_start();
include 'controller/csanpham.php'; 
echo '<link rel="stylesheet" href="css/trangchu/style.css?v=1">';
echo '<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">';

$controllers = new CSanPham();

$sanPhamMoi = $controllers->laySanPhamMoiNhat();
$sanPhamCombo = $controllers->laySanPhamCombo();

$notification = ''; // Biến thông báo

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $mama = $_POST['mama'];
    $soluong = $_POST['soluong'];
    $dongia = $_POST['dongia'];
    $makh = $_SESSION['makh'] ?? null;

    if (!$makh) {
        $notification = 'Bạn phải đăng nhập để tiếp tục đặt món!';
    } elseif ($mama && $soluong > 0 && $dongia > 0) {
        $result = $controllers->themVaoGioHang($mama, $soluong, $dongia, $makh);
        if ($result === true) {
            $notification = 'Sản phẩm đã được thêm vào giỏ hàng thành công!';
        } else {
            $notification = $result;
        }
    }
}
?>
<style>
.notification {
    position: fixed;
    top: 50%; /* Đặt ở giữa theo chiều dọc */
    left: 50%; /* Đặt ở giữa theo chiều ngang */
    transform: translate(-50%, -50%); /* Dịch chuyển để căn giữa */
    background-color: #333;
    color: white;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    transition: opacity 0.5s;
    z-index: 1000; /* Đảm bảo thông báo nằm trên các phần khác */
    display: none; /* Ẩn thông báo mặc định */
}
</style>
<main>
    <!-- Hiển thị thông báo nếu có -->
    <div id="notification" class="notification">
        <?php if (!empty($notification)): ?>
            <?php echo $notification; ?>
        <?php endif; ?>
    </div>

    <!-- Banner -->
    <div class="background-header" data-aos="fade-up" data-aos-duration="1200">
        <a href="index.php?page=sanpham"><img class="background-header-img" src="images/banner1.jpg" alt=""></a>
        <div class="dots"></div>
    </div>

    <!-- Quảng cáo -->
    <section class="ads-section" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
        <div class="ads-content">
            <a href="index.php?page=sanpham&search=gà+rán+combo" class="ad-link">
                <img src="images/ad4.jpg" alt="Ad 1" class="ad-image">
            </a>
            <a href="index.php?page=sanpham&search=g%C3%A0+r%C3%A1n+cay" class="ad-link">
                <img src="images/ad2.jpg" alt="Ad 2" class="ad-image">
            </a>
            <a href="index.php?page=sanpham&search=combo+%C4%91%E1%BA%B7t+bi%E1%BB%87t" class="ad-link">
                <img src="images/ad3.jpg" alt="Ad 3" class="ad-image">
            </a>
            <a href="index.php?page=sanpham&category=Khoai%20Tây%20Chiên" class="ad-link">
                <img src="images/ad5.jpg" alt="Ad 4" class="ad-image">
            </a>
            <a href="index.php?page=sanpham&category=Combo" class="ad-link">
                <img src="images/ad6.jpg" alt="Ad 5" class="ad-image">
            </a>
        </div>
    </section>

   <!-- Sản phẩm mới -->
   <section class="products container" data-aos="fade-up" data-aos-duration="1200">
        <div class="new-products">
            <h3 class="title-newproducts">SẢN PHẨM MỚI NHẤT</h3>
            <div class="product-grid">
                <!-- Lặp qua các sản phẩm -->
                <?php
                if (!empty($sanPhamMoi)) {
                    foreach ($sanPhamMoi as $sp) {
                        echo '
                        <div class="recipe-card" data-aos="flip-left" data-aos-duration="1000">
                            <a href="#" class="product-link" data-mama="' . $sp['mama'] . '" data-tenma="' . $sp['tenma'] . '" data-hinhanh="' . $sp['hinhanh'] . '" data-giaban="' . $sp['giaban'] . '">
                                <img src="images/' . $sp['hinhanh'] . '" alt="' . $sp['tenma'] . '" class="recipe-image">
                                <div class="recipe-info">
                                    <h3>' . $sp['tenma'] . '</h3>
                                    <div class="recipe-meta">
                                        <b><span>' . number_format($sp['giaban'], 0, ',', '.') . ' VND</span></b>
                                    </div>
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

    <section class="products container" data-aos="fade-up" data-aos-duration="1200">
        <div class="new-products">
            <h3 class="title-newproducts">COMBO BÙNG NỔ</h3>
            <div class="product-grid">
                <?php
                if (!empty($sanPhamCombo)) {
                    foreach ($sanPhamCombo as $sp) {
                        echo '
                        <div class="recipe-card" data-aos="flip-left">
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

    <section class="hero container" data-aos="zoom-in" data-aos-duration="1500">
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

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-in-out', // Cài đặt hiệu ứng cuộn trang
        duration: 1000, // Thời gian hiệu ứng
        once: true, // Hiệu ứng chỉ xảy ra một lần
    });

    // Hiển thị thông báo nếu có
    <?php if (!empty($notification)): ?>
        document.getElementById('notification').style.display = 'block';
        setTimeout(() => {
            document.getElementById('notification').style.display = 'none';
        }, 3000);
    <?php endif; ?>
</script>

<script src="js/sanpham/sanpham.js"></script>