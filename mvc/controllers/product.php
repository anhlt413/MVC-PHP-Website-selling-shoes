<?php 
    include("./mvc/core/controller.php");
    include("./secure.php");
    class product extends controller{
        // them san pham vao data base
        function themsp(){
            if(isset($_POST['submit'])){
                $masp=test_input($_POST['masp']);
                $tensp=test_input($_POST['tensp']);
                $thongtin=test_input($_POST['thongtin']);
                $gia=test_input($_POST['gia']);
                if(isset($_POST['gioitinh'])) $gioitinh =test_input($_POST['gioitinh']);
                $giamgia=0;
                $kieu=test_input($_POST['kieu']);
                $mau=test_input($_POST['mau']);
                if(empty($masp)){
                    $masp_error="* ID is required";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$masp)) {
                    $masp_error = "* Only letters and numbers allowed";
                }
        
                if(empty($tensp)){
                    $tensp_error="* Name for the shoes is required";
                }
                if(empty($thongtin)){
                    $thongtin_error="* The description is required";
                }
                if(empty($gia)){
                    $gia_error="* Just type a price";
                }
                if(empty($gioitinh)){
                    $gioitinh_error="* Chose one of those genders";
                }
                if(empty($kieu)){
                    $kieu_error="* required";
                }
                if(empty($mau)){
                    $mau_error="* required";
                }
                if(isset($masp_error)|| isset($tensp_error) || isset($thongtin_error) || isset($gia_error) || isset($gioitinh_error) || isset($kieu_error) || isset($mau_error)){
                    if(!isset($masp_error)) $masp_error='';
                    if(!isset($tensp_error)) $tensp_error='';
                    if(!isset($thongtin_error)) $thongtin_error='';
                    if(!isset($gia_error)) $gia_error='';
                    if(!isset($gioitinh_error)) $gioitinh_error='';
                    if(!isset($kieu_error)) $kieu_error='';
                    if(!isset($mau_error)) $mau_error='';
                    $this->view("themsp", ["masp_error"=> $masp_error,"tensp_error"=> $tensp_error,"thongtin_error"=> $thongtin_error,"gia_error"=> $gia_error,"gioitinh_error"=> $gioitinh_error,"kieu_error"=> $kieu_error,"mau_error"=> $mau_error,"masp"=> $masp,"tensp"=> $tensp,"thongtin"=> $thongtin, "gia"=>$gia, "gioitinh"=>$gioitinh, "kieu"=>$kieu, "mau"=>$mau]);
                }
                else {
                    $sanpham= $this->model("sanpham");
                    $sanpham->set($masp, $tensp, $kieu, $mau, $thongtin, $gia, $gioitinh);
                    if(mysqli_num_rows($sanpham->checkmasp())==1){
                        $existID= " * The ID is exist";
                        $this->view("themsp", ["existID"=> $existID, "masp"=> $masp,"tensp"=> $tensp,"thongtin"=> $thongtin, "gia"=>$gia, "gioitinh"=>$gioitinh, "kieu"=>$kieu, "mau"=>$mau]);
                    }
                    else{
                        $sanpham->addsp();
                        $thanhcong="Inserting successfully";
                        $masp='';
                        $tensp='';
                        $thongtin='';
                        $gia='';
                        $gioitinh='';
                        $kieu='';
                        $mau='';
                        $this->view("themsp", ["thanhcong"=>$thanhcong,"masp"=> $masp,"tensp"=> $tensp,"thongtin"=> $thongtin, "gia"=>$gia, "gioitinh"=>$gioitinh, "kieu"=>$kieu, "mau"=>$mau ]);
                    }
                }
            }
            else $this->view("themsp", []);
        }
        // them giam gia
        function giamgia(){
            if(isset($_POST['submit'])){
                $masp=$_POST['masp'];
                $giamgia=$_POST['giamgia'];
                if(empty($masp)){
                    $masp_error="* ID is required";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$masp)) {
                    $masp_error = "* The ID is wrong";
                }
                if(empty($giamgia)){
                    $giamgia_error="* is required";
                }
                else if($giamgia<=0 || $giamgia >= 100){
                    $giamgia_error="* must between 0 and 100";
                }
                if(isset($masp_error) || isset($giamgia_error)){
                    if(!isset($masp_error)) $masp_error='';
                    if(!isset($giamgia_error)) $giamgia_error='';
                    $this->view("giamgia", ["masp_error"=>$masp_error, "giamgia_error"=>$giamgia_error, "masp"=>$masp, "giamgia"=>$giamgia]);
                }
                else {
                    $sanpham = $this->model("sanpham");
                    $sanpham->setmasp($masp);
                    if(mysqli_num_rows($sanpham->checkmasp())==0){
                        $existID= " * The ID is not exist";
                        $this->view("giamgia", ["existID"=> $existID, "masp"=>$masp, "giamgia"=>$giamgia]);
                    }
                    else{
                        $sanpham->addgiamgia($giamgia);
                        $thanhcong="Successfully inserting data";
                        $masp='';
                        $this->view("giamgia", ["thanhcong"=> $thanhcong, "masp"=>$masp]);
                    }
                }
            }
            else $this->view("giamgia", []);
        }
        //xoa sp
        function xoasp(){
            if(isset($_POST['submit'])){
                $masp=test_input($_POST['masp']);
                if(empty($masp)){
                    $masp_error="* ID is required";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$masp)) {
                    $masp_error = "* The ID is wrong";
                }
                if(isset($masp_error)){
                    if(!isset($masp_error)) $masp_error='';
                    $this->view("xoasp", ["masp_error"=> $masp_error]);
                }
                else {
                    $sanpham = $this->model("sanpham");
                    $sanpham->setmasp($masp);
                    if(mysqli_num_rows($sanpham->checkmasp())==0){
                        $existID= " * The ID is not exist";
                        $this->view("xoasp", ["existID"=> $existID]);
                    }
                    else{
                        $sanpham->deletesp();
                        $thanhcong="Deleted successfully";
                        $masp='';
                        $this->view("xoasp", ["thanhcong"=> $thanhcong]);
                    }
                }
            }
            else $this->view("xoasp", []);
        }
        // tim sp
        function timsp(){
            if(isset($_GET['gender']) || isset($_POST['dongsp'])){
                if(isset($_GET['gender'])){
                    $gender=test_input($_GET['gender']);
                }
                else $gender="both";
                if(isset($_GET['trangthai'])) $trangthai= test_input($_GET['trangthai']);
                if(isset($_GET['kieudang'])) $kieudang= test_input($_GET['kieudang']);
                if(isset($_GET['dongsp'])) $dongsp=test_input($_GET['dongsp']);
                else if(isset($_POST['dongsp'])) $dongsp=test_input($_POST['dongsp']);
                if(!isset($trangthai)) $trangthai='';
                if(!isset($kieudang)) $kieudang='';
                if(!isset($dongsp)) $dongsp='';
                $n = $this->model("sanpham");
                $sanphams=$n->filter($gender, $trangthai, $kieudang, $dongsp);
                $this->view("timsp", ["sanphams"=>$sanphams, "gender" => $gender, "trangthai"=>$trangthai, "kieudang"=>$kieudang, "dongsp"=> $dongsp]);
            }
        }
        // details
        function details(){
            if(isset($_GET['masp'])){
                $masp = test_input($_GET['masp']);
                $new =  $this->model("sanpham");
                $new->setmasp($masp);
                $result=$new->checkmasp();
                $sanphams=$result->fetch_all(MYSQLI_ASSOC);
            }
            if(isset($_POST['submit'])){
                if($_SESSION['sort']!=1){
                    $note="* Bạn cần phải đăng nhập trước khi mua hàng";
                }
                else if ($_SESSION['sort']==1){
                    if($_POST['size'] == "0" || $_POST['sl']=="0"){
                        $note = "* Thêm vào giỏ hàng thất bại. Xin hãy chọn size và số lượng cần mua";
                    }
                    else{
                        $size = test_input($_POST['size']);
                        $sl=test_input($_POST['sl']);
                        $id = $_SESSION['id'];
                        $giohang = $this->model("giohang");
                        $result=$giohang->recentcart($id);
                        if(mysqli_num_rows($result)==0){
                            $new= $giohang->newmadh() ;
                            foreach($sanphams as $sanpham){
                                $gia= $sanpham['gia']*(100-$sanpham['giamgia'])/100* $sl;
                            }
                            $giohang->set($id, $new, $masp, $size, $sl, $gia);
                            $giohang->add();
                            $note = "Thêm vào giỏ hàng thành công";
                        }
                        else {
                            $newmadhs=$result->fetch_all(MYSQLI_ASSOC);
                            foreach($newmadhs as $newmadh){
                                $new = $newmadh['madh'] ;
                                if($newmadh['masp']== $masp && $newmadh['size']==$size){
                                    $sl1 = $sl + $newmadh['sl'];
                                    $sl=$sl1;
                                }
                            }
                            foreach($sanphams as $sanpham){
                                $gia= $sanpham['gia']*(100-$sanpham['giamgia'])*$sl/100;
                            }
                            $giohang->set($id, $new, $masp, $size, $sl, $gia);
                            if(isset($sl1)){
                                $giohang->update($sl1, $gia);
                                $note = "Thêm vào giỏ hàng thành công";
                            }
                            else {
                                $giohang->add();
                                $note = "Thêm vào giỏ hàng thành công";
                            }
                        }
                    }
                }
            }
            if(!isset($note)) $note = "";
            $this->view("details", ["sanphams"=> $sanphams, "note"=>$note]);
        }
    }
?>