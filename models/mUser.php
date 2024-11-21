<?php
include "mketnoi.php";
class mUser {
    private $conn;

    public function __construct() {
        $db = new ketnoi();
        $this->conn = $db->ketnoi();
    }

    // CREATE: Thêm người dùng mới
    public function createUser(User $user): bool {
        $query = "INSERT INTO khachhang (tennd, email, matkhau) 
                  VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $user->tennd, $user->email, $user->matkhau);

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // READ: Lấy thông tin người dùng theo tên đăng nhập
    public function getUser($tennd) {
        $query = "SELECT makh, tennd, sodienthoai, email, diachi, mavaitro, ngaysinh, gioitinh FROM khachhang WHERE tennd = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $tennd);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user;
        }
        
        $stmt->close();
        return null;
    }

    // UPDATE: Cập nhật thông tin người dùng
    public function updateUser($tennd, $sodienthoai, $email, $diachi, $mavaitro, $ngaysinh, $gioitinh): bool {
        $query = "UPDATE khachhang SET sodienthoai = ?, email = ?, diachi = ?, mavaitro = ?, ngaysinh = ?, gioitinh = ? WHERE tennd = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssss", $sodienthoai, $email, $diachi, $mavaitro, $ngaysinh, $gioitinh, $tennd);

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // DELETE: Xóa người dùng
    public function deleteUser($tennd): bool {
        $query = "DELETE FROM khachhang WHERE tennd = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $tennd);

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Kiểm tra mật khẩu
    public function verifyPassword($tennd, $matkhau) {
        $query = "SELECT * FROM khachhang WHERE email = ? AND matkhau = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $tennd, $matkhau);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            return $user; // Trả về thông tin người dùng nếu đăng nhập thành công
        }
    
        $stmt->close();
        return null; // Trả về null nếu không tìm thấy
    }
    
}


?>