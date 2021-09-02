<?php
    if(!isset($masp)) $masp='';
    if(isset($data["masp_error"])) $masp_error= $data['masp_error'];
    if(isset($data["giamgia_error"])) $giamgia_error= $data['giamgia_error'];
    if(isset($data["masp"])) $masp= $data['masp'];
    if(isset($data["giamgia"])) $giamgia= $data['giamgia'];
    if(isset($data["existID"])) $existID= $data['existID'];
    if(isset($data["thanhcong"])) $thanhcong= $data['thanhcong'];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
<?php include("./public/header.php"); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Giảm giá </title>
        <link rel="stylesheet" href="./public/css/giamgia.css"/>
    </head>
    <?php if($_SESSION['sort']==2){ ?>
    <body>
    <div id="themsp">
            <div id="form">
                <div id="header">
                    <h2>Giảm giá sản phẩm</h2>
                </div>
                <form action="index.php?url=product/giamgia" method="POST">
                    <div class="ip">
                        <?php if(isset($existID)) echo "<p>".$existID."</p>"; ?>
                        <?php if(isset($thanhcong)) echo "<p>".$thanhcong."</p>"; ?>
                        Mã sản phẩm: 
                        <?php if(isset($masp_error)) echo "<p>". $masp_error. "</p>";?>
                        <input type="text" name="masp" value="<?php echo $masp ?>">
                    </div>
                    <div class="ip">
                        Phần trăm giảm giá:
                        <?php if(isset($giamgia_error)) echo "<p>". $giamgia_error. "</p>";?>
                        <input type="text" name="giamgia" id="">
                    </div>
                    <div class="ip">
                    <input type="submit" value="OK Baby ?" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>