<?php
    //弹窗封装函数
    function loginAlert($txt,$url) {
        echo '<script>alert("'.$txt.'");location.href = "'.$url.'";</script>';   
    }

    session_start();    //开启session服务

    //如果没有登录就访问到其他页面，就会执行以下代码强行让其跳转进行登录
    if(!isset($_SESSION["password"])) {
        loginAlert("请登录后再进行操作！","../index.php");   //执行跳转函数
        exit;
    }
?>
