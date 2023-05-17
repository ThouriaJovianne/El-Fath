<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>الطلاب</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    

    include("../connection.php");



    if($_POST){
       
        $result= $database->query("select * from webuser");
        $student_name=$_POST['student_name'];
        $student_homeaddress=$_POST['student_homeaddress'];
        $student_parentjob=$_POST['student_parentjob'];
        $student_email=$_POST['student_email'];
        $student_phone=$_POST['student_phone'];
        $student_educationallevel=$_POST['student_educationallevel'];
        $student_scholaryear=$_POST['student_scholaryear'];
        $student_class=$_POST['student_class'];
        $student_password=$_POST['student_password'];
        $confirm_student_password=$_POST['confirm_student_password'];
        $student_teacher=$_POST['student_teacher'];
        
        if ($student_password==$confirm_student_password){
            $error='3';
            $result= $database->query("select * from webuser where email='$student_email';");
            if($result->num_rows==1){
                $error='1';
            }else{

                $sql1="insert into student(student_email, student_name,student_password,student_homeaddress,student_phone,student_parentjob, student_educationallevel, student_scholaryear, student_class, student_teacher) values('$student_email','$student_name','$student_password','$student_homeaddress','$student_phone',$student_parentjob, $student_educationallevel, $student_scholaryear, $student_class, $student_teacher);";
                $sql2="insert into webuser values('$student_email','p')";
                $database->query($sql1);
                $database->query($sql2);
                
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: students.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>