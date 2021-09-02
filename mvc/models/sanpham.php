<?php
    include_once("./mvc/core/db.php");
    class sanpham  extends db{
        private $masp;
        private $tensp;
        private $kieu;
        private $mau;
        private $thongtin;
        private $gia;
        private $gioitinh;
        private $giamgia;
        function set($masp, $tensp, $kieu, $mau, $thongtin, $gia, $gioitinh){
            $this->masp= $masp;
            $this->tensp= $tensp;
            $this->kieu = $kieu;
            $this->mau= $mau;
            $this->thongtin= $thongtin;
            $this->gia = $gia;
            $this->gioitinh= $gioitinh;
            $this->giamgia= 0;
        }
        function setmasp($masp){
            $this->masp= $masp;
        }
        // xem masp co chua
        function checkmasp(){
            $conn= $this->connect();
            $masp = $conn -> real_escape_string($this->masp);
            $sql="SELECT * FROM sanpham WHERE masp = '$masp'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // them sp vao data base
        function addsp(){
            $conn= $this->connect();
            $masp = $conn -> real_escape_string($this->masp);
            $tensp = $conn -> real_escape_string($this->tensp);
            $kieu = $conn -> real_escape_string($this->kieu);
            $mau = $conn -> real_escape_string($this->mau);
            $thongtin = $conn -> real_escape_string($this->thongtin);
            $gia = $conn -> real_escape_string($this->gia);
            $gioitinh = $conn -> real_escape_string($this->gioitinh);
            $giamgia = $conn -> real_escape_string($this->giamgia);
            $sql=" INSERT INTO sanpham(masp,tensp,kieu,mau,thongtin,gia,gioitinh,giamgia) VALUES('$masp', '$tensp', '$kieu', '$mau', '$thongtin', '$gia','$gioitinh','$giamgia')";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xoa sp
        function deletesp(){
            $conn= $this->connect();
            $masp = $conn -> real_escape_string($this->masp);
            $sql=" DELETE FROM sanpham WHERE masp = '$masp' ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // them giam gia cho san pham
        function addgiamgia($giamgia){
            $conn= $this->connect();
            $masp = $conn -> real_escape_string($this->masp);
            $giamgia = $conn -> real_escape_string($giamgia);
            $sql=" UPDATE sanpham SET giamgia='$giamgia' WHERE masp = '$masp' ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // filter 
        function filter($gender, $trangthai, $kieudang, $dongsp){
            $conn = $this->connect();
            $gender = $conn -> real_escape_string($gender);
            $trangthai = $conn -> real_escape_string($trangthai);
            $kieudang = $conn -> real_escape_string($kieudang);
            $dongsp = $conn -> real_escape_string($dongsp);
            if($trangthai!=''){
                $sql1="AND giamgia > 0 ";
            }
            else $sql1="";
            if($kieudang=='lowtop') $sql2="AND kieu='Low Top' ";
            else if($kieudang=='hightop') $sql2="AND kieu='High Top' ";
            else if($kieudang=='slipon') $sql2="AND kieu='Slip On' ";
            else $sql2 = "";
            if($dongsp!=''){
                $sql3="AND tensp LIKE '%$dongsp%' ";
            }
            else $sql3="";
            if($gender=="both") $sql="SELECT masp, tensp, kieu, mau, gia, giamgia FROM sanpham WHERE gioitinh IN ('male','female')".$sql1.$sql2.$sql3;
            else $sql="SELECT masp, tensp, kieu, mau, gia, giamgia FROM sanpham WHERE gioitinh='$gender'".$sql1.$sql2.$sql3 ;
            $result=$conn -> query($sql);
            $sanphams=$result->fetch_all(MYSQLI_ASSOC);
            $conn->close();
            return $sanphams;
        }
        // tim 4 san pham bat ky de show ra home
        function limit4(){
            $conn = $this->connect();
            $sql="SELECT * FROM sanpham LIMIT 4 ";
            $result=$conn -> query($sql);
            $sanphams=$result->fetch_all(MYSQLI_ASSOC);
            $conn->close();
            return $sanphams;
        }
    }
?>