<?php
    echo '<link rel="stylesheet" href="css/sanpham/style.css?v=1">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
    include 'controller/csanpham.php';

    $controllers = new CSanPham(); 
    $sanPhamChiTiet = null;

    if (isset($_GET['mama'])) {
        $mama = $_GET['mama'];
        $sanPhamChiTiet = $controllers->layChiTietSanPham($mama);
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
            <div class="content">
                <?php
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $ten = $_GET['search'];
                        $sanPhamList = $controllers->timKiemSanPham($ten);
                        if (!empty($sanPhamList)) {
                            foreach ($sanPhamList as $sp) {
                                echo '
                                <div class="recipe-card">
                                    <a href="index.php?page=sanpham&mama=' . $sp['mama'] . '">
                                        <img src="images/' . $sp['hinhanh'] . '" alt="' . $sp['mama'] . '" class="recipe-image">
                                        <div class="recipe-info">
                                            <h3>' . $sp['tenma'] . '</h3>
                                            <div class="recipe-meta">
                                                <b><span>' . number_format($sp['giaban'], 0, ',', '.') . ' VND</span></b>
                                                <span>💬 0</span> <!-- Bạn có thể thay số bình luận thực tế nếu có -->
                                            </div>
                                            <br>
                                            <button class="cart-button">
                                                <i class="fa fa-plus"></i> Thêm vào giỏ hàng
                                            </button>
                                        </div>
                                    </a>
                                </div>';
                            }
                        } else {
                            echo '<p>Không tìm thấy món ăn với tên này.</p>';
                        }
                    } else {
                        $category = isset($_GET['category']) ? $_GET['category'] : 'all';
                        $tatCaSanPham = $controllers->laySanPhamTheoLoai($category);
                        foreach ($tatCaSanPham as $sp) {      
                            echo '
                            <div class="recipe-card">
                                <a href="index.php?page=sanpham&mama=' . $sp['mama'] . '">
                                    <img src="images/' . $sp['hinhanh'] . '" alt="' . $sp['mama'] . '" class="recipe-image">
                                    <div class="recipe-info">
                                        <h3>' . $sp['tenma'] . '</h3>
                                        <div class="recipe-meta">
                                            <b><span>' . number_format($sp['giaban'], 0, ',', '.') . ' VND</span></b>
                                            <span>💬 0</span> <!-- Bạn có thể thay số bình luận thực tế nếu có -->
                                        </div>
                                        <br>
                                        <button class="cart-button">
                                            <i class="fa fa-plus"></i> Thêm vào giỏ hàng
                                        </button>
                                    </div>
                                </a>
                            </div>';
                         }
                    }
                ?>
            </div>
        </div>
    </form>

    <!-- Overlay -->
    <div class="product-overlay" id="productOverlay" onclick="closeProductDetails()"></div>
    <!-- Product Detail Form -->
    <div class="product-detail-form" id="productDetailForm" style="<?php echo $sanPhamChiTiet ? 'display: block;' : 'display: none;'; ?>">  
    <span class="close-button" onclick="closeProductDetails()">×</span>  
    <div class="detail-content">  
        <img src="images/<?php echo $sanPhamChiTiet['hinhanh']; ?>" alt="Product Image" class="detail-image">  
        <div class="detail-info">  
            <h2 class="product-name"><?php echo $sanPhamChiTiet['tenma']; ?></h2>  
            <p class="product-description"><?php echo $sanPhamChiTiet['congthuc']; ?></p>  
            <p class="product-price"><?php echo number_format($sanPhamChiTiet['giaban'], 0, ',', '.') . ' VND'; ?></p>  
            <div class="quantity-control">  
                <button class="quantity-btn">-</button>  
                <input type="number" value="1" min="1" class="quantity-input">  
                <button class="quantity-btn">+</button>  
            </div>  
            <button class="add-to-cart-button">Thêm vào giỏ hàng</button>  
        </div>  
    </div>  
</div>

</body>
<script>
function openProductDetails() {
    document.getElementById('productOverlay').style.display = 'block';
    document.getElementById('productDetailForm').style.display = 'block';
}

function closeProductDetails() {
    document.getElementById('productOverlay').style.display = 'none';
    document.getElementById('productDetailForm').style.display = 'none';
}
</script>
</html>
