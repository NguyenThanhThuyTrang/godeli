<?php  
include_once 'controller/cgiohang.php';   

if (!isset($_SESSION['makh'])) {
    echo '<script>
            alert("Đăng nhập để xem giỏ hàng!");
            window.location.href = "index.php?page=dangnhap";
          </script>';
    exit; 
}

$c = new CartController();  
$makh = $_SESSION['makh']; 
$items = $c->HienThiSP($makh);
?>  
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Giỏ hàng - GoDeli</title>  
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <link rel="stylesheet" href="layout/style_1.css">  

    <style>  
    body{
        padding-top: 90px;
    }
    .cart-container {  
        max-width: 98%;  
        margin: auto;  
        background: white;  
        border-radius: 8px;  
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        padding: 25px;  
    }  

    .cart-table th,  
    .cart-table td {  
        vertical-align: middle !important;  
    }  

    .align-middle {  
        vertical-align: middle !important;  
    }

    .cart-actions button {  
        margin-right: 5px;  
    }  
    

    .recipe-image {  
        float: left; /* Canh trái */
        max-width: 75px; /* Đặt chiều rộng tối đa */  
        max-height: 75px; /* Đặt chiều cao tối đa */  
        object-fit: cover;  /* Cắt hình ảnh để phù hợp */  
        border-radius: 8px; /* Bo góc cho hình ảnh */  
        margin: auto; /* Căn giữa */  
        display: block; /* Chuyển hình ảnh thành khối để sử dụng margin auto */  
    }  

    td[data-th="Hình ảnh"] {  
        text-align: center; /* Căn giữa nội dung */  
    }  
</style>  
</head>  
<body>  
    <div class="cart-container">  
        <h2 class="text-center my-4">Giỏ hàng của bạn</h2>  
        <table id="cart-table" class="table table-hover table-condensed">  
            <thead>  
                <tr>  
                    <th style="width:15%">Hình ảnh</th>
                    <th style="width:25%">Sản phẩm</th>  
                    <th style="width:10%">Giá</th>  
                    <th style="width:8%">Số lượng</th>  
                    <th style="width:22%" class="text-center">Tổng</th>  
                    <th style="width:10%"></th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php if (empty($items)): ?>  
                    <tr>  
                        <td colspan="5" class="text-center">Giỏ hàng trống!</td>  
                    </tr>  
                <?php else: ?>  
                    <?php foreach ($items as $item):   
                        $total = $item['soluong'] * $item['giaban'];  
                    ?>  
                    <tr>  
                        <td data-th="Hình ảnh" class="align-middle">  
                            <img src="images/<?php echo htmlspecialchars($item['hinhanh']); ?>" alt="<?php echo htmlspecialchars($item['tenma']); ?>" class="recipe-image">  
                        </td>
                        <td data-th="Sản phẩm" class="align-middle">  
                            <h5 class="nomargin"><?php echo htmlspecialchars($item['tenma']); ?></h5>  
                        </td>  
                        <td data-th="Giá" class="align-middle"><?php echo number_format($item['giaban'], 0, ',', '.'); ?>₫</td>  
                        <td data-th="Số lượng" class="align-middle" >  
                            <input type="number" class="form-control text-center" value="<?php echo (int)$item['soluong']; ?>" min="1">  
                        </td>  
                        <td data-th="Tổng" class="text-center align-middle"><?php echo number_format($total, 0, ',', '.'); ?>₫</td>  
                        <td class="cart-actions align-middle" data-th="">  
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>  
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>  
                        </td>  
                    </tr>  
                    <?php endforeach; ?>  
                <?php endif; ?>  
            </tbody>  
            <tfoot>  
                <tr>  
                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua sắm</a></td>  
                    <td colspan="2" class="hidden-xs"></td>  
                    <td class="hidden-xs text-center"><strong>Tổng: <?php echo number_format(array_sum(array_map(function ($item) {  
                        return $item['soluong'] * $item['giaban'];  
                    }, $items)), 0, ',', '.'); ?>₫</strong></td>  
                    <td><a href="index.php?page=thanhtoan" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a></td>  
                </tr>  
            </tfoot>  
        </table>  
    </div>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
</html>
