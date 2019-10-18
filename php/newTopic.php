<?php 
    include "sessionLogin.php";
    include "sessionNewTopic.php";
    include "checkNewTopic.php";
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>毕业设计选题系统</title>
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/newTopic.css">
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
                    <li><a href="perInfo.php">个人信息</a></li>
                    <li id="bom"><a href="#">新增题目</a></li>
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
            <a href="outputExcel.php" class="output">导出抽题信息</a>
            <div class="alert">
                <span id="open">查看题库</span>
            </div>
            <div class="alert-box" id="close-box">
                <span id="close">×</span>
                <table>
                    <?php foreach($all as $values) {?>
                        <?php echo "<tr><td>{$values['topic']}</td></tr>"?>
                    <?php }?>                   
                </table>
            </div>
            <div class="main-form">
                <form action="newTopic.php" method="POST">
                    <h3>新增题目</h3>
                    <input type="text" name="topic" placeholder="请输入您要新增的题目名称" value="<?php echo isset($_POST["topic"]) ? $topic : ''; ?>">
                    <input type="text" name="name" placeholder="请输入您的姓名" value="<?php echo isset($_POST["name"]) ? $name : ''; ?>">
                    <input type="text" name="telephone" placeholder="请输入您的电话" value="<?php echo isset($_POST["telephone"]) ? $telephone : ''; ?>">
                    <span style="color:<?php echo $color;?>">
                        <?php echo $err;?>
                    </span> 
                    <button type="submit" class="submit" name="submit">提交</button>
                </form>          
            </div>
        </div>
    </div>
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>
    <div class="black-overlay" id="black-box"></div>
    <script src="../js/newTopic.js"></script>
</body>
</html>