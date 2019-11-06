<?php
include "sessionLogin.php";
include "sessionStudent.php";
include "checkStudent.php";
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>毕业设计选题系统</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main_both.css">
    <link rel="stylesheet" href="../css/student.css">
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
                    <li><a href="newTopic.php">新增题目</a></li>
                    <li id="bom"><a href="#">学生信息</a></li>
                </ul>
            </div>
            <div class="user">
                <ul>
                    <li>
                        <a href="#">
                            <span>
                                用户：<?php echo $_SESSION["username"]; ?>
                            </span>
                            <span id="shu">|</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" class="logout">
                            注销用户
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- 主体部分 -->
    <div class="expend-container">
        <!-- 表格部分 -->
        <table class="table table-hover">
            <tr>
                <th>序号</th>
                <th>姓名</th>
                <th>学号</th>
                <th>班级</th>
                <th>专业</th>
                <th>系部</th>
                <th>电话</th>
                <th>题目</th>
                <th>题目内容</th>
                <th>指导教师</th>
                <th>导师电话</th>
            </tr>

            <!-- 将数据库中的学生信息数据遍历到页面上 -->
            <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                <?php
                    $name = $row1["name"];
                    $userName = $row1["username"];
                    $class = $row1["class"];
                    $profession = $row1["profession"];
                    $departments = $row1["departments"];
                    $telephone = $row1["telephone"];
                    $topic = $row1["topic"];
                    $content = $row1["content"];
                    $mentor = $row1["mentor"];
                    $mentorNum = $row1["mentorNum"];
                    ?>
                <?php echo "<tr><td>$num</td><td>$name</td><td>$userName</td><td>$class</td><td>$profession</td><td>$departments</td>
                            <td>$telephone</td><td>$topic</td><td>$content</td><td>$mentor</td><td>$mentorNum</td></tr>";
                    $num++;
                    ?>
            <?php } ?>
        </table>
        <a href="outputExcel.php" class="output">导出学生信息</a>
    </div>
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>
    <div class="black-overlay" id="black-box"></div>
    <script src="../js/newTopic.js"></script>
</body>

</html>