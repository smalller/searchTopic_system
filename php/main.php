<?php 
    include "sessionLogin.php";
    include "checkTopic.php";
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>毕业设计选题系统</title>
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/logo.ico">
</head>
<body>
    <header>
        <!-- 头部导航条 -->
        <div class="head-nav">
            <div class="logo"></div>
            <div class="nav">
                <ul>
                    <li id="bom"><a href="#">学生选题</a></li>
                    <li><a href="perInfo.php">个人信息</a></li>
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
            <div class="alert">
                <span id="open">查看题目</span>
            </div>
            <!-- 题目显示弹窗 -->
            <div class="alert-box" id="close-box">
                <span id="close">×</span>
                <table>
                    <?php foreach($all as $values) {?>
                        <?php echo "<tr><td>{$values['topic']}</td></tr>"?>
                    <?php }?>                   
                </table>
            </div>
            <!-- 抽中题目弹窗 -->
            <div id="alert-topic">
                <span id="close-topic">×</span>
            </div>
            <!-- 表单 -->
            <div class="main-form">
                <form action="main.php" method="POST">
                    <h3>学生选题</h3>
                    <input type="text" name="name" placeholder="请输入您的姓名" value="<?php echo isset($_POST["name"]) ? $name : ''; ?>">
                    <input type="text" name="class" placeholder="请输入您的班级" value="<?php echo isset($_POST["class"]) ? $class : ''; ?>">
                    <input type="text" name="departments" placeholder="请输入您的系部" value="<?php echo isset($_POST["departments"]) ? $departments : ''; ?>">
                    <input type="text" name="profession" placeholder="请输入您的专业" value="<?php echo isset($_POST["profession"]) ? $profession : ''; ?>">
                    <input type="text" name="mentor" placeholder="请输入您的导师姓名" value="<?php echo isset($_POST["mentor"]) ? $mentor : ''; ?>">
                    <input type="text" name="mentorNum" placeholder="请输入您的导师电话" value="<?php echo isset($_POST["mentorNum"]) ? $mentorNum : ''; ?>">

                    <span style="color:<?php echo $color;?>">
                        <?php echo $err;?>
                    </span> 
                    <button type="submit" name="choice">确认信息</button>
                    <button type="submit" name="choice-topic" id="choice-topic">开始抽题</button>
                </form>           
            </div>
        </div>
    </div>
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>

    <div class="black-overlay" id="black-box"></div>
    <script src="../js/main.js"></script>
</body>
</html>