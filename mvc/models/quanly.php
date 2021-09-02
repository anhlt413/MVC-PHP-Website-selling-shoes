<?php 
    include_once("./mvc/core/db.php");
    class quanly extends db{
        private $id;
        private $password;
        function set($id , $password){
            $this->id= $id;
            $this->password= $password;
        }
        // tim quan ly theo id
        function findbyid(){
            $conn=$this->connect();
            $id = $conn -> real_escape_string($this->id);
            $sql="SELECT * FROM quanly WHERE id = '$id'";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
        // dang nhap
        function checkid(){
            $conn=$this->connect();
            $id = $conn -> real_escape_string($this->id);
            $password = $conn -> real_escape_string($this->password);
            $sql="SELECT * FROM quanly WHERE id = '$id' AND password = '$password' ";
            $result=$conn -> query($sql);
            $conn->close();
            return $result;
        }
    }
?>