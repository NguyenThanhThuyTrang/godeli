<?php
include 'mketnoi.php';


class SanPham {
    private $conn;

    public function __construct() {
        $db = new ketnoi();
        $this->conn = $db->ketnoi();
    }

    public function layTatCaSanPham() {
        $sql = "SELECT monan.*, loaimonan.tenloai 
                FROM monan 
                JOIN loaimonan ON monan.maloaima = loaimonan.maloaima";

        $result = $this->conn->query($sql);
        $sanPhamList = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sanPhamList[] = $row;
            }
        }

        return $sanPhamList;
    }

// lấy sản phẩm theo loại
    public function laySanPhamTheoLoai($loai) {


    }

}
