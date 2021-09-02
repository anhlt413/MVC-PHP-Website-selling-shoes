<?php
    $donhangs = $data["donhangs"];
    include("./cost.php");
?>
<html>
    <?php include("./public/header.php"); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đơn hàng</title>
        <link rel="stylesheet" href="./public/css/theodoidonhang.css"/>
    </head>
    <?php if($_SESSION['sort']!=0){ ?>
    <body>
        <div id="container">
            <table class="a">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Hóa Đơn</th>
                    <th>Trạng Thái</th>
                </tr>
                <?php foreach($donhangs as $donhang){ ?>
                <tr>
                    <td><a href="index.php?url=cart/donhang&madh=<?php echo $donhang['madh']; ?>"><?php echo "#".$donhang['madh']; ?></a></td>
                    <td><?php echo cost($donhang['gia'])." VND"; ?></td>
                    <?php if($_SESSION['sort']==1) { ?>
                    <td><?php if($donhang['trangthai']== 1) echo "Đang chờ xác nhận"; else if($donhang['trangthai']== 2) echo "Đã hủy";else if($donhang['trangthai']== 3) echo "Đơn hàng được xác nhận" ?></td>
                    <?php } ?>
                    <?php if($_SESSION['sort']==2) { ?>
                    <td><?php if($donhang['trangthai']== 1){ ?><a href="index.php?url=cart/xacnhandh&madh=<?php echo $donhang['madh'];?>">Xác nhận đơn hàng</a> <?php } else if($donhang['trangthai']== 2) echo "Đã hủy";else if($donhang['trangthai']== 3) echo "Đơn hàng được xác nhận" ?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>