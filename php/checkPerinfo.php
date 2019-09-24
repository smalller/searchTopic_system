<?php 
    include "sql-conn.php";
    include 'PHPExcel.php';
    include 'PHPExcel/Writer/Excel2007.php';

    $userName = $_SESSION["username"];

    
    //将数据从数据库中查找出来展示在前端页面上
    $pre_info = "select username,name,class,profession,departments,telephone,topic,mentor,mentorNum from user where username = $userName;";
    $result = $mysqli->query($pre_info);
    $all = mysqli_fetch_assoc($result);  


    //将数据从数据库中查找出来然后通过JS将数据导出成Excel
    $pre_newtopic = "select username,name,class,profession,departments,telephone,topic,mentor,mentorNum from user where username = $userName;";
    $result1 = $mysqli->query($pre_newtopic);
    $all1 = $result1->fetch_all(MYSQLI_ASSOC);

    //将查询到的数据遍历出来，好在前端进行调用,然后导成Excel
    foreach($all1 as $vals) {

    }
