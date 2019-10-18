<?php 
    include "sql-conn.php";
    include 'PHPExcel.php';
    include 'PHPExcel/Writer/Excel2007.php';

    $userName = $_SESSION["username"];

    //将数据从数据库中查找出来展示在前端页面上
    $pre_info = "select username,name,class,profession,departments,telephone,topic,mentor,mentorNum from user where username = $userName;";
    $result = $mysqli->query($pre_info);
    $all = mysqli_fetch_assoc($result);  

