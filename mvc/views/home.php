<?php
    include_once("./cost.php");
    $sanphams=$data['shoes'];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang chủ</title>
        <link rel="stylesheet" href="./public/css/footer.css"/>
    </head>
    <?php include_once("./public/header.php") ?>
    <body>
        <div class="top"><img src="./public/image/anh dai dien.jpg" alt="anh dai dien" width=100%></div>
        <div id="quangcao" class="bot">
            <div id="first">
                <a href="timsp.php?gender=both&trangthai=&kieudang=&dongsp=Basas"><img src="./public/image/qc1.jpg" alt="" width="550px" height="300px"></a>
                <a href="timsp.php?gender=both&trangthai=&kieudang=&dongsp=Basas"><h1>BÌNH MỚI RƯỢU "MỚI"</h1></a>
                <p>Vẫn thừa kế tối giản, nguyên bản đã được định hướng bởi cái tên, Basas mới trở lại với những cải tiến đáng giá.</p>
            </div>
            <div id="second">
                <a href="timsp.php?gender=both&trangthai=giamgia "><img src="./public/image/quang cao 2.jpg" alt="" width="550px" height="300px"></a>
                <a href="timsp.php?gender=both&trangthai=giamgia "><h1>OUTLET SALE</h1></a>
                <P>Danh mục những sản phẩm bán tại Outlet Store, đã được phát hành trước một thời gian và đang rơi vào tính trạng bể size, hết mã.</P>
            </div>
        </div> 
        <div class="bot" id="danhmuc">
            <h1>BEST SELLER</h1>
        </div>
        <div class="bot" class="clearfix">
            <?php foreach($sanphams as $sanpham){ ?>
            <div class="box1">
                <a href="details.php?masp=<?php echo $sanpham['masp'] ?>"><img src="<?php echo "./public/image/".$sanpham['masp'].".jpg";?>" alt="" width="100%"></a>
                <a style="color: black" href="details.php?masp=<?php echo $sanpham['masp'] ?>"><h4><?php echo $sanpham['tensp']." - ".$sanpham['kieu']."<br>"; ?></h4></a>
                <p><?php echo $sanpham['mau']."<br>"; ?></p>
                <h4><?php echo cost($sanpham['gia'])." VND"; ?><span style="color: red; font-size: 12px;"><?php if($sanpham['giamgia']!= 0) echo " - ".$sanpham['giamgia']."%"; ?></span></h4>
            </div>
            <?php } ?>
        </div>
        <div class="bot" >
            <p>&nbsp;</p>
        </div>
        <div class="top"><img src="./public/image/anh ket thuc.jpg" alt="" width="100%"></div>
    </body>
</html>