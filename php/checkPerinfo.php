<?php 
    include "sql-conn.php";

    $userName = $_SESSION["username"];

    //将数据从数据库中查找出来展示在前端页面上
    $pre_info = "select username,name,class,profession,departments,telephone,topic,mentor,mentorNum from user where username = $userName;";
    $result = $mysqli->query($pre_info);
    $all = mysqli_fetch_assoc($result);  

    //查询题目内容，好在前端页面进行调用并展示出来
    $pre_info1 = "select content from user where username = $userName;";
    $result1 = $mysqli->query($pre_info1);
    $all1 = mysqli_fetch_assoc($result1);  

