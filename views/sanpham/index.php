<?php
    echo '<link rel="stylesheet" href="css/sanpham/style.css?v=3">';
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
                            <a href="#" class="product-link" data-mama="' . $sp['mama'] . '" data-tenma="' . $sp['tenma'] . '" data-hinhanh="' . $sp['hinhanh'] . '" data-giaban="' . $sp['giaban'] . '" data-congthuc="' . $sp['congthuc'] . '">
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

    <!-- Overlay -->
    <div class="product-overlay" id="productOverlay" onclick="closeProductDetails()"></div>
    <!-- Product Detail Form -->
    <div class="product-detail-form" id="productDetailForm" style="display: none;">  
        <span class="close-button" onclick="closeProductDetails()">×</span>  
        <div class="detail-content">  
            <img id="detailImage" src="" alt="Product Image" class="detail-image">  
            <div class="detail-info">  
                <h2 id="detailName" class="product-name"></h2>  
                <p id="detailDescription" class="product-description"></p>  
                <p id="detailPrice" class="product-price"></p>  
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
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.product-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const mama = this.getAttribute('data-mama');
            const tenma = this.getAttribute('data-tenma');
            const hinhanh = this.getAttribute('data-hinhanh');
            const giaban = this.getAttribute('data-giaban');
            const congthuc = this.getAttribute('data-congthuc');

            document.getElementById('detailImage').src = `images/${hinhanh}`;
            document.getElementById('detailName').textContent = tenma;
            document.getElementById('detailDescription').textContent = congthuc;
            document.getElementById('detailPrice').textContent = `${parseInt(giaban).toLocaleString()} VND`;
            openProductDetails();
        });
    });
});

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
