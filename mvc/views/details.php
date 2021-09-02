<?php
    $sanphams= $data["sanphams"];
    $note= $data["note"];
    include_once("./cost.php");
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('./public/header.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php foreach($sanphams as $sanpham){ ?>
        <title><?php echo $sanpham['tensp']." - ".$sanpham['kieu'] ?></title>
        <?php } ?>
        <link rel="stylesheet" href="./public/css/details.css"/>
    </head>
    <body>
        <?php foreach($sanphams as $sanpham){ ?>
        <div id="head">
            <p><?php echo $sanpham['tensp']." - ".$sanpham['kieu'] ?><span style="color: red;"> <?php if(isset($note)) echo "&nbsp;".$note; ?></span></p>
        </div>
        <div id="body" class="clearfix">
            <div id="img">
                <img src="<?php echo "./public/image/".$sanpham['masp'].".jpg"; ?>" alt="" width="100%">
            </div>
            <div id="details">
                <div id="name">
                <h2><?php echo $sanpham['tensp']." - ".$sanpham['kieu']; ?></h2>
                <h3><?php echo $sanpham['mau']; ?></h3>
                <p>Mã sản phẩm: <span style="font-weight: bold;"><?php echo $sanpham['masp']; ?></span></p>
                <h3 style="color: #ff7c00;"><?php echo cost($sanpham['gia'])." VND"; ?><span style="color: red; font-size: 15px;"><?php if($sanpham['giamgia']!= 0) echo " - ".$sanpham['giamgia']."%"; ?></span></h3>
                </div>
                <div id="thongtin">
                    <p><?php echo $sanpham['thongtin']; ?></p>
                </div>
                <form action="index.php?url=product/details&masp=<?php echo $sanpham['masp'] ?>" method="POST">
                <div>
                    <div style="width: 50%; float:left;">
                        <h3>Size</h3>
                        <select name="size" id="">
                        <option value="0"></option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        </select>
                    </div>
                    <div style="width: 50%; float:right">
                         <h3>Số Lượng</h3>
                        <select name="sl" id="">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div>
                    <p>&nbsp;</p>
                    <input class="sm" type="submit" name="submit" value="Thêm Vào Giỏ Hàng">
                </div>
                </form>
                <a href="index.php?url=cart/giohang"><div id="thanhtoan"><p>Thanh Toán</p></div></a>
                <div class="dash"></div>
                <h3>Bảng chọn size</h3>
                <p>Khuyến nghị chọn truesize hoặc +1 size (tùy form chân) so với giày Ananas Vulcanized.</p>
                <img src="./public/image/size.jpg" alt="" width="100%">
            </div>
        </div>
        <?php } ?>
    </body>
</html>