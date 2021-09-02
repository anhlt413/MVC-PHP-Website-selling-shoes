<?php
    include_once("./mvc/core/db.php");
    class donhang extends db{
        private $madh;
        private $nguoinhan;
        private $sdt;
        private $diachi; 
        private $gia;
        function set($madh, $nguoinhan, $sdt, $diachi, $gia){
            $this->madh= $madh;
            $this->nguoinhan= $nguoinhan;
            $this->sdt= $sdt;
            $this->diachi= $diachi;
            $this->gia= $gia;
        }
        function setmadh($madh){
            $this->madh= $madh;
        }
        // tim kiem don hang theo ma don hang
        function finddh(){
            $conn= $this->connect();
            $madh = $conn -> real_escape_string($this->madh);
            $sql="SELECT * FROM donhang WHERE madh='$madh' ";
            $result= $conn->query($sql);
            $conn->close();
            return $result;
        }
        // them 1 don hang moi
        function adddh(){
            $conn= $this->connect();
            $madh = $conn -> real_escape_string($this->madh);
            $nguoinhan = $conn -> real_escape_string($this->nguoinhan);
            $sdt = $conn -> real_escape_string($this->sdt);
            $diachi = $conn -> real_escape_string($this->diachi);
            $gia = $conn -> real_escape_string($this->gia);
            $sql=" INSERT INTO donhang(madh,nguoinhan,sdt,diachi, gia) VALUES('$madh', '$nguoinhan', '$sdt', '$diachi', '$gia')";
            $result= $conn->query($sql);
            $conn->close();
            return $result;
        }
        // xem tat ca cac don hang - nguoi su dung
        function show1($id){
            $conn= $this->connect();
            $id = $conn -> real_escape_string($id);
            $sql="SELECT DISTINCT t2.madh AS madh , t2.gia AS gia, trangthai FROM giohang t1, donhang t2 WHERE  t1.madh=t2.madh AND id = '$id' AND trangthai IS NOT NULL ORDER BY t2.madh DESC ";
            $result= $conn->query($sql);
            $conn->close();
            return $result;
        }
        // xem tat ca cac don hang - quan ly
        function show2(){
            $conn= $this->connect();
            $sql="SELECT DISTINCT t2.madh AS madh , t2.gia AS gia, trangthai FROM giohang t1, donhang t2 WHERE  t1.madh=t2.madh AND trangthai IS NOT NULL ORDER BY t2.madh DESC ";
            $result= $conn->query($sql);
            $conn->close();
            return $result;
        }
    }
?>