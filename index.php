<?php include "php/checkLogin.php";?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>毕业设计选题系统</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/logo.ico">
</head>
<body>
    <header>
        <div class="head">
            <div class="logo"></div>
            <span>毕业设计选题系统</span>
            <a href="php/register.php">注册</a>
        </div>
    </header>
    <div class="main-container">
        <div class="main">
            <div class="form-container">
                <div class="form">
                    <h3>用户登录</h3>
                    <!-- 登录表单 -->
                    <form action="index.php" method="POST">
                        <div class="input-text">
                            <input type="text" name="username" id="username" placeholder="请输入您的学号">
                            <input type="password" name="password" id="password" placeholder="请输入您的密码">
                        </div>
                        <span style="color:<?php echo $color;?>">
                            <?php echo $err;?>
                        </span> 
                        <button type="submit" class="submit" name="login">登录</button>
                    </form>

                </div>
            </div>
        </div>
    </div>  
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>
</body>
</html>