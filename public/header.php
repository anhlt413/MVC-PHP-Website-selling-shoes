<?php
if(!isset($_SESSION['sort'])) $_SESSION['sort']=0;
if(!isset($_SESSION['id'])) $_SESSION['id']='';
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./public/css/header.css"/>
    </head>
    <body>
        <ul id="menu" >
            <?php if($_SESSION['sort']==0){ ?>
                <li><a  href="index.php?url=account/dangky">Đăng ký</a></li>
                <li><a  href="index.php?url=account/dangnhap">Đăng nhập</a></li>
                <li><a  href="index.php?url=cart/giohang">Giỏ hàng</a></li>
            <?php } 
            else if($_SESSION['sort']==1){ ?>
                <li><a  href="index.php?url=account/dangxuat">Đăng xuất</a></li>
                <li><a  href="index.php?url=account/doimatkhau">Đổi mật khẩu</a></li>
                <li><a  href="index.php?url=cart/giohang">Giỏ hàng</a></li>
                <li><a  href="index.php?url=cart/theodoidonhang">Theo dõi đơn hàng</a></li>
            <?php } 
            else if($_SESSION['sort']==2){ ?>
                <li><a  href="index.php?url=account/dangxuat">Đăng xuất</a></li>
                <li><a  href="index.php?url=product/themsp">Thêm sản phẩm</a></li>
                <li><a  href="index.php?url=product/xoasp">Xóa sản phẩm</a></li>
                <li><a  href="index.php?url=product/giamgia">Giảm giá</a></li>
                <li><a  href="index.php?url=cart/theodoidonhang">Theo dõi đơn hàng</a></li>
            <?php } ?>
        </ul>
    <div class="top" id="chucnang" class="clearfix">
        <div class="box2" style="background-color: white; width: 25%;">
            <a href="./index.php"><img src="./public/image/logo1.jpg" alt="" height="100%"></a>
        </div>
        <div class="box3" style=" width: 50%;" class="clearfix">
            <div class="box4"><a class="test" href="index.php?url=product/timsp&gender=both">SẢN PHẨM</a></div>
            <div class="box4"><a class="test" href="index.php?url=product/timsp&gender=male">NAM</a></div>
            <div class="box4"><a class="test" href="index.php?url=product/timsp&gender=female">NỮ</a></div>
            <div class="box4"><a class="test" href="index.php?url=product/timsp&gender=both&trangthai=giamgia ">SALE OFF</a></div>
        </div>
        <div class="box3" style="background-color: white; width: 25%;">
            <br>
            <br>
            <form action="index.php?url=product/timsp" method="POST" >
                <input id="tk" type="text" name="dongsp" id="" size="30">
                <input id="tk"type="submit" value="Tìm kiếm">
            </form>
        </div>

    </div>
        <div class="top" style="background-color: whitesmoke; height: 50px; display: flex; align-items: center; justify-content: center;"><?php if($_SESSION['id']!='' && isset($_SESSION['id'])) echo "Hello! ".$_SESSION['id']; ?></p></div>
    </body>
</html>