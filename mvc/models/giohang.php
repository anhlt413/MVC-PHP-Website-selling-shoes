<?php 
    include_once("./mvc/core/db.php");
    class giohang extends db{
        private $id;
        private $madh;
        private $masp;
        private $size;
        private $sl;
        private $gia;
        private $trangthai;
        function set($id, $madh, $masp, $size, $sl, $gia){
            $this->id= $id;
            $this->madh= $madh;
            $this->masp= $masp;
            $this->size= $size;
            $this->sl= $sl;
            $this->gia= $gia;
        }
        // xem gio hang hien tai
        function recentcart($id){
            $conn= $this->connect();
            $this->id= $id;
            $id = $conn -> real_escape_string($this->id);
            $sql="SELECT * FROM giohang WHERE id = '$id' AND trangthai IS NULL ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // tinh tong so tien cua gio hang 
        function total($id){
            $conn= $this->connect();
            $this->id= $id;
            $id = $conn -> real_escape_string($this->id);
            $sql="SELECT madh, SUM(gia) AS total FROM giohang WHERE  id = '$id' AND trangthai IS NULL ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // tim kiem 1 ma gio hang moi
        function newmadh(){
            $conn= $this->connect();
            $sql="SELECT MAX(madh) as a FROM giohang  ";
            $result=$conn -> query($sql);
            $newmadhs=$result->fetch_all(MYSQLI_ASSOC);
            foreach($newmadhs as $newmadh){
                $new = $newmadh['a'] +1;
            }
            $conn->close();
            return $new;
        }
        // them san pham vao gio hang
        function add(){
            $conn= $this->connect();
            $id = $conn -> real_escape_string($this->id);
            $madh = $conn -> real_escape_string($this->madh);
            $masp = $conn -> real_escape_string($this->masp);
            $size = $conn -> real_escape_string($this->size);
            $sl = $conn -> real_escape_string($this->sl);
            $gia = $conn -> real_escape_string($this->gia);
            $sql=" INSERT INTO giohang(id,madh,masp,size,sl,gia,trangthai) VALUES('$id', '$madh', '$masp', '$size', '$sl', '$gia', NULL)"; 
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // thay doi sl va gia khi khach mua 1 san pham da co trong gio hang
        function update($sl, $gia){
            $conn= $this->connect();
            $this->sl= $sl;
            $this->gia= $gia;
            $id = $conn -> real_escape_string($this->id);
            $madh = $conn -> real_escape_string($this->madh);
            $masp = $conn -> real_escape_string($this->masp);
            $size = $conn -> real_escape_string($this->size);
            $sl = $conn -> real_escape_string($this->sl);
            $gia = $conn -> real_escape_string($this->gia);
            $sql = "UPDATE giohang SET sl='$sl'  WHERE id='$id' AND masp = '$masp' AND size = '$size' AND madh = '$madh' ";
            $conn -> query($sql);
            $sql = "UPDATE giohang SET gia = '$gia' WHERE id='$id' AND masp = '$masp' AND size = '$size' AND madh = '$madh' ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xoa sp trong gio hang
        function deletesp($id, $masp, $size){
            $conn= $this->connect();
            $this->id= $id;
            $this->masp= $masp;
            $this->size= $size;
            $id = $conn -> real_escape_string($this->id);
            $masp = $conn -> real_escape_string($this->masp);
            $size = $conn -> real_escape_string($this->size);
            $sql=" DELETE FROM giohang WHERE masp = '$masp' AND id = '$id' AND size='$size' AND trangthai IS NULL ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // Cap nhat gio hang da duoc dat
        function order($id,$madh){
            $conn= $this->connect();
            $this->madh= $madh;
            $madh = $conn -> real_escape_string($this->madh);
            $this->id= $id;
            $id = $conn -> real_escape_string($this->id);
            $sql = "UPDATE giohang SET trangthai='1' WHERE id='$id' AND madh= '$madh'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xoa don hang - nguoi su dung
        function deletedh1($id, $madh){
            $conn= $this->connect();
            $this->id= $id;
            $this->madh= $madh;
            $id = $conn -> real_escape_string($this->id);
            $madh = $conn -> real_escape_string($this->madh);
            $sql = "UPDATE giohang SET trangthai= 2 WHERE id='$id'AND madh = '$madh'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xoa don hang - quan ly
        function deletedh2($madh){
            $conn= $this->connect();
            $this->madh= $madh;
            $madh = $conn -> real_escape_string($this->madh);
            $sql = "UPDATE giohang SET trangthai= 2 WHERE madh = '$madh'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xac nhan duoc hang - quan ly
        function confirmdh($madh){
            $conn= $this->connect();
            $this->madh= $madh;
            $madh = $conn -> real_escape_string($this->madh);
            $sql = "UPDATE giohang SET trangthai= 3 WHERE madh = '$madh'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xem 1 don hang cu the - nguoi su dung
        function finddh1($id, $madh){
            $conn= $this->connect();
            $this->id= $id;
            $this->madh= $madh;
            $id = $conn -> real_escape_string($this->id);
            $madh = $conn -> real_escape_string($this->madh);
            $sql="SELECT t1.masp AS masp, t1.madh AS madh,  size, sl, t2.gia AS gia2, t1.gia AS gia1, giamgia, tensp, kieu, mau, trangthai FROM giohang t1, sanpham t2 WHERE t1.masp = t2.masp AND t1.madh='$madh' AND t1.id = '$id' AND trangthai IS NOT NULL ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // xem 1 don hang cu the - quan ly
        function finddh2($madh){
            $conn= $this->connect();
            $this->madh= $madh;
            $madh = $conn -> real_escape_string($this->madh);
            $sql="SELECT t1.masp AS masp, t1.madh AS madh,  size, sl, t2.gia AS gia2, t1.gia AS gia1, giamgia, tensp, kieu, mau, trangthai FROM giohang t1, sanpham t2 WHERE t1.masp = t2.masp AND t1.madh='$madh' AND trangthai IS NOT NULL ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // gio hang hien tai
        function show($id){
            $conn= $this->connect();
            $this->id= $id;
            $id = $conn -> real_escape_string($this->id);
            $sql="SELECT t1.masp, madh,  size, sl, t1.gia AS gia1, t2.gia AS gia2, giamgia, tensp, kieu, mau  FROM giohang t1, sanpham t2 WHERE t1.masp = t2.masp AND t1.id = '$id' AND trangthai IS NULL ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
    }
?>