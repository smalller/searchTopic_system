<?php 
    include "sql-conn.php";

    //验证接收输入的学号
    function checkUsername($inputText) {
        $inputText = strip_tags($inputText);  //禁止输入标签
        return $inputText;
    }
    //验证接收输入的电话
    function checkPhoneno($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);    //替换输入的空格，第一个参数表示要替换的内容，第二个表示替换成什么，第三个表示要替换的对象 
        return $inputText;
    }
    //验证接收输入的密码
    function checkPassword($inputText) {
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }

    //接收表单数据
    $username = htmlspecialchars(checkUsername($_POST["username"]));
    $phoneno = htmlspecialchars(checkPhoneno($_POST["phoneno"]));
    $password = htmlspecialchars(checkPassword($_POST["password"]));
    $password2 = htmlspecialchars(checkPassword($_POST["password2"]));

    
    //当点击注册时执行以下操作
    if(isset($_POST["register"])) {
        //验证用户数输入的数据是否有效
        if(strlen($username) < 1 || preg_match("/[^0-9]/",$username)) {
            $err = "请输入正确的学号";
            $color = "red";
        } else if(strlen($username) > 10 || strlen($username) < 5) {
            $err = "学号的长度应在5~10位之间";
            $color = "red";
        } else if(!(strlen($phoneno) == 11) || preg_match("/[^0-9]/",$phoneno)) {
            $err = "请输入正确的手机号";
            $color = "red";
        } else if($password != $password2) {
            $err = "两次输入的密码不一致";
            $color = "red";
        } else if(preg_match("/[^A-Za-z0-9]/",$password)) {  //正则表达式限定规则
            $err = "密码只能由数字或字母组成";
            $color = "red";
        } else if(strlen($password) > 20 || strlen($password) < 6) {
            $err = "密码的长度应在5~20位之间";
            $color = "red";
        } else if(!empty($username) && !empty($phoneno) && !empty($password) && !empty($password2)) {  //当输入的值都不为空时      

            //查询用户名
            $pre_stmt = $mysqli->prepare("select username from user where username = ?");  //准备sql语句，外部接收到的值先以?替代
            $pre_stmt->bind_param("s",$username); //给上面的语句进行绑定参数
            $pre_stmt->execute();   //执行sql语句$
            $rs = $pre_stmt->get_result();  //将执行后拿到的结果赋给一个变量，在下面进行判断和判断

            //如果查询到，就进行以下判断
            if((mysqli_num_rows($rs) >= 1)) {   //如果查询的记录中有这一条记录
                $err = "该学号已被注册";
                $color = "red";
                $pre_stmt->close(); //关闭数据库操作语句
            } else {
                $pre_stmt1 = $mysqli->prepare("insert into user (username,password,telephone) values(?,?,?)");  //准备sql语句，外部接收到的值先以?替代
                $pre_stmt1->bind_param("ssi",$username,$password,$phoneno); //给上面的语句进行绑定参数

                //执行sql语句并进行判断
                if($pre_stmt1->execute()) {
                    $err = "恭喜您，注册成功";
                    $color = "#08e008";
                    $pre_stmt1->close(); //关闭数据库操作语句
                }else {
                    $err = "信息输入有误，请重新输入";
                }      
            } 
            $mysqli->close();   //关闭数据库  
        }    
    }
?>