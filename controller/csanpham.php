<?php
// include 'models/mketnoi.php';
include 'models/msanpham.php';

class CSanPham {
    private $sanPhamModel;

    public function __construct() {
        $this->sanPhamModel = new SanPham();
    }

    public function layTatCaSanPham() {
        return $this->sanPhamModel->layTatCaSanPham();
    }
}
?>