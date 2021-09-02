<?php
    if(!isset($password)) $password='';
    if(isset($data['password'])) $password= $data['password'];
    if(isset($data['pass_error'])) $pass_error= $data['pass_error'];
    if(isset($data['newpassword_error'])) $newpassword_error= $data['newpassword_error'];
    if(isset($data['checknewpassword_error'])) $checknewpassword_error= $data['checknewpassword_error'];
    if(isset($data['thanhcong'])) $thanhcong= $data['thanhcong'];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đổi mật khẩu</title>
        <link rel="stylesheet" href="./public/css/doimatkhau.css"/>
    </head>
    <?php include('./public/header.php'); ?>
    <?php if($_SESSION['sort']==1) { ?>
    <body>
        <div id="dk">
            <div id="form">
                <div id="header">
                    <h2>Đổi mật khẩu</h2>
                </div>
                <form action="index.php?url=account/doimatkhau" method="POST">
                    <div class="ip">
                        <?php if(isset($thanhcong)) echo "<p>".$thanhcong."</p>"; ?>
                        Mật khẩu: 
                        <?php if(isset($pass_error)) echo "<p>". $pass_error. "</p>";?>
                        <input type="text" name="password" value="<?php echo $password ?>">
                    </div>
                    <div class="ip">
                        Mật khẩu mới: 
                        <?php if(isset($newpassword_error)) echo "<p>". $newpassword_error. "</p>";?>
                        <input type="password" name="newpassword" id="">
                    </div>
                    <div class="ip">
                        Xác nhận mật khẩu mới: 
                        <?php if(isset($checknewpassword_error)) echo "<p>". $checknewpassword_error. "</p>";?>
                        <input type="password" name="checknewpassword" id="">
                    </div>
                    <div class="ip"><input type="submit" value="Xác Nhận" name="submit"></div>
                </form>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>