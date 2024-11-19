<?php  
include 'mketnoi.php';  

class CartModel {  
    private $conn;  

    public function __construct() {  
        $db = new ketnoi();  
        $this->conn = $db->ketnoi();  
    }   

    public function laySPtrongGioHang($makh) {  
        $sql = "SELECT g.soluong, g.dongia, m.tenma, m.giaban   
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
                    'tenma' => $row['tenma'], 
                    'giaban' => $row['giaban'], 
                    'soluong' => 0, 
                    'dongia' => $row['dongia'], 
                ];  
            }   
            $items[$mama]['soluong'] += $row['soluong'];  
        }  

        $stmt->close();  
        return array_values($items);  
    }  
}  
?>