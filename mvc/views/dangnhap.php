<?php
    if(!isset($id)) $id='';
    if(isset($data['id'])) $id= $data['id'];
    if(isset($data['existID'])) $existID= $data['existID'];
    if(isset($data['id_error'])) $id_error= $data['id_error'];
    if(isset($data['password_error'])) $password_error= $data['password_error'];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
    <?php include('./public/header.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="./public/css/dangnhap.css"/>
    </head>
    <?php if($_SESSION['sort']==0 || !isset($_SESSION['sort'])) { ?>
    <body>
        <div id="dk">
            <div id="form">
                <div id="header">
                    <h2>Đăng Nhập</h2>
                </div>
                <form action="index.php?url=account/dangnhap" method="POST">
                    <div class="ip">
                        <?php if(isset($existID)) echo "<p>". $existID. "</p>";?>
                        Tên đăng nhập: 
                        <?php if(isset($id_error)) echo "<p>". $id_error. "</p>";?>
                        <input type="text" name="id" value="<?php echo $id ?>">
                    </div>
                    <div class="ip">
                        Mật khẩu: 
                        <?php if(isset($password_error)) echo "<p>". $password_error. "</p>";?>
                        <input type="password" name="password" id="">
                    </div>
                    <div class="ip"><input type="submit" value="Đăng nhập" name="submit"></div>
                </form>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>