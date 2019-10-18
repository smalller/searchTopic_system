<?php 
    include "sessionLogin.php";
    include "checkPerinfo.php";
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>毕业设计选题系统</title>
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/perInfo.css">
    <link rel="shortcut icon" href="../img/logo.ico">
</head>
<body>
    <header>
        <!-- 头部导航条 -->
        <div class="head-nav">
            <div class="logo"></div>
            <div class="nav">
                <ul>
                    <li><a href="main.php">学生选题</a></li>
                    <li id="bom"><a href="#">个人信息</a></li>
                    <li><a href="newTopic.php">新增题目</a></li>
                </ul>
            </div>
            <div class="user">
                <ul>
                    <li>
                        <a href="#">
                            <span>
                                用户：<?php echo $_SESSION["username"];?>
                            </span>
                            <span id="shu">|</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php"  class="logout">
                            注销用户
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    
    <!-- 主体部分 -->
    <div class="main-box">    
        <div class="main">
            <div class="info-box">
                <ul class="left">
                    <li>学号：</li>
                    <li>姓名：</li>
                    <li>班级：</li>
                    <li>专业：</li>
                    <li>系部：</li>
                    <li>电话：</li>
                    <li>题目：</li>
                    <li>导师姓名：</li>
                    <li>导师电话：</li>
                </ul>
                <ul class="right"> 
                    <?php foreach($all as $values) {?>
                        <?php echo "<li>{$values}</li>"?>
                    <?php }?>
                </ul>
            </div>                  
        </div>
    </div>
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>
</body>
</html>