<?php
    class User {

        public $tennd;
        public $sodienthoai;
        public $email;
        public $diachi;
        public $matkhau;
        public $mavaitro;
        public $ngaysinh;
        public $gioitinh;

        // Constructor
        // public function __construct($tennd, $sodienthoai, $email, $diachi, $matkhau, $mavaitro, $ngaysinh, $gioitinh) {
        //     $this->tennd = $tennd;
        //     $this->sodienthoai = $sodienthoai;
        //     $this->email = $email;
        //     $this->diachi = $diachi;
        //     $this->setMatkhau($matkhau); // Using setter for password
        //     $this->mavaitro = $mavaitro;
        //     $this->ngaysinh = $ngaysinh;
        //     $this->gioitinh = $gioitinh;
        // }
        public function __construct($tennd, $email, $matkhau) {
            $this->tennd = $tennd;
            $this->email = $email;
            $this->setMatkhau($matkhau); // Using setter for password
        }

        // Setter for password with hashing
        public function setMatkhau($matkhau) {
            $this->matkhau = md5($matkhau);
        }

        // Getter for password verification
        public function verifyMatkhau($matkhau) {
            return md5($matkhau) === $this->matkhau;
        }

        // Getters for other properties
        public function getTennd() {
            return $this->tennd;
        }

        public function getSodienthoai() {
            return $this->sodienthoai;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getDiachi() {
            return $this->diachi;
        }

        public function getMavaitro() {
            return $this->mavaitro;
        }

        public function getNgaysinh() {
            return $this->ngaysinh;
        }

        public function getGioitinh() {
            return $this->gioitinh;
        }
    }
?>
