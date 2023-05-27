<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        


    <title>الإعدادات</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-X  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
    
    
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
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">الرئيسية</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="followup-notebook.php" class="non-style-link-menu"><div><p class="menu-text"> دفتر المتابعة</p></a></div>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="assignment.php" class="non-style-link-menu"><div><p class="menu-text">الواجبات المنزلية  </p></div></a>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="done-assignment.php" class="non-style-link-menu"><div><p class="menu-text">الواجبات التامة  </p></div></a>
                    </td>
                </tr>
               
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings menu-active menu-icon-settings-active">
                        <a href="settings.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">الإعدادات</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                    <?php include("back.php"); ?>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">الإعدادات</p>
                                           
                    </td>
                    
                            <td width="15%">
                            <?php 
                                include("../date.php");
                                $studentrow = $database->query("select  * from  student;");
                                $teacherrow = $database->query("select  * from  teacher;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $assignmentrow = $database->query("select  * from  assignment where assignment_enddate='$today';");
                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <a href="?action=edit&id=<?php echo $userid ?>&error=0" class="non-style-link">
                                    <div  class="dashboard-items setting-tabs"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                        <div>
                                                <div class="h1-dashboard">
                                                    تعديل بيانات الحساب  &nbsp;

                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px;">
                                                    عدل بيانات حسابك و/أو غير كلمة المرور
                                                </div>
                                        </div>
                                                
                                    </div>
                                    </a>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 5px">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                            <td style="width: 25%;">
                                    <a href="?action=view&id=<?php echo $userid ?>" class="non-style-link">
                                    <div  class="dashboard-items setting-tabs"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div class="btn-icon-back dashboard-icons-setting " style="background-image: url('../img/icons/view-iceblue.svg');"></div>
                                        <div>
                                                <div class="h1-dashboard" >
                                                    إظهار بيانات الحساب
                                                    
                                                </div><br>
                                                <div class="h3-dashboard"  style="font-size: 15px;">
                                                    أظهر المعلومات الشخصية حول حسابك
                                                </div>
                                        </div>
                                                
                                    </div>
                                    </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 5px">&nbsp;</p>
                                </td>
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>
            
            </table>
        </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];

        if($action=='view'){
            $sqlmain= "select * from student where student_id='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["student_name"];
            $email=$row["student_email"];
            $address=$row["student_homeaddress"];
            $phone = $row["student_phone"];
            $birthdate = $row["student_birthdate"];
           

            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="settings.php">&times;</a>
                        <div class="content">
                            موقع مسجد الفتح<br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">إظهار البيانات</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">:اسم ولقب الطالب</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">:الحساب الالكتروني </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">:رقم الهاتف </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$phone.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">:عنوان المنزل </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$address.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">:تاريخ الميلاد </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$birthdate.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="settings.php"><input type="button" value="حسنا" class="login-btn btn-primary-soft btn" ></a>
                                </td>
                
                            </tr>
                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        }elseif($action=='edit'){
            
            $sqlmain= "select * from student where student_id='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["student_name"];
            $email=$row["student_email"];
            $parentjob=$row["student_parentjob"];
            $homeaddress=$row['student_homeaddress'];
            $phone=$row['student_phone'];
                
            $job_result= $database->query("select job_name from jobs where job_id='$parentjob'");
            $job_array= $job_result->fetch_assoc();
            $job_name=$job_array["job_name"];
    
                $error_1=$_GET["error"];
                    $errorlist= array(
                        '1'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">هناك مسبقا حساب لهذا البريد الالكتروني</label>',
                        '2'=>'<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">خطأ في تأكيد كلمة المرور! الرجاء إعادة تأكيد كلمة المرور</label>',
                        '3'=>'',
                        '4'=>"",
                        '0'=>'',
    
                    );
    
                if($error_1!='4'){
                        echo '
                        <div id="popup1" class="overlay">
                                <div class="popup">
                                <center>
                                
                                    <a class="close" href="settings.php">&times;</a> 
                                    <div style="display: flex;justify-content: center;">
                                    <div class="abc">
                                    <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                    <tr>
                                            <td class="label-td" colspan="2">'.
                                                $errorlist[$error_1]
                                            .'</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">تعديل بيانات الطالب</p>
                                            رقمك التعريفي : '.$id.'<br><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <form action="edit-student.php" method="POST" class="add-new-form">
                                                <label for="email" class="form-label">البريد الإلكتروني </label>
                                                <input type="hidden" value="'.$id.'" name="id">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                            <input type="hidden" name="oldemail" value="'.$email.'" >
                                            <input type="email" name="email" class="input-text" placeholder="البريد الإلكتروني" value="'.$email.'" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                            <td class="label-td" colspan="2">
                                                <label for="name" class="form-label">: اسم ولقب الطالب </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <input type="text" name="name" class="input-text" placeholder=" : اسم ولقب الطالب" value="'.$name.'" required><br>
                                            </td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="homeaddress" class="form-label">: عنوان المنزل</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <input type="text" name="homeaddress" class="input-text" placeholder="أدخل عنوان منزلك الجديد" value="'.$homeaddress.'" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="phone" class="form-label">رقم الهاتف </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <input type="tel" name="phone" class="input-text" placeholder="أدخل رقم هاتفك الجديد" value="'.$phone.'" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="parentjob" class="form-label">: مهنة الولي (Current'.$job_name.')</label>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <select name="parentjob" id="" class="box">';
                                                    
                    
                                                    $list11 = $database->query("select  * from  jobs;");
                    
                                                    for ($y=0;$y<$list11->num_rows;$y++){
                                                        $row00=$list11->fetch_assoc();
                                                        $sn=$row00["job_name"];
                                                        $id00=$row00["job_id"];
                                                        echo "<option value=".$id00.">$sn</option><br/>";
                                                    };
                    
                    
                    
                                                    
                                    echo     '       </select><br><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="password" class="form-label">كلمة المرور الحالية</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <input type="password" name="password" class="input-text" placeholder="أدخل كلمة المرور الحالية" required><br>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="password" class="input-text" placeholder="أدخل كلمة المرور الجديدة" required><br>
                                        </td>
                                    </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <label for="confirm_password" class="form-label">تأكيد كلمة المرور الجديدة</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label-td" colspan="2">
                                                <input type="password" name="confirm_password" class="input-text" placeholder="أكد كلمة المرور الجديدة" required><br>
                                            </td>
                                        </tr>
                                        
                            
                                        <tr>
                                            <td colspan="2">
                                                
                                                <input type="reset" value="إعادة ملىءالصفحة" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="settings.php"><input type="button" value="إلغاء" class="login-btn btn-primary-soft btn" ></a>
                                                <input type="submit" value="حفظ" class="login-btn btn-primary btn">
                                            </td>
                            
                                        </tr>
                                    
                                        </form>
                                        </tr>
                                    </table>
                                    </div>
                                    </div>
                                </center>
                                <br><br>
                        </div>
                        </div>
                        ';
            }else{
                echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            <br><br><br><br>
                                <h2>!تم التعديل بنجاح</h2>
                                
                                <div class="content">
                                    إذا غيرت بريدك الإلكتروني يرجى تسجيل الخروج وإعادة تسجيل الدخول بالبريد الإلكتروني الجديد
                                    
                                </div>
                                <div style="display: flex;justify-content: center;">
                                
                                
                                <a href="../logout.php" class="non-style-link"><button  class="btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;تسجيل الخروج&nbsp;&nbsp;</font></button></a>
    
                                </div>
                                <br><br>
                            </center>
                    </div>
                    </div>
        ';
    
    
    
            }; }
    }
        ?>

</body>
</html>