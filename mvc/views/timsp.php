<?php
    include("./cost.php");
    $sanphams= $data['sanphams'];
    $gender= $data["gender"];
    $trangthai= $data["trangthai"];
    $kieudang = $data["kieudang"];
    $dongsp = $data["dongsp"];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
<?php include("./public/header.php"); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sản phẩm</title>
        <link rel="stylesheet" href="./public/css/timsp.css"/>
    </head>
    <body>
        <div id='container' class="clearfix">
            <div id='left'>
            <div class="timkiem">
                <h2>GIỚI TÍNH</h2>
                <a href="index.php?url=product/timsp&gender=both&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($gender))&& $gender == 'both') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Tất cả</p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php if((isset($gender))&&$gender=='male') echo "both"; else echo "male";  ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($gender))&& $gender == 'male') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Nam</p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php if((isset($gender))&&$gender=='female') echo "both"; else echo "female";  ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($gender))&& $gender == 'female') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Nữ</p></div></a>
                <br>
            </div>
            <div class="timkiem">
                <h2>TRẠNG THÁI</h2>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php if((isset($trangthai))&&$trangthai=='giamgia') echo ""; else echo "giamgia";  ?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($trangthai))&& $trangthai == 'giamgia') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Giảm giá</p></div></a>
                <br>
            </div>
            <div class="timkiem">
                <h2>KIỂU DÁNG</h2>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php if((isset($kieudang))&&$kieudang=='lowtop') echo ""; else echo "lowtop";  ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($kieudang))&& $kieudang == 'lowtop') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Low Top </p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php if((isset($kieudang))&&$kieudang=='hightop') echo ""; else echo "hightop";  ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($kieudang))&& $kieudang == 'hightop') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; High Top</p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php if((isset($kieudang))&&$kieudang=='slipon') echo ""; else echo "slipon";  ?>&dongsp=<?php echo $dongsp ?>"><div id="<?php if((isset($kieudang))&& $kieudang == 'slipon') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Slip On</p></div></a>
                <br>
            </div>
            <div>
                <h2>DÒNG SẢN PHẨM</h2>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php if((isset($dongsp))&&$dongsp=='Basas') echo ""; else echo "Basas";  ?>"><div id="<?php if((isset($dongsp))&& $dongsp == 'Basas') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Basas</p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php if((isset($dongsp))&&$dongsp=='Vintas') echo ""; else echo "Vintas";  ?>"><div id="<?php if((isset($dongsp))&& $dongsp == 'Vintas') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Vintas</p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php if((isset($dongsp))&&$dongsp=='Urbas') echo ""; else echo "Urbas";  ?>"><div id="<?php if((isset($dongsp))&& $dongsp == 'Urbas') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Urbas</p></div></a>
                <a href="index.php?url=product/timsp&gender=<?php echo $gender ?>&trangthai=<?php echo $trangthai?>&kieudang=<?php echo $kieudang ?>&dongsp=<?php if((isset($dongsp))&&$dongsp=='Pattas') echo ""; else echo "Pattas";  ?>"><div id="<?php if((isset($dongsp))&& $dongsp == 'Pattas') echo "checked" ; else echo "show";  ?>"><p>&nbsp;&nbsp; Pattas</p></div></a>
                <br>
            </div>
            </div>
            <div id='right'>
                <div style="padding: 10px;"> <img src="./public/image/desktop_productlist.jpg" alt="" width="100%"></div>
                <div class="clearfix">
                    <?php foreach($sanphams as $sanpham){ ?>
                        <div class="sanpham">
                            <a href="index.php?url=product/details&masp=<?php echo $sanpham['masp'] ?>"><img src="<?php echo "./public/image/".$sanpham['masp'].".jpg";?>" alt="" width="100%"></a>
                            <a style="color: black" href="index.php?url=product/details&masp=<?php echo $sanpham['masp'] ?>"><h4><?php echo $sanpham['tensp']." - ".$sanpham['kieu']."<br>"; ?></h4></a>
                            <p><?php echo $sanpham['mau']."<br>"; ?></p>
                            <h4><?php echo cost($sanpham['gia'])." VND"; ?><span style="color: red; font-size: 12px;"><?php if($sanpham['giamgia']!= 0) echo " - ".$sanpham['giamgia']."%"; ?></span></h4>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>