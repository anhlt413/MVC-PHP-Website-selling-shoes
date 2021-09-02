<?php
    include("./mvc/core/controller.php");
    include("./secure.php");
    class cart extends controller{
        // gio hang
        function giohang(){
            if(isset($_POST['submit'])){
                $nguoinhan=test_input($_POST['nguoinhan']);
                $sdt=test_input($_POST['sdt']);
                $diachi=test_input($_POST['diachi']);
                if(empty($nguoinhan)){
                    $errname="* Xin nhập tên người nhận";
                }
                else if (!preg_match("/^[a-zA-Z-' ]*$/",$nguoinhan)) {
                    $errname = "* Nhập tên đúng người nhận";
                }
                if(empty($sdt)){
                    $errsdt="* Xin nhập số điện thoại";
                }
                else if (!preg_match("/^[0-9]*$/",$sdt)) {
                    $errsdt = "* Xin nhập đúng số điện thoại";
                }
                if(empty($diachi)){
                    $erradd="* Điền địa chỉ thích hợp";
                }
                if(!isset($erradd) && !isset($errname) && !isset($errsdt)){
                    $id= $_SESSION['id'];
                    $gh = $this->model("giohang");
                    $result= $gh->total($id);
                    $products=$result->fetch_all(MYSQLI_ASSOC);
                    foreach($products as $product){
                        $madh=$product['madh'];
                        $gia=$product['total'];
                    }
                    $dh = $this->model("donhang");
                    $dh->set($madh, $nguoinhan, $sdt, $diachi, $gia);
                    if($madh!='' && $gia != ''){
                        if($dh->adddh()){
                            if($gh->order($id, $madh)){
                                $note = "Đặt hàng thành công";
                            }
                            else {
                                $note = "Đặt hàng thất bại";
                            }
                        }
                        else{
                            $note = "Đặt hàng thất bại";
                        }
                    }
                    else  $note = "Đặt hàng thất bại";
                }
            }
            $id= $_SESSION['id'];
            $gh1 = $this->model("giohang");
            $result=$gh1->show($id);
            $sanphams=$result->fetch_all(MYSQLI_ASSOC);
            if(!isset($erradd)) $erradd='';
            if(!isset($errname)) $errname='';
            if(!isset($errsdt)) $errsdt='';
            if(!isset($note)) $note='';
            $this->view("giohang", ["sanphams"=> $sanphams, "note"=> $note, "erradd"=> $erradd, "errname"=>$errname, "errsdt"=> $errsdt ]);
        }
        // theo doi don hang
        function theodoidonhang(){
            $dh = $this->model("donhang") ;
            $id= $_SESSION['id'];
            if($_SESSION['sort']==1){
                $result= $dh->show1($id);
            }
            else if($_SESSION['sort']==2){
                $result= $dh->show2();
            }
            $donhangs=$result->fetch_all(MYSQLI_ASSOC);
            $this->view("theodoidonhang", ["donhangs"=>$donhangs]);
        }
        // don hang
        function donhang(){
            $id= $_SESSION['id'];
            $madh= test_input($_GET['madh']);
            $giohang = $this->model("giohang");
            if(isset($_POST['submit'])){
                if($_SESSION['sort']==1){
                    $giohang->deletedh1($id, $madh);
                }
                else if($_SESSION['sort']==2){
                    $giohang->deletedh2($madh);
                }
            }
            if($_SESSION['sort']==1){
                $result=$giohang->finddh1($id, $madh);
            }
            if($_SESSION['sort']==2){
                $result=$giohang->finddh2($madh);
            }
            $dh = $this->model("donhang");
            $dh->setmadh($madh);
            $result1=$dh->finddh();
            $sanphams=$result->fetch_all(MYSQLI_ASSOC);
            $donhangs=$result1->fetch_all(MYSQLI_ASSOC);
            if(!isset($result)) $result='';
            $this->view("donhang",["result"=> $result, "sanphams"=>$sanphams,"donhangs"=> $donhangs, "madh"=> $madh]);
        }
        function xacnhandh(){
            $madh= test_input($_GET['madh']);
            $giohang = $this->model("giohang");
            $giohang->confirmdh($madh);
            header('Location: index.php?url=cart/theodoidonhang');
        }
        function xoaspcart(){
            $masp= test_input($_GET['masp']);
            $size=test_input($_GET['size']);
            $id = $_SESSION['id'];
            $giohang = $this->model("giohang");
            $giohang->deletesp($id,$masp, $size);
            header('Location: index.php?url=cart/giohang');
        }
    }
?>