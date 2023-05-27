<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_POST){
        include("../connection.php");
        $title=$_POST["title"];
        $student_id=$_POST["student_id"];
        $startdate=$_POST["startdate"];
        $enddate=$_POST["enddate"];
        $sql="insert into assignment (student_id, assignment_title, assignment_startdate, assignment_enddate) values ($student_id,'$title','$startdate','$enddate');";
        $result= $database->query($sql);
        header("location: assignment.php?action=assignment-added&title=$title");
        
    }


?>