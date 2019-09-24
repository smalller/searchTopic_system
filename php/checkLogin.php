<?php 
    include "sql-conn.php";

    //接收表单输入的数据
    $username = $_POST["username"];
    $username = strip_tags($username);  //禁止输入标签
    $password = $_POST["password"];

    //当点击登录时执行以下操作
    if(isset($_POST["login"])) {

        //验证用户数输入的数据是否有效
        if(strlen($username) < 1){
            $err = "请输入用户名";
        } else if(strlen($password) < 1) {
            $err = "请输入密码";
        } else {
            $err = "用户名或密码不正确";
        }

         //当输入的值都不为空时
        if(!empty($username) && !empty($password)) {
            //查询用户名和密码
            $pre_stmt = $mysqli->prepare("select username,password from user where username = ? and password = ?");  //准备sql语句，外部接收到的值先以?替代
            $pre_stmt->bind_param("ss",$username,$password); //给上面的语句进行绑定参数
            $pre_stmt->execute();   //执行sql语句
            $rs = $pre_stmt->get_result();  //将执行后拿到的结果赋给一个变量，在下面进行判断和使用

            //从结果集中读取数据，返回关联数组，以数据库中的字段作为数组的键名
            if($row = mysqli_fetch_assoc($rs)) {
                //若能提取到数据，就将数据存储在session服务器中
                session_start();    
                $_SESSION["username"] = $row["username"];
                $_SESSION["password"] = $row["password"];
                header("Location: php/main.php");   //若验证成功，就跳转页面               
            }
            $pre_stmt->close(); //关闭sql查询
            $mysqli->close();   //关闭数据库
        }
    }  
?>
