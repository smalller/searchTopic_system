<?php 
    include "sessionLogin.php";

    // session_start();
    $_SESSION = array(); //将SESSION定义为空数组，清楚所有储存的数据，以达到退出的效果
    session_destroy();  //清除SESSION缓存文件
    loginAlert("退出成功","../index.php");  //执行跳转函数

?>