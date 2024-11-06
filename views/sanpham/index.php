<?php
    echo '<link rel="stylesheet" href="css/sanpham/style.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';
?>
<body>
    <form action="" method="post">
        <div class="container">
            <div class="sidebar">
                <h2>Category</h2>
                <ul id="category-list">
                    <li>
                        <button type="submit" name="category" value="all" class="category-button">All</button>
                    </li>
                    <li>
                        <button type="submit" name="category" value="food" class="category-button">Thức ăn</button>
                    </li>
                    <li>
                        <button type="submit" name="category" value="drink" class="category-button">Thức uống</button>
                    </li>
                </ul>
            </div>
            <div class="content">
                <?php
                
                    // Gọi Controller để lấy dữ liệu sản phẩm
                    include 'controller/csanpham.php'; // Đảm bảo đường dẫn đúng 

                    // Tạo đối tượng của lớp CSanPham
                    $controllers = new  CSanPham(); // Đảm bảo lớp CSanPham được tạo

                    $tatCaSanPham = $controllers->layTatCaSanPham();

                    // Bao gồm tệp listsanpham.php để hiển thị sản phẩm
                    include 'listsanpham.php';
                ?>
            </div>
        </div>
    </form>
</body>
</html>