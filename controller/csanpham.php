<?php
include_once 'models/msanpham.php';

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

    public function themVaoGioHang($mama, $soluong, $dongia, $makh) {
        return $this->sanPhamModel->themVaoGioHang($mama, $soluong, $dongia, $makh);
    }

    public function laySanPhamMoiNhat($limit = 4) {
        return $this->sanPhamModel->laySanPhamMoiNhat($limit);  
    }

    public function laySanPhamCombo($limit = 4) {
        return $this->sanPhamModel->laySanPhamCombo($limit); 
    }

}
?>
