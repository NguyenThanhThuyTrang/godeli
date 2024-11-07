<?php
include 'models/msanpham.php';

class CSanPham {
    private $sanPhamModel;

    public function __construct() {
        $this->sanPhamModel = new SanPham();
    }

    public function layTatCaSanPham() {
        return $this->sanPhamModel->layTatCaSanPham();
    }

    public function laySanPhamTheoLoai($loai) {
        return $this->sanPhamModel->laySanPhamTheoLoai($loai);
    }

    public function timKiemSanPham($ten) {
        return $this->sanPhamModel->timKiemSanPham($ten);
    }

    public function layChiTietSanPham($mama) {
        return $this->sanPhamModel->layChiTietSanPham($mama);
    }
}
?>
