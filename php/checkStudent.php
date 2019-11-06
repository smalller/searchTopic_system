<?php
    include "sql-conn.php";

    $num      = 1;   //支出序号
    $userName = $_SESSION["username"];  //获取当前用户

    //查询学生信息数据
    $sql1    = "select * from user limit 1,9999999999";
    $result1 = $mysqli->query($sql1);

?>