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
            <form action="perInfo.php" method="POST">
                <button type="submit"  name="download" id="download">生成Excel表格</button>   
            </form>
                  
        </div>
    </div>
    <footer>四川信息职业技术学院 - 毕业设计选题系统</footer>

    <script>
        let download = document.getElementById("download");
        download.onclick = function() {
            <?php echo "tableToExcel('{$vals["username"]}','{$vals["name"]}','{$vals["class"]}','{$vals["profession"]}','{$vals["departments"]}','{$vals["telephone"]}','{$vals["topic"]}','{$vals["mentor"]}','{$vals["mentorNum"]}')"?>
        }
 
        //导出Excel表格封装函数
        function tableToExcel(userName,name,class1,profession,departments,telephone,topic,mentor,mentorNum){
            //要导出的json数据    
            const jsonData = [
                {
                username:userName,
                name:name,
                class1:class1,
                profession:profession,
                departments:departments,
                telephone:telephone,
                topic:topic,
                mentor:mentor,
                mentorNum:mentorNum
                },
            ]
            //列标题，逗号隔开，每一个逗号就是隔开一个单元格
            let str = `学号,姓名,班级,专业,系部,电话,题目,导师姓名,导师电话\n`;
            //增加\t为了不让表格显示科学计数法或者其他格式
            for(let i = 0 ; i < jsonData.length ; i++ ){
                for(let item in jsonData[i]){
                    str+=`${jsonData[i][item] + '\t'},`;     
                }
                str+='\n';
            }
            //encodeURIComponent解决中文乱码
            let uri = 'data:text/csv;charset=utf-8,\ufeff' + encodeURIComponent(str);
            //通过创建a标签实现
            let link = document.createElement("a");
            link.href = uri;
            //对下载的文件命名
            link.download =  "个人信息数据表.csv";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

    </script>
</body>
</html>