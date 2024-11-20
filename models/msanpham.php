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
                JOIN loaimonan ON monan.maloaima = loaimonan.maloaima
                WHERE monan.soluong > 0";
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
                JOIN loaimonan ON monan.maloaima = loaimonan.maloaima
                WHERE monan.soluong > 0";
        
        if ($loai !== 'all') {
            $sql .= " AND loaimonan.tenloai = ?";
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
                WHERE monan.tenma LIKE ? AND monan.soluong > 0";
        
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
                WHERE monan.mama = ? AND monan.soluong > 0";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $mama);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function themVaoGioHang($mama, $soluong, $dongia, $makh) {
        $this->conn->begin_transaction(); // Bắt đầu giao dịch
        try {
            // Kiểm tra số lượng sản phẩm trong kho
            $sqlCheck = "SELECT soluong FROM monan WHERE mama = ?";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->bind_param("i", $mama);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();
            $row = $resultCheck->fetch_assoc();
    
            if ($row['soluong'] < $soluong) {
                throw new Exception('Số lượng sản phẩm không đủ');
            }
    
            // Thêm sản phẩm vào giỏ hàng
            $sql = "INSERT INTO giohang (mama, soluong, dongia, makh) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iiii", $mama, $soluong, $dongia, $makh);
            $stmt->execute();
    
            // Cập nhật số lượng sản phẩm trong bảng monan
            $sqlUpdate = "UPDATE monan SET soluong = soluong - ? WHERE mama = ?";
            $stmtUpdate = $this->conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("ii", $soluong, $mama);
            $stmtUpdate->execute();
    
            $this->conn->commit(); // Xác nhận giao dịch
            return true;
        } catch (Exception $e) {
            $this->conn->rollback(); // Hoàn tác giao dịch nếu có lỗi
            return $e->getMessage(); // Trả về thông báo lỗi
        }
    }

    public function laySanPhamMoiNhat($limit = 4) {
        $sql = "SELECT * FROM monan WHERE soluong > 50 ORDER BY mama DESC LIMIT ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            $sanPham = $result->fetch_all(MYSQLI_ASSOC);
            return $sanPham;
        } else {
            echo "Lỗi truy vấn: " . $this->conn->error;
            return [];
        }
    }

    public function laySanPhamCombo($limit = 4) {
        $sql = "SELECT * FROM monan WHERE maloaima = 5 ORDER BY mama DESC LIMIT ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            $sanPham = $result->fetch_all(MYSQLI_ASSOC);
            return $sanPham;
        } else {
            echo "Lỗi truy vấn: " . $this->conn->error;
            return [];
        }
    }
}
?>
