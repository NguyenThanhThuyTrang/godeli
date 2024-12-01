<?php  
include_once 'models/mthanhtoan.php';   

class CheckoutController {  
    private $model;  

    public function __construct() {  
        $this->model = new CheckoutModel();  // Kết nối với CheckoutModel
    }  

    // Hiển thị sản phẩm trong giỏ hàng theo mã khách hàng
    public function HienThiSP($makh) {  
        return $this->model->laySPtrongGioHang($makh); 
    } 

    // Lấy thông tin khách hàng theo mã khách hàng
    public function layThongTinKhachHang($makh) {
        return $this->model->layThongTinKhachHang($makh);
    }
    
    // Lấy danh sách tất cả các cửa hàng
    public function layDanhSachCuaHang() {
        return $this->model->layDanhSachCuaHang();
    }

    // Tạo đơn hàng mới và lưu vào cơ sở dữ liệu
    public function taoDonHang($makh, $mach, $tongtien, $ghichu) {
        $giohang = $this->model->laySPtrongGioHang($makh);
    
        if (empty($giohang)) {
            return [
                'status' => false,
                'message' => 'Giỏ hàng trống, không thể đặt hàng!'
            ];
        }
    
        // Lấy thông tin từ form POST
        $ten = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
    
        // Tạo đơn hàng
        $madh = $this->model->taoDonHang(
            $makh, $mach, $tongtien, $ghichu, $giohang,
            $ten, $phone, $address, $email
        );
    
        if ($madh) {
            $this->model->xoaGioHang($makh);
    
            return [
                'status' => true,
                'message' => "Đặt hàng thành công! Mã đơn hàng: $madh",
                'madh' => $madh
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Có lỗi xảy ra khi đặt hàng, vui lòng thử lại!'
            ];
        }
    }
    

    // Cập nhật thông tin khách hàng
    public function capNhatThongTinKhachHang($makh, $ten, $phone, $address, $email) {
    return $this->model->capNhatThongTinKhachHang($makh, $ten, $phone, $address, $email);
}

    
}
?>
