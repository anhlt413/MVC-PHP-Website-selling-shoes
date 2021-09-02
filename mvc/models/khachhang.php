<?php 
    include_once("./mvc/core/db.php");
    class khachhang extends db{
        private $id;
        private $name;
        private $password;
        private $email;
        function setsignup($id, $name, $password, $email){
            $this->id= $id;
            $this->name= $name;
            $this->password= $password;
            $this->email= $email;
        }
        function setlogin($id , $password){
            $this->id= $id;
            $this->password= $password;
        }
        // tim kiem nguoi dung theo id
        function findbyid(){
            $conn=$this->connect();
            $id = $conn -> real_escape_string($this->id);
            $sql="SELECT * FROM khachhang WHERE id = '$id'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // dang ky
        function signup(){
            $conn=$this->connect();
            $id = $conn -> real_escape_string($this->id);
            $name = $conn -> real_escape_string($this->name);
            $password = $conn -> real_escape_string($this->password);
            $email = $conn -> real_escape_string($this->email);
            $sql=" INSERT INTO khachhang(id,name,password,email) VALUES('$id', '$name', '$password', '$email')";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // dang nhap
        function checkid(){
            $conn=$this->connect();
            $id = $conn -> real_escape_string($this->id);
            $password = $conn -> real_escape_string($this->password);
            $sql="SELECT * FROM khachhang WHERE id = '$id' AND password = '$password' ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // thay doi mat khau
        function changepassword($newpassword){
            $conn= $this->connect();
            $id = $conn -> real_escape_string($this->id);
            $newpassword = $conn -> real_escape_string($newpassword);
            $this->password= $newpassword;
            $sql = "UPDATE khachhang SET password='$newpassword' WHERE id='$id'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
    }
?>