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

    public function laySanPhamTheoLoai($loai) {
        $sql = "SELECT monan.*, loaimonan.tenloai 
                FROM monan 
                JOIN loaimonan ON monan.maloaima = loaimonan.maloaima";
        
        if ($loai !== 'all') {
            $sql .= " WHERE loaimonan.tenloai = ?";
        }

        $stmt = $this->conn->prepare($sql);
        if ($loai !== 'all') {
            $stmt->bind_param("s", $loai);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $sanPhamList = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sanPhamList[] = $row;
            }
        }

        return $sanPhamList;
    }

    public function timKiemSanPham($ten) {
        $sql = "SELECT monan.*, loaimonan.tenloai 
                FROM monan 
                JOIN loaimonan ON monan.maloaima = loaimonan.maloaima 
                WHERE monan.tenma LIKE ?";
        
        $stmt = $this->conn->prepare($sql);
        $searchTerm = "%" . $ten . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $sanPhamList = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sanPhamList[] = $row;
            }
        }

        return $sanPhamList;
    }

    public function layChiTietSanPham($mama) {
        $sql = "SELECT monan.*, loaimonan.tenloai 
                FROM monan 
                JOIN loaimonan ON monan.maloaima = loaimonan.maloaima 
                WHERE monan.mama = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mama);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
