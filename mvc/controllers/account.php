<?php
    include("./mvc/core/controller.php");
    include("./secure.php");
    class account extends controller{
        // chuc nang dang ky
        function dangky(){
            if(isset($_POST['submit'])){
                // kiem tra dau vao
                $id=test_input($_POST['id']);
                $name=test_input($_POST['name']);
                $password=test_input($_POST['password']);
                $checkpassword= test_input($_POST['checkpassword']);
                $email=test_input($_POST['email']);
                if(empty($id)){
                $id_error="* ID is required";
                }
                else if(strlen($id)<6){
                    $id_error="* The id needs to have the minimum length of 6";
                } 
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$id)) {
                    $id_error = "Only letters and numbers allowed";
                }
                if(empty($name)){
                    $name_error="* Name is required";
                }
                else if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $name_error = "Only letters and white spaces allowed";
                }
                if(empty($password)){
                    $password_error="* Password is required";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
                    $password_error = "Only letters and numbers allowed";
                }
                else if(strlen($password)<6){
                    $password_error="* The password needs to have a minimum length of 6";
                }
                if(empty($email)){
                    $email_error="* Email is required";
                }
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "Invalid email format";
                }
                if($checkpassword != $password){
                    $checkpassword_error = " * The text should be the same as password ";
                }
                if(isset($id_error)|| isset($name_error) || isset($password_error) || isset($checkpassword_error) || isset($email_error) ){
                    if(!isset($id_error)) $id_error='';
                    if(!isset($name_error)) $name_error='';
                    if(!isset($password_error)) $password_error='';
                    if(!isset($checkpassword_error)) $checkpassword_error='';
                    if(!isset($email_error)) $email_error='';
                    $this->view("dangky", ["id_error"=>$id_error, "name_error"=>$name_error,"password_error"=>$password_error,"checkpassword_error"=>$checkpassword_error,"email_error"=>$email_error,"id"=> $id, "name"=>$name, "email"=>$email]);
                }
                else {
                    // du lieu vao khong co loi
                    $khachhang= $this->model("khachhang");
                    $quanly = $this->model("quanly");
                    $khachhang->setsignup($id, $name, $password, $email);
                    $quanly->set($id, $password);
                    if(mysqli_num_rows($khachhang->findbyid())!=0 || (mysqli_num_rows($quanly->findbyid())!=0 )){
                        $existID= " * The ID is exist";
                        $this->view("dangky", ["existID"=>$existID, "id"=> $id, "name"=>$name, "email"=>$email]);
                    }
                    else{
                        $khachhang->signup();
                        $thanhcong="Registed successfully";
                        $id='';
                        $name='';
                        $email='';
                        $this->view("dangky", ["thanhcong"=>$thanhcong, "id"=> $id, "name"=>$name, "email"=>$email]);
                    }
                }
            }
            else $this->view("dangky", []);
        }
        // dang nhap
        function dangnhap(){
            if(isset($_POST['submit'])){
                // kiem tra dau vao
                $id=test_input($_POST['id']);
                $password=test_input($_POST['password']);
                if(empty($id)){
                    $id_error="* ID is required";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$id)) {
                    $id_error = " * Wrong ID";
                }
                else if(strlen($id)<6){
                    $id_error="* Wrong ID";
                } 
        
                if(empty($password)){
                    $password_error="* Password is required";
                }
                else if (!preg_match("/^[a-zA-Z0-9]*$/",$password)) {
                    $password_error = "* Wrong password";
                }
                else if(strlen($password)<6){
                    $password_error="* Wrong password";
                }
                if(isset($id_error) || isset($password_error)){
                    if(!isset($id_error)) $id_error='';
                    if(!isset($password_error)) $password_error='';
                    $this->view("dangnhap", ["id_error"=> $id_error, "password_error"=> $password_error, "id"=>$id]);
                }
                else {
                    // sql
                    $khachhang = $this->model("khachhang");
                    $khachhang->setlogin($id, $password);
                    $quanly = $this->model("quanly");
                    $quanly->set($id, $password);
                    if(mysqli_num_rows($khachhang->checkid())==0 && mysqli_num_rows($quanly->checkid())==0){
                        $existID= " * The ID or Password is wrong";
                        $this->view("dangnhap", ["id"=> $id, "existID"=> $existID]);
                    }
                    else if(mysqli_num_rows($khachhang->checkid())==1){
                        $_SESSION['sort']=1; // khach hang
                        $_SESSION['id']=$id;
                        header('Location: index.php'); 
                    }
                    else if(mysqli_num_rows($quanly->checkid())==1){
                        $_SESSION['sort']=2; // quan ly
                        $_SESSION['id']=$id;
                        header('Location: index.php');  
                    }
                }
            }
            else $this->view("dangnhap", []);
        }
        // dang xuat
        function dangxuat(){
            session_unset();
            session_destroy();
            header('Location: index.php');
        }
        // doi mat khau
        function doimatkhau(){
            if(isset($_POST['submit'])){
                $id=$_SESSION['id'];
                $password=test_input($_POST['password']);
                $newpassword=test_input($_POST['newpassword']);
                $checknewpassword=test_input($_POST['checknewpassword']);
                if(empty($password)){
                    $pass_error="* is required";
                }
                if(empty($newpassword)){
                    $newpassword_error="* New password is required";
                }
        
                if($checknewpassword != $newpassword){
                    $checknewpassword_error = " * The text should be the same as the new password ";
                }
                if(isset($pass_error) ||isset($newpassword_error) || isset($checknewpassword_error) ){
                    if(!isset($pass_error)) $pass_error='';
                    if(!isset($newpassword_error)) $newpassword_error='';
                    if(!isset($checknewpassword_error)) $checknewpassword_error='';
                    $this->view("doimatkhau", ["password"=> $password, "pass_error"=>$pass_error, "newpassword_error"=>$newpassword_error, "checknewpassword_error"=>$checknewpassword_error]);
                }
                else {
                    $khachhang= $this->model("khachhang");
                    $khachhang->setlogin($id, $password);
                    if(mysqli_num_rows($khachhang->checkid())==0){
                        $pass_error= " * The password is wrong";
                        $this->view("doimatkhau", ["password"=> $password,"pass_error"=>$pass_error ]);
                    }
                    else{
                        $khachhang->changepassword($newpassword);
                        $thanhcong="Changing password successfully";
                        $password='';
                        $newpassword='';
                        $checknewpassword= '';
                        $this->view("doimatkhau", ["password"=> $password,"thanhcong"=>$thanhcong ]);
                    }
                }
            }
            else $this->view("doimatkhau", []);
        }
    }
?>