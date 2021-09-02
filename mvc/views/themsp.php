<?php
    if(!isset($masp)) $masp='';
    if(!isset($tensp)) $tensp='';
    if(!isset($thongtin)) $thongtin='';
    if(!isset($gia)) $gia='';
    if(!isset($gioitinh)) $gioitinh='';
    if(!isset($kieu)) $kieu='';
    if(!isset($mau)) $mau='';
    if(isset($data["tensp"])) $tensp = $data["tensp"];
    if(isset($data["masp"])) $masp = $data["masp"];
    if(isset($data["thongtin"])) $thongtin = $data["thongtin"];
    if(isset($data["gia"])) $gia = $data["gia"];
    if(isset($data["gioitinh"])) $gioitinh = $data["gioitinh"];
    if(isset($data["kieu"])) $kieu = $data["kieu"];
    if(isset($data["mau"])) $mau = $data["mau"];
    if(isset($data["masp_error"])) $masp_error = $data["masp_error"];
    if(isset($data["tensp_error"])) $tensp_error = $data["tensp_error"];
    if(isset($data["thongtin_error"])) $thongtin_error = $data["thongtin_error"];
    if(isset($data["gia_error"])) $gia_error = $data["gia_error"];
    if(isset($data["gioitinh_error"])) $gioitinh_error = $data["gioitinh_error"];
    if(isset($data["kieu_error"])) $kieu_error = $data["kieu_error"];
    if(isset($data["mau_error"])) $mau_error = $data["mau_error"];
    if(isset($data["existID"])) $existID = $data["existID"];
    if(isset($data["thanhcong"])) $thanhcong = $data["thanhcong"];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
<?php include("./public/header.php"); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thêm sản phẩm</title>
        <link rel="stylesheet" href="./public/css/themsp.css"/>
    </head>
    <?php if($_SESSION['sort']==2){ ?>
    <body>
    <div id="themsp">
            <div id="form">
                <div id="header">
                    <h2>Thêm sản phẩm</h2>
                    <p style="color: red;"> * Ảnh trong thư mục Image phải cùng tên với mã sản phẩm </p>
                </div>
                <form action="index.php?url=product/themsp" method="POST">
                    <div class="ip">
                        <?php if(isset($existID)) echo "<p>".$existID."</p>"; ?>
                        <?php if(isset($thanhcong)) echo "<p>".$thanhcong."</p>"; ?>
                        Mã sản phẩm: 
                        <?php if(isset($masp_error)) echo "<p>". $masp_error. "</p>";?>
                        <input type="text" name="masp" value="<?php echo $masp ?>">
                    </div>
                    <div class="ip">
                        Tên sản phẩm: 
                        <?php if(isset($tensp_error)) echo "<p>". $tensp_error. "</p>";?>
                        <input type="text" name="tensp" value="<?php echo $tensp ?>">
                    </div>
                    <div class="ip">
                        Kiểu: 
                        <?php if(isset($kieu_error)) echo "<p>". $kieu_error. "</p>";?>
                        <input type="text" name="kieu" value="<?php echo $kieu; ?>">
                    </div>
                    <div class="ip">
                        Màu: 
                        <?php if(isset($mau_error)) echo "<p>". $mau_error. "</p>";?>
                        <input type="text" name="mau" value="<?php echo $mau ?>">
                    </div>
                    <div class="ip">
                        Thông tin: 
                        <?php if(isset($thongtin_error)) echo "<p>". $thongtin_error. "</p>";?>
                        <textarea name="thongtin" rows="5" cols="40"><?php echo $thongtin;?></textarea>
                    </div>
                    <div class="ip">
                        Giá VND: 
                        <?php if(isset($gia_error)) echo "<p>". $gia_error. "</p>";?>
                        <input type="text" name="gia" value="<?php echo $gia ?>">
                    </div>
                    <div class="radio">
                        Giới tính: 
                        <?php if(isset($gioitinh_error)) echo "<p>". $gioitinh_error. "</p>";?>
                        <input type="radio" name="gioitinh" <?php if (isset($gioitinh) && $gioitinh=="male") echo "checked";?> value="male" >Nam
                        <input type="radio" name="gioitinh" <?php if (isset($gioitinh) && $gioitinh=="female") echo "checked";?> value="female" >Nữ
                    </div>
                    <div class="ip">
                    <input type="submit" value="Thêm" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>