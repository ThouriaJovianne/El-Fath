<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/icons.css">
        
    <title>الصفحة الرسمية :الطالب </title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
</head>
<body>
    <?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    
    include("../connection.php");
    $userrow = $database->query("select * from student where student_email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["student_id"];
    $username=$userfetch["student_name"];
    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username,0,13)  ?></p>
                                    <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="تسجيل الخروج" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                                
<tr class="menu-row">
                    <td class="menu-btn">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div class="menu-content">
                                <i class="fas fa-th-large"></i>
                                <p class="menu-text">الرئيسية</p>
                            </div>
                        </a>
                    </td>
                </tr>
                 <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="followup-notebook.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p class="menu-text"> دفتر المتابعة</p>
                            </div>
                        </a>
                    </td>
                </tr>
                 <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="assignment.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-book-open-reader"></i>
                                <p class="menu-text">الواجبات المنزلية</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="done-assignment.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p class="menu-text">الواجبات التامة</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="settings.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-gears"></i>
                                <p class="menu-text">الإعدادت</p>
                            </div>
                        </a>
                    </td>
                </tr>
             


                
               
  
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">الرئيسية</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                
                            <?php include("../date.php");

                                $studentrow = $database->query("select  * from  student;");
                                $teacherrow = $database->query("select  * from  teacher;");
                                $assignmentrow = $database->query("select * from assignment where student_id = $userid");
                                // This one should be about approved-done-assignment
                                
                                // $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                // $assignmentrow = $database->query("select  * from  assignment where assignment_startdate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                        
                    <center>
                    <table class="filter-container doctor-header patient-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>!مرحبا بك</h3>
                            <h1><?php echo $username  ?></h1>
                                تصفح دفتر المتالعة الخاصة بك<br>أيضا كن على علم بأي واجب منزلي جديد أعلن عنه أستاذك<br><br>
                            </p>
                            
             
                            
                        </td>
                    </tr>
                    </table>
                    </center>
                    
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%"">
                            <tr>
                                <td width="50%">

                                    




                                    <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td colspan="4">
                                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">الإنجازات</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    <?php    echo $assignmentrow->num_rows  ?>
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    إنجازاتي  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                                <div class="btn-icon-back dashboard-icons"><i class="fa-solid fa-check"></i></div></div>
                                                    </div>
                                                </td>

                                                </tr>
                                                <tr>
                                                
                                            </tr>
                                        </table>
                                    </center>








                                </td>
                                <td>


                            
                                    <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">الواجبات المنزلية القادمة</p>
                                    <center>
                                        <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                            
                                        <tr>
                                        <th class="table-headin">
                                                    
                                                
                                                    عنوان الواجب المنزلي
                                                    
                                                    </th>
                                                <th class="table-headin">
                                                    
                                                
                                                تاريخ الإعلان عنه
                                                
                                                </th>
                                                
                                                <th class="table-headin">
                                                    آخر أجل لتسلميه
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $nextweek=date("Y-m-d",strtotime("+1 week"));
                                                $sqlmain = "select * from assignment where student_id=$userid and assignment_enddate>='$today' order by assignment_startdate asc";
                                        
                                                $result= $database->query($sqlmain);
                
                                                if($result->num_rows==0){
                                                    echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">!لا يوجد شيء لإظهاره</p>
                                                    <a class="non-style-link" href="assignment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp;تصفح قسم الواجبات المنزلية &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    
                                                }
                                                else{
                                                for ( $x=0; $x<$result->num_rows;$x++){
                                                    $row=$result->fetch_assoc();
                                                    
                                                    $assignment_title=$row["assignment_title"];
                                                    $assignment_startdate=$row["assignment_startdate"];
                                                    $assignment_enddate=$row["assignment_enddate"];
                                                   
                                                    echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;'.
                                                            $assignment_title
                                                        .'</td>
                                                        <td style="padding:20px;"> &nbsp;'
                                                        .substr($assignment_startdate,0,10).
                                                        '</td>
                                                        <td>
                                                        '.substr($assignment_enddate,0,5).'
                                                        </td>
                                                      
                                                      

                
                                                       
                                                    </tr>';
                                                    
                                                }
                                            }
                                                 
                                            ?>
                 
                                            </tbody>
                
                                        </table>
                                        </div>
                                        </center>







                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </div>
    </div>


</body>
</html>