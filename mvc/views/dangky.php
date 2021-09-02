<?php 
    if(!isset($email)) $email='';
    if(!isset($id)) $id='';
    if(!isset($name)) $name='';
    if(isset($data['id'])) $id= $data['id'];
    if(isset($data['name'])) $name= $data['name'];
    if(isset($data['email'])) $email= $data['email'];
    if(isset($data['id_error'])) $id_error= $data['id_error'];
    if(isset($data['name_error'])) $name_error= $data['name_error'];
    if(isset($data['password_error'])) $password_error= $data['password_error'];
    if(isset($data['checkpassword_error'])) $checkpassword_error= $data['checkpassword_error'];
    if(isset($data['email_error'])) $email_error= $data['email_error'];
?>
<!DOCTYPE html>
<html lang="en">
</html>
<html>
    <?php include('./public/header.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng ký</title>
        <link rel="stylesheet" href="./public/css/dangky.css"/>
    </head>
    <?php if($_SESSION['sort']==0){ ?>
    <body>
        <div id="dk">
            <div id="form">
                <div id="header">
                    <h2>Đăng Ký</h2>
                </div>
                <form action="index.php?url=account/dangky" method="POST">
                    <div class="ip">
                        <?php if(isset($data['thanhcong'])) echo "<p>".$data['thanhcong']."</p>"; ?>
                        <?php if(isset($data['existID'])) echo "<p>".$data['existID']."</p>"; ?>
                        Tên đăng nhập: 
                        <?php if(isset($id_error)) echo "<p>". $id_error. "</p>";?>
                        <input type="text" name="id" value="<?php echo $id ?>" />
                    </div>
                    <div class="ip">
                        Họ và tên: 
                        <?php if(isset($name_error)) echo "<p>". $name_error. "</p>";?>
                        <input type="text" name="name" id="" value="<?php echo $name ?>">
                    </div>
                    <div class="ip">
                        Mật khẩu: 
                        <?php if(isset($password_error)) echo "<p>". $password_error. "</p>";?>
                        <input type="password" name="password" id="">
                    </div>
                    <div class="ip">
                        Xác nhận mật khẩu: 
                        <?php if(isset($checkpassword_error)) echo "<p>". $checkpassword_error. "</p>";?>
                        <input type="password" name="checkpassword" id="">
                    </div>
                    <div class="ip">
                        Email: 
                        <?php if(isset($email_error)) echo "<p>". $email_error. "</p>";?>
                        <input type="text" name="email" id="" value="<?php echo $email ?>">
                    </div>
                    <div class="ip">
                        <input type="submit" value="Register" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php } else echo "Không tìm thấy trang"; ?>
</html>