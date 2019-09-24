<?php 
    include "sql-conn.php";
    $err = "";


    //点击查看题库，题目就会从数据库中调用出来显示在前端页面上
    $pre_newtopic = "select * from topic;";
    $result = $mysqli->query($pre_newtopic);
    $all = $result->fetch_all(MYSQLI_ASSOC);


    //验证接收输入的题目名称
    function checkTopic($inputText) {
        $inputText = strip_tags($inputText);            //禁止输入标签
        $inputText = str_replace(" ","",$inputText);    //替换输入的空格，第一个参数表示要替换的内容，第二个表示替换成什么，第三个表示要替换的对象 
        return $inputText;
    }
    //验证接收输入的姓名
    function checkName($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);   
        return $inputText;
    }
    //验证接收输入的电话
    function checkTelephone($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }


    //接收表单数据
    $name = htmlspecialchars(checkName($_POST["name"]));
    $topic = htmlspecialchars(checkTopic($_POST["topic"]));
    $telephone = htmlspecialchars(checkTelephone($_POST["telephone"]));


    //当点击提交后执行以下操作
    if(isset($_POST["submit"])) {
        //验证输入的内容是否有效
        if(strlen($topic) < 1) {
            $err = "请输入要新增的题目名称";
            $color = "red";
        } else if(strlen($name) < 1) {
            $err = "请输入您的姓名";
            $color = "red";
        } else if(!(strlen($telephone) == 11) || preg_match("/[^0-9]/",$telephone)) {
            $err = "请输入正确的手机号";
            $color = "red";
        } else if(!empty($topic) && !empty($name) && !empty($telephone)) {

            //查询是否输入的值有重复
            $pre_stmt4= $mysqli->prepare("select * from topic where topic = ?");  //准备sql语句
            $pre_stmt4->bind_param("s",$topic);   //给上面的语句绑定参数
            $pre_stmt4->execute();   //执行sql语句
            $rs4 = $pre_stmt4->get_result();  //将得到的结果赋给一个变量


            if((mysqli_num_rows($rs4) >= 1)) {
                $err = "该题已新增，请勿重复提交";
                $color = "red";
            } else {
                // sql防御操作(将输入的值与验证的值进行隔离，安全)
                $pre_stmt5 = $mysqli->prepare("insert into topic (topic,name,telephone) values(?,?,?)");  //准备sql语句，外部接收到的值先以?替代
                $pre_stmt5->bind_param("ssi",$topic,$name,$telephone); //给上面的语句进行绑定参数，有几个参数，前面就有几个s 

                //执行sql语句并进行判断
                if($pre_stmt5->execute()) {
                    $err = "题目新增成功！";
                    $color = "#08e008";
                } else {
                    $err = "信息输入有误，请重新输入";
                }
               
                $pre_stmt5->close(); //关闭数据库操作语句
                $mysqli->close();   //关闭数据库
            }
        }
   }
?>