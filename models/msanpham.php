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
        $this->conn->begin_transaction();
        try {
            // Kiểm tra số lượng sản phẩm trong kho
            $sqlCheck = "SELECT soluong FROM monan WHERE mama = ?";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->bind_param("i", $mama);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();
            $row = $resultCheck->fetch_assoc();

            // Kiểm tra số lượng sản phẩm trong giỏ hàng của khách hàng
            $sqlCartCheck = "SELECT SUM(soluong) as total FROM giohang WHERE mama = ? AND makh = ?";
            $stmtCartCheck = $this->conn->prepare($sqlCartCheck);
            $stmtCartCheck->bind_param("ii", $mama, $makh);
            $stmtCartCheck->execute();
            $resultCartCheck = $stmtCartCheck->get_result();
            $rowCart = $resultCartCheck->fetch_assoc();
    
            // Tính số lượng sản phẩm còn lại trong kho
            $soLuongConLai = $row['soluong'] - $rowCart['total'];
    
            if ($soLuongConLai < $soluong) {
                throw new Exception('Sản phẩm đã vượt quá số lượng thêm vào giỏ hàng');
            }
    
            // Thêm sản phẩm vào giỏ hàng
            $sql = "INSERT INTO giohang (mama, soluong, dongia, makh) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("iiii", $mama, $soluong, $dongia, $makh);
            $stmt->execute();
    
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return $e->getMessage();
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
