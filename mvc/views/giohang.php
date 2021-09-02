<?php 
    $sanphams= $data["sanphams"];
    $note = $data["note"];
    $erradd= $data["erradd"];
    $errname = $data["errname"];
    $errsdt = $data["errsdt"];
?>
<html>
    <?php include("./public/header.php") ?>
    <?php include_once("./cost.php"); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Giỏ Hàng</title>
        <link rel="stylesheet" href="./public/css/giohang.css"/>
    </head>
    <?php if($_SESSION['sort']!=2){ ?>
    <body>
        <div id="container" class="clearfix">
            <div id="con1">
                <div id="header">GIỎ HÀNG</div>
                <div id="products" class="clearfix">
                    <?php $sum=0; foreach($sanphams as $sanpham){ $sum = $sum + $sanpham['gia1'];?>
                    <div id="product">
                        <a href="index.php?url=product/details&masp=<?php echo $sanpham['masp'] ?>"><div id="img"><img src="<?php echo "./public/image/".$sanpham['masp'].".jpg"; ?>" alt="" width = "100%" ></div></a>
                        <div id="inf">
                            <div class="name"><a href="index.php?url=product/details&masp=<?php echo $sanpham['masp'] ?>"><?php echo $sanpham['tensp']." - ".$sanpham['kieu']."<br>".$sanpham['mau'] ; ?></a></div>
                            <div id="much"><p style="color: #808080;"><?php echo "Giá: ".cost($sanpham['gia2'])." VND"; ?><span style="color: red;font-size:10px;"><?php if($sanpham['giamgia']!=0) echo " -".$sanpham['giamgia']."%"; ?></span></p></div>
                            <div id="s" class="clearfix">
                                <div id="s1"><?php echo "Size: ".$sanpham['size']; ?></div>
                                <div id="s2"><?php echo "Quantity: ".$sanpham['sl']; ?></div>
                            </div>
                        </div>
                        <div id="cost">
                            <div id="c1"><?php echo cost($sanpham['gia1'])." VND"; ?></div>
                            <div id="c2"></div>
                            <a href="index.php?url=cart/xoaspcart&masp=<?php echo $sanpham['masp'] ?>&size=<?php echo $sanpham['size']; ?>"><div id="c3"><img src="./public/image/bin.jpg" alt="" height="100%"></div></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div id="con2">
                <div id="d1"><p>ĐƠN HÀNG</p></div>
                <form action="index.php?url=cart/giohang" method="POST">
                    <p style="color: red;margin: 0% 4%;"><?php if(isset($errname)) echo $errname; ?></p>
                    <p style="color: red;margin: 0% 4%;"><?php if(isset($note)) echo $note; ?></p>
                    <input type="text" name="nguoinhan" id="" placeholder="Họ tên" class="text">
                    <p style="color: red;margin: 0% 4%;"><?php if(isset($errsdt)) echo $errsdt; ?></p>
                    <input type="text" name="sdt" id="" placeholder="Số điện thoại" class="text">
                    <p style="color: red;margin: 0% 4%;"><?php if(isset($erradd)) echo $erradd; ?></p>
                    <input type="text" name="diachi" id="" placeholder="Địa chỉ nhận hàng" style="width: 70%;" class="text">
                    <div id="d2">
                        <div style="width: 50%; float:left"><p>TẠM TÍNH</p></div>
                        <div style="width: 50%; float:right; text-align:right"><p><?php if($sum >0 ) echo  cost($sum)." VND"; else echo " 0 VND"; ?></p></div>
                    </div>
                    <input type="submit" value="XÁC NHẬN ĐƠN HÀNG" name="submit" class="submit">
                </form>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>