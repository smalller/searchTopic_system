<?php 
    include "sql-conn.php";

    //弹窗封装函数
    function Alert($txt,$topic_name,$topic_con,$url) {
        echo '<script>alert("'.$txt.' '.《.$topic_name.》.'\n\n'.$topic_con.'");
        location.href = "'.$url.'";</script>';   
    }

    //点击查看题目，题目就会从数据库中调用出来显示在前端页面上
    $pre_topic = "select topic from topic;";
    $result = $mysqli->query($pre_topic);
    $all = $result->fetch_all(MYSQLI_ASSOC);    //返回的关联数组以键名显示


    //验证接收输入的姓名
    function checkName($inputText) {
        $inputText = strip_tags($inputText);            //禁止输入标签
        $inputText = str_replace(" ","",$inputText);    //替换输入的空格，第一个参数表示要替换的内容，第二个表示替换成什么，第三个表示要替换的对象 
        return $inputText;
    }
    //验证接收输入的班级
    function checkClass($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);   
        return $inputText;
    }
    //验证接收输入的系部
    function checkDepartments($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }
    //验证接收输入的专业
    function checkProfession($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }
    //验证接收输入的导师姓名
    function checkMentor($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }
    //验证接收输入的导师电话
    function checkMentorNum($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }


    //接收表单数据
    $name = htmlspecialchars(checkName($_POST["name"]));
    $class = htmlspecialchars(checkClass($_POST["class"]));
    $departments = htmlspecialchars(checkDepartments($_POST["departments"]));
    $profession = htmlspecialchars(checkProfession($_POST["profession"]));
    $mentor = htmlspecialchars(checkMentor($_POST["mentor"]));
    $mentorNum = htmlspecialchars(checkMentorNum($_POST["mentorNum"]));
    $userName = $_SESSION["username"]; 


    //当点击确认信息后执行以下操作
    if(isset($_POST["choice"])) {
        //验证输入的内容是否有效
        if(strlen($name) < 1) {
            $err = "请输入您的姓名";
            $color = "red";
        } else if(strlen($class) < 1) {
            $err = "请输入您的班级";
            $color = "red";
        } else if(strlen($departments) < 1) {
            $err = "请输入您的系部";
            $color = "red";
        } else if(strlen($profession) < 1) {
            $err = "请输入您的专业";
            $color = "red";
        } else if(strlen($mentor) < 1) {
            $err = "请输入您的导师姓名";
            $color = "red";
        } else if(!(strlen($mentorNum) == 11) || preg_match("/[^0-9]/",$mentorNum)) {
            $err = "请输入正确的手机号";
            $color = "red";
        } else if(!empty($name) && !empty($class) && !empty($departments) && !empty($profession) && !empty($mentor) && !empty($mentorNum)) {

            //查询是否输入的值有重复
            $pre_stmt3 = $mysqli->prepare("select name,class,departments,profession,mentor,mentorNum from user where name = ? and class = ? and departments = ? and profession = ? and mentor = ? and mentorNum = ?");  //准备sql语句
            $pre_stmt3->bind_param("sssssi",$name,$class,$departments,$profession,$mentor,$mentorNum);   //给上面的语句绑定参数
            $pre_stmt3->execute();   //执行sql语句
            $rs3 = $pre_stmt3->get_result();  //将得到的结果赋给一个变量

            if((mysqli_num_rows($rs3) >= 1)) {
                $err = "您已保存信息，请勿重复提交";
                $color = "red";
                $pre_stmt3->close(); //关闭数据库操作语句  
            } else {
                // sql防御操作(将输入的值与验证的值进行隔离，安全)
                $pre_stmt4 = $mysqli->prepare("update user set name = ?,class = ?,departments = ?,profession = ?,mentor = ?,mentorNum = ? where username = $userName");  //准备sql语句，外部接收到的值先以?替代
                $pre_stmt4->bind_param("sssssi",$name,$class,$departments,$profession,$mentor,$mentorNum); //给上面的语句进行绑定参数，有几个参数，前面就有几个s 

                //执行sql语句并进行判断
                if($pre_stmt4->execute()) {
                    $err = "信息已保存，请开始抽题";
                    $color = "#08e008";
                }else {
                    $err = "信息输入有误，请重新输入";
                }
                $pre_stmt4->close(); //关闭数据库操作语句     
            }
            $mysqli->close();   //关闭数据库
        }     
    }


    //当点击抽题按钮时
    if(isset($_POST["choice-topic"])) {
        if(!empty($name) && !empty($class) && !empty($departments) && !empty($profession) && !empty($mentor) && !empty($mentorNum)) {

            //随机从数据库中查询一条记录
            $serach_topic = "select topic,content from topic order by rand() limit 1;"; //随机查询语句
            $res = $mysqli->query($serach_topic);
            $all_topic = $res->fetch_all(MYSQLI_ASSOC);

            foreach($all_topic as $val) {   //将查询的结果遍历出来
                $topname = $val['topic'];   //只保留topic字段的值，并赋给一个变量好在下面的弹窗部分调用
                $content = $val['content'];
                $topicName = $userName . ' : ' . $val['topic']; //只保留topic字段的值，并赋给一个变量好在下面调用，在抽到的topic钱前面加上该用户的学号，可以使数据具有唯一性
            }

            //查询是否重复抽题
            $pre_stmt5 = $mysqli->prepare("select topic from user where topic = ?");  //准备sql语句
            $pre_stmt5->bind_param("s",$topicName);   //给上面的语句绑定参数
            $pre_stmt5->execute();   //执行sql语句
            $rs5 = $pre_stmt5->get_result();  //将得到的结果赋给一个变量
   
            if(mysqli_num_rows($rs5) >= 1) {
                $err = "您已选题，请勿重复选题";
                $color = "red";
                $pre_stmt5->close(); //关闭数据库操作语句
            } else {
                //将随机查询到的字段插入到该账号的topic字段里
                $pre_stmt6 = $mysqli->prepare("update user set topic = ?,content = ? where username = $userName");  //准备sql语句，外部接收到的值先以?替代
                $pre_stmt6->bind_param("ss",$topicName,$content); //给上面的语句进行绑定参数，有几个参数，前面就有几个s

                //当执行插入操作过后
                if($pre_stmt6->execute()) {
                    Alert("您抽中的毕业设计为： ",$topname,"详情请在个人信息中查看","perInfo.php");    //将抽中的题目以弹窗的形式展示出来
                } else {
                    $err = "信息输入有误，请重新输入";
                }
                $pre_stmt6->close(); //关闭数据库操作语句             
            }
            $mysqli->close();   //关闭数据库
        } else {
            $err = "请完善并确认信息";
            $color = "red";
        } 
    }
?>