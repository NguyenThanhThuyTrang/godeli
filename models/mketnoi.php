<?php
class ketnoi {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "cuahangthucan_db";
    private $conn;

    public function ketnoi() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            echo "Kết nối không thành công: " . $this->conn->connect_error;
            exit();
        } else {
            return $this->conn;
        }
    }
}
?>
