<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>أستاذ</title>
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
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $teacher_name=$_POST['teacher_name'];
        $teacher_homeaddress=$_POST['teacher_homeaddress'];
        $teacher_job=$_POST['teacher_job'];
        $teacher_email=$_POST['teacher_email'];
        $teacher_phone=$_POST['teacher_phone'];
        $teacher_educationallevel=$_POST['teacher_educationallevel'];
        $teacher_scholaryear=$_POST['teacher_scholaryear'];
        $teacher_class=$_POST['teacher_class'];
        $teacher_password=$_POST['teacher_password'];
        $confirm_teacher_password=$_POST['confirm_teacher_password'];
        
        if ($teacher_password==$confirm_teacher_password){
            $error='3';
            $result= $database->query("select * from webuser where email='$teacher_email';");
            if($result->num_rows==1){
                $error='1';
            }else{

                $sql1="insert into teacher(teacher_email,teacher_name,teacher_password,teacher_homeaddress,teacher_phone,teacher_job, teacher_educationallevel, teacher_scholaryear, teacher_class) values('$teacher_email','$teacher_name','$teacher_password','$teacher_homeaddress','$teacher_phone',$teacher_job, $teacher_educationallevel, $teacher_scholaryear, $teacher_class);";
                $sql2="insert into webuser values('$teacher_email','d')";
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
    

    header("location: teachers.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>