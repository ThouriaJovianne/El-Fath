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
        $student_id=$_GET['id'];
        $result001= $database->query("select * from student where student_id=$student_id;");
        $student_email=($result001->fetch_assoc())["student_email"];
        $sql= $database->query("delete from webuser where email='$student_email';");
        $sql= $database->query("delete from student where student_email='$student_email';");
        //print_r($email);
        header("location: students.php");
    }


?>