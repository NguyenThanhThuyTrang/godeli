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
                        <button type="submit" name="category" value="all" class="category-button" >All</button>
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
                    // Determine selected category
                    $category = isset($_POST['category']) ? $_POST['category'] : 'all';

                    // Display food items if category is 'all' or 'food'
                    if ($category === 'all' || $category === 'food') {
                        echo '
                        <div class="recipe-card">
                            <img src="images/food-menu-1.png?height=200&width=300" alt="Pizza Chicken">
                            <div class="recipe-info">
                                <h3>Pizza Chicken</h3>
                                <div class="recipe-meta">
                                    <span>45.000VND</span>
                                    <span>👁 1288</span>
                                    <span>💬 4</span>
                                </div>
                                <button class="cart-button">
                                        <i class="fa fa-shopping-cart"></i> 
                                </button>
                            </div>
                        </div>';

                        echo '
                        <div class="recipe-card">
                            <img src="images/food-menu-2.png?height=200&width=300" alt="Banana Bread">
                            <div class="recipe-info">
                                <h3>Banana Bread</h3>
                                <div class="recipe-meta">
                                    <span>60.000VND</span>
                                    <span>👁 1280</span>
                                    <span>💬 2</span>
                                </div>
                                <button class="cart-button">
                                    <i class="fa fa-shopping-cart"></i> 
                                </button>
                            </div>
                        </div>';

                        echo '
                        <div class="recipe-card">
                            <img src="images/food-menu-3.png?height=200&width=300" alt="MeMes Pasta Fagioli">
                            <div class="recipe-info">
                                <h3>MeMes Pasta Fagioli</h3>
                                <div class="recipe-meta">
                                    <span>25.000VND</span>
                                    <span>👁 1117</span>
                                    <span>💬 1</span>
                                </div>
                               
                                <button class="cart-button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                             
                            </div>
                        </div>';
                    }

                    if ($category === 'all' || $category === 'drink') {
                        echo '
                        <div class="recipe-card">
                            <img src="IMAGE/NuocUong/CaRot.jpg?height=200&width=300" alt="Nước Cà Rốt">
                            <div class="recipe-info">
                                <h3>Nước Cà Rốt</h3>
                                <div class="recipe-meta">
                                    <span>54.000VND</span>
                                    <span>👁 956</span>
                                    <span>💬 3</span>
                                </div>
                             
                                <button class="cart-button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
        
                            </div>
                        </div>';

                        echo '
                        <div class="recipe-card">
                            <img src="IMAGE/NuocUong/NuocCam.jpg?height=200&width=300" alt="Nước Cam">
                            <div class="recipe-info">
                                <h3>Nước Cam</h3>
                                <div class="recipe-meta">
                                    <span>35.000VND</span>
                                    <span>👁 1432</span>
                                    <span>💬 6</span>
                                </div>
                                <button class="cart-button">
                                    <i class="fa fa-shopping-cart"></i> 
                                </button>
                               
                            </div>
                        </div>';

                        echo '
                        <div class="recipe-card">
                            <img src="IMAGE/NuocUong/OiEp.jpg?height=200&width=300" alt="Nước Ổi">
                            <div class="recipe-info">
                                <h3>Nước Ổi</h3>
                                <div class="recipe-meta">
                                    <span>54.000VND</span>
                                    <span>👁 1089</span>
                                    <span>💬 5</span>
                                </div>
                                    <button class="cart-button">
                                        <i class="fa fa-shopping-cart"></i> 
                                    </button>
                                </div>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </form>
    </body>
</html>