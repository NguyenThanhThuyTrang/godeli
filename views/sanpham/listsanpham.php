<div class="content">
    <?php
        // Xác định danh mục được chọn
        $category = isset($_POST['category']) ? $_POST['category'] : 'all';

        // Lặp qua danh sách sản phẩm và hiển thị
        foreach ($tatCaSanPham as $sp) {    
            // Kiểm tra danh mục sản phẩm
            // if ($category === 'all' || 
            //     ($category === 'food' && $sp['tenloai'] === 'Thức ăn') || 
            //     ($category === 'rink' && $sp['tenloai'] === 'Thức uống')) {
                
                echo '
                <div class="recipe-card">
                    <img src="images/' . $sp['hinhanh'] . '" alt="' . $sp['mama'] . '" style="height:200px; width:300px;">
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
                </div>';
            }
    ?>
</div>


