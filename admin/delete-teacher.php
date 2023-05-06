<?php

    session_start();
    
    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
    
        include("../connection.php");
        $teacher_id=$_GET['id'];
        $result001= $database->query("select * from teacher where teacher_id=$teacher_id;");
        $teacher_email=($result001->fetch_assoc())["teacher_email"];
        $sql= $database->query("delete from webuser where email='$teacher_email';");
        $sql= $database->query("delete from teacher where teacher_email='$teacher_email';");
        //print_r($email);
        header("location: teachers.php");
    }


?>