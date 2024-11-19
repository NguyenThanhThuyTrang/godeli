<?php  
include_once 'models/mgiohang.php';   

class CartController {  
    private $model;  

    public function __construct() {  
        $this->model = new CartModel();  
    }  

    public function HienThiSP($makh) {  
        return $this->model->laySPtrongGioHang($makh); //--trả về món theo mã kh
    }  
}  
?>
