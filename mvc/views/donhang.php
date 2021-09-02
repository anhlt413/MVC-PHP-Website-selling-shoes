<?php
    $result= $data["result"];
    $sanphams= $data["sanphams"];
    $donhangs= $data["donhangs"];
    $madh= $data["madh"];
?>
<html>
    <?php include("./public/header.php") ?>
    <?php include("./cost.php"); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đơn Hàng</title>
        <link rel="stylesheet" href="./public/css/donhang.css"/>
    </head>
    <?php if(mysqli_num_rows($result)!=0 || $result == ''){ ?>
    <body>
        <div id="container" class="clearfix">
            <div id="con1">
                <div id="header">GIỎ HÀNG</div>
                <div id="products" class="clearfix">
                    <?php foreach($sanphams as $sanpham){ $trangthai= $sanpham['trangthai']; ?>
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
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div id="con2">
                <?php foreach($donhangs as $donhang){ ?>
                <div id="d1"><p>ĐƠN HÀNG <?php echo "#".$donhang['madh']; ?></p></div>
                <?php if($trangthai==2 ){ ?><div id="d2"><p style="color: red;">* Đơn hàng đã bị hủy</p></div><?php } ?>
                <div id="d2"><?php echo "Người nhận: ".$donhang['nguoinhan']; ?></div>
                <div id="d2"><?php echo "Số điện thoại: ".$donhang['sdt']; ?></div>
                <div id="d2"><?php echo "Địa chỉ: ".$donhang['diachi']; ?></div>
                <div id="d3">
                        <div style="width: 50%; float:left"><p>Total</p></div>
                        <div style="width: 50%; float:right; text-align:right"><p><?php if($donhang['gia'] >0 ) echo  cost($donhang['gia'])." VND"; else echo " 0 VND"; ?></p></div>
                </div>
                <?php if($trangthai==1 ){ ?>
                <form action="index.php?url=cart/donhang&madh=<?php echo $madh; ?>" method="POST">
                <input type="submit" value="HỦY ĐƠN HÀNG" name="submit" class="submit">
                </form>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>