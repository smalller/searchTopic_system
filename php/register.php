<?php include "checkRegister.php"?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="shortcut icon" href="../img/logo.ico">
</head>
<body>
    <header>
        <div class="head">
            
            <div class="logo"></div>
            <span>毕业设计选题系统</span>
            <a href="../index.php">登录</a>
        </div>
    </header>
    <div class="main-container">
        <div class="main">
            <div class="form-container">
                <div class="form">
                    <h3>用户注册</h3>
                    <!-- 注册表单 -->
                    <form action="" method="POST">
                        <div class="input-text">
                            <input type="text" name="username" placeholder="请输入您的学号" value="<?php echo isset($_POST["username"]) ? $username : ''; ?>">
                            <input type="text" name="phoneno" placeholder="请输入您的手机号" value="<?php echo isset($_POST["phoneno"]) ? $phoneno : ''; ?>">
                            <input type="password" name="password" placeholder="请输入您的密码" value="<?php echo isset($_POST["password"]) ? $password : ''; ?>">                         
                            <input type="password" name="password2" placeholder="请确认密码" value="<?php echo isset($_POST["password2"]) ? $password2 : ''; ?>">
                        </div>
                        <span style="color:<?php echo $color;?>">
                            <?php echo $err;?>
                        </span> 
                        <button type="submit" class="submit" name="register">注 册</button>
                    </form>

                </div>
            </div>
        </div>
    </div>  
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>
</body>
</html>