<?php  
include 'mketnoi.php';  

class CheckoutModel {  
    public $conn;  

    public function __construct() {  
        $db = new ketnoi();  
        $this->conn = $db->ketnoi();  
    }   

    public function laySPtrongGioHang($makh) {  
        $sql = "SELECT g.soluong, g.dongia, m.tenma, m.giaban, m.hinhanh, g.mama   
                FROM giohang g  
                JOIN monan m ON g.mama = m.mama 
                WHERE g.makh = ?";  
        
        $stmt = $this->conn->prepare($sql);  
        $stmt->bind_param("i", $makh);   
        $stmt->execute();  
    
        $result = $stmt->get_result();  
        $items = [];  
    
        while ($row = $result->fetch_assoc()) {  
            $mama = $row['mama'];
            if (!isset($items[$mama])) {  
                $items[$mama] = $row;  
                $items[$mama]['soluong'] = 0; // Khởi tạo số lượng
            }   
            $items[$mama]['soluong'] += $row['soluong'];  
        }  
    
        $stmt->close();  
        return array_values($items);  
    }

    public function layThongTinKhachHang($makh) {
        $sql = "SELECT tennd, sodienthoai, email, diachi FROM khachhang WHERE makh = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $makh);
        $stmt->execute();
        $result = $stmt->get_result();
        $thongTin = $result->fetch_assoc();
        $stmt->close();

        return $thongTin ? $thongTin : [];
    }
    
    public function layDanhSachCuaHang() {
        $sql = "SELECT mach, tench, diachi FROM cuahang";
        $result = $this->conn->query($sql);

        $cuaHangs = [];
        while ($row = $result->fetch_assoc()) {
            $cuaHangs[] = $row;
        }
        return $cuaHangs;
    }

    public function taoDonHang($makh, $mach, $tongtien, $ghichu, $giohang, $ten, $phone, $address, $email) {
        $this->conn->begin_transaction();
        try {
            // Lưu thông tin đơn hàng, bao gồm người nhận hàng
            $sqlDonHang = "INSERT INTO donhang (ngaydat, mattdh, makh, mach, tennguoinhan, sdtnguoinhan, diachinguoinhan, emailnguoinhan) 
                           VALUES (NOW(), 1, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sqlDonHang);
            $stmt->bind_param("iissss", $makh, $mach, $ten, $phone, $address, $email);
            $stmt->execute();
            $madh = $stmt->insert_id;
    
            // Thêm chi tiết đơn hàng
            $sqlChiTiet = "INSERT INTO chitietdonhang (madh, mama, soluong, dongia, giamgia, ghichu) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtChiTiet = $this->conn->prepare($sqlChiTiet);
    
            foreach ($giohang as $item) {
                $giamgia = 0;
                $stmtChiTiet->bind_param(
                    "iiidds",
                    $madh,
                    $item['mama'],
                    $item['soluong'],
                    $item['dongia'],
                    $giamgia,
                    $ghichu
                );
                $stmtChiTiet->execute();
            }
    
            $this->conn->commit();
            return $madh;
        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }
    
    public function xoaGioHang($makh) {
        $sql = "DELETE FROM giohang WHERE makh = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $makh);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }


        public function capNhatThongTinKhachHang($makh, $ten, $phone, $address, $email) {
        $sql = "UPDATE khachhang SET tennd = ?, sodienthoai = ?, diachi = ?, email = ? WHERE makh = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $ten, $phone, $address, $email, $makh);
        $stmt->execute();
        $stmt->close();
    }

    
}
?>
