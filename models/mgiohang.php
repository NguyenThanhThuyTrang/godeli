<?php  
include 'mketnoi.php';  

class CartModel {  
    private $conn;  

    public function __construct() {  
        $db = new ketnoi();  
        $this->conn = $db->ketnoi();  
    }   

    public function laySPtrongGioHang($makh) {  
        $sql = "SELECT g.soluong, g.dongia, m.tenma, m.giaban, m.hinhanh,g.mama   
                FROM giohang g  
                JOIN monan m ON g.mama = m.mama 
                WHERE g.makh = ?";  
        
        $stmt = $this->conn->prepare($sql);  
        $stmt->bind_param("i", $makh);   
        $stmt->execute();  
        $result = $stmt->get_result();  
        $items = [];  

        // Nhóm các sản phẩm theo mama  
        while ($row = $result->fetch_assoc()) {  
            $mama = $row['tenma'];
            if (!isset($items[$mama])) {  
                $items[$mama] = [  
                    'mama' => $row['mama'],
                    'tenma' => $row['tenma'], 
                    'giaban' => $row['giaban'], 
                    'soluong' => 0, 
                    'dongia' => $row['dongia'],
                    'hinhanh' => $row['hinhanh'], 
                ];  
            }   
            $items[$mama]['soluong'] += $row['soluong'];  
        }  

        $stmt->close();  
        return array_values($items);  
    }  



    public function xoaSanPhamKhoiGio($mama, $makh) {
        $sql = "DELETE FROM giohang WHERE mama = ? AND makh = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $mama, $makh);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    
    public function capNhatSoLuong($mama, $soluong, $makh) {
        $this->conn->begin_transaction();
        try {
            // Lấy số lượng sản phẩm còn lại trong kho
            $sqlCheck = "SELECT soluong FROM monan WHERE mama = ?";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->bind_param("i", $mama);
            $stmtCheck->execute();
            $resultCheck = $stmtCheck->get_result();
            $row = $resultCheck->fetch_assoc();
            $stmtCheck->close();
    
            if (!$row) {
                throw new Exception("Sản phẩm không tồn tại.");
            }
    
            $soLuongTrongKho = (int)$row['soluong'];
    
            // Tính tổng số lượng sản phẩm trong giỏ hàng sau khi cập nhật
            $sqlCart = "SELECT soluong FROM giohang WHERE mama = ? AND makh = ?";
            $stmtCart = $this->conn->prepare($sqlCart);
            $stmtCart->bind_param("ii", $mama, $makh);
            $stmtCart->execute();
            $resultCart = $stmtCart->get_result();
            $rowCart = $resultCart->fetch_assoc();
            $stmtCart->close();
    
            $soLuongHienTaiTrongGio = $rowCart ? (int)$rowCart['soluong'] : 0;
            $tongSoLuongCapNhat = $soLuongHienTaiTrongGio + $soluong;
    
            if ($tongSoLuongCapNhat > $soLuongTrongKho) {
                throw new Exception("Số lượng yêu cầu vượt quá số lượng tồn kho.");
            }
    
            // Cập nhật số lượng trong giỏ hàng
            $sqlUpdate = "UPDATE giohang SET soluong = ? WHERE mama = ? AND makh = ?";
            $stmtUpdate = $this->conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("iii", $soluong, $mama, $makh);
            $stmtUpdate->execute();
            $stmtUpdate->close();
    
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return $e->getMessage(); // Trả về thông báo lỗi
        }
    }
    
    
    public function soluongGioHang($mama, $soluong, $dongia, $makh) {
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
    
        } catch (Exception $e) {
            $this->conn->rollback();
            return $e->getMessage();
        }
    }
    
}  
?>