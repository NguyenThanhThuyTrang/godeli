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
        .cart-container {
            max-width: 98%; /* Giới hạn chiều rộng */
            margin: auto; /* Căn giữa */
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 25px;
        }

        .cart-table th, .cart-table td {
            vertical-align: middle;
        }

        .cart-actions button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h2 class="text-center my-4">Giỏ hàng của bạn</h2>
        <table id="cart-table" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Tổng</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-th="Sản phẩm">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs">
                                <img src="http://placehold.it/100x100" alt="Product 1" class="img-responsive" />
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">Product 1</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Giá">$5.11</td>
                    <td data-th="Số lượng">
                        <input type="number" class="form-control text-center" value="1">
                    </td>
                    <td data-th="Tổng" class="text-center">$5.11</td>
                    <td class="cart-actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Tổng: $5.11</strong></td>
                </tr>
                <tr>
                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua sắm</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Tổng: $5.11</strong></td>
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