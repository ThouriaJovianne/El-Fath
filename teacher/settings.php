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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <title>الإعدادات</title>
    <style>
        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }

        .filter-container {
            animation: transitionIn-X 0.5s;
        }

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>


</head>

<body>
    <?php

    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'd') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }
    } else {
        header("location: ../login.php");
    }


    //import database
    include("../connection.php");
    $userrow = $database->query("select * from teacher where teacher_email='$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userid = $userfetch["teacher_id"];
    $username = $userfetch["teacher_name"];

    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo substr($username, 0, 13)  ?></p>
                                    <p class="profile-subtitle"><?php echo substr($useremail, 0, 22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php"><input type="button" value="تسجيل الخروج" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-item">
                        <a href="index.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fas fa-th-large"></i>
                                <p class="menu-text">الرئيسية</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-item">
                        <a href="student.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p class="menu-text">طلابي</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-item">
                        <a href="settings.php" class="non-style-link-menu non-style-link-menu-active">
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
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

                <tr>

                    <td width="13%">
                        <a href="settings.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                                <font class="tn-in-text">رجوع</font>
                            </button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">الإعدادات</p>

                    </td>

                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            تاريخ اليوم
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php
                            date_default_timezone_set('Africa/Algiers');

                            $today = date('Y-m-d');
                            echo $today;


                            $studentrow = $database->query("select  * from  student;");
                            $teacherrow = $database->query("select  * from  teacher;");
                            $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                            $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                            ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
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
                                            <div class="dashboard-items setting-tabs" style="padding:20px;margin:auto;width:95%;display: flex">
                                                <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                                <div>
                                                    <div class="h1-dashboard">
                                                        تغيير إعدادات الحساب&nbsp;

                                                    </div><br>
                                                    <div class="h3-dashboard" style="font-size: 15px;">
                                                        تعديل بيانات حسابك و تغيير كلمة المرور
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
                                            <div class="dashboard-items setting-tabs" style="padding:20px;margin:auto;width:95%;display: flex;">
                                                <div class="btn-icon-back dashboard-icons-setting " style="background-image: url('../img/icons/view-iceblue.svg');"></div>
                                                <div>
                                                    <div class="h1-dashboard">
                                                        إظهار بيانات الحساب

                                                    </div><br>
                                                    <div class="h3-dashboard" style="font-size: 15px;">
                                                        إظهار المعلومات الشخصية حول حسابك
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
    if ($_GET) {

        $teacher_id = $_GET["id"];
        $action = $_GET["action"];
        if ($action == 'drop') {
            $nameget = $_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>هل أنت متأكد ؟</h2>
                        <a class="close" href="settings.php">&times;</a>
                        <div class="content">
                            أنت على وشك أن تحذف حسابك<br>(' . substr($nameget, 0, 40) . ').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-teacher.php?id=' . $teacher_id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;نعم&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="settings.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;لا&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        } elseif ($action == 'view') {
            $sqlmain = "select * from teacher where teacher_id='$teacher_id'";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $teacher_name = $row["teacher_name"];
            $teacher_email = $row["teacher_email"];
            $teacher_job = $row["teacher_job"];
            $teacher_homeaddress = $row['teacher_homeaddress'];
            $teacher_phone = $row['teacher_phone'];

            $job_result = $database->query("select job_name from jobs where job_id='$teacher_job'");
            $job_array = $job_result->fetch_assoc();
            $job_name = $job_array["job_name"];

            echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="overflow-y: scroll;
                    max-height: 600px;">
                    <center>
                        <h2></h2>
                        <a class="close" href="settings.php">&times;</a>
                        <div class="content">
                            بيانات حسابك<br>
                            
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
                                    <label for="teacher_name" class="form-label">الاسم </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $teacher_name . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_email" class="form-label">البريد الإلكتروني </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $teacher_email . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_homeaddress" class="form-label">:عنوان المنزل </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $teacher_homeaddress . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_phone" class="form-label">رقم الهاتف  </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $teacher_phone . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_job" class="form-label">: المهنة</label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $job_name . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="settings.php"><input type="button" value="نعم" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        } elseif ($action == 'edit') {
            $sqlmain = "select * from teacher where teacher_id='$teacher_id'";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $teacher_name = $row["teacher_name"];
            $teacher_email = $row["teacher_email"];
            $teacher_job = $row["teacher_job"];
            $teacher_homeaddress = $row['teacher_homeaddress'];
            $teacher_phone = $row['teacher_phone'];

            $job_result = $database->query("select job_name from jobs where job_id='$teacher_job'");
            $job_array = $job_result->fetch_assoc();
            $job_name = $job_array["job_name"];

            $error_1 = $_GET["error"];
            $errorlist = array(
                '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">هناك مسبقا حساب لهذا البريد الالكتروني</label>',
                '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">خطأ في تأكيد كلمة المرور! الرجاء إعادة تأكيد كلمة المرور</label>',
                '3' => '',
                '4' => "",
                '0' => '',

            );

            if ($error_1 != '4') {
                echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            
                                <a class="close" href="settings.php">&times;</a> 
                                <div style="display: flex;justify-content: center;">
                                <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                        <td class="label-td" colspan="2">' .
                    $errorlist[$error_1]
                    . '</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">تعديل بيانات الاستاذ</p>
                                        رقمك التعريفي : ' . $teacher_id . '<br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <form action="edit-teacher.php" method="POST" class="add-new-form">
                                            <label for="teacher_email" class="form-label">البريد الإلكتروني </label>
                                            <input type="hidden" value="' . $teacher_id . '" name="teacher_id">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                        <input type="hidden" name="oldemail" value="' . $teacher_email . '" >
                                        <input type="email" name="teacher_email" class="input-text" placeholder="البريد الإلكتروني" value="' . $teacher_email . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_name" class="form-label">الاسم </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="teacher_name" class="input-text" placeholder=" : اسمك" value="' . $teacher_name . '" required><br>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_homeaddress" class="form-label">: عنوان منزلك</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="teacher_homeaddress" class="input-text" placeholder="عنوان منزلك" value="' . $teacher_homeaddress . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_phone" class="form-label">رقم الهاتف </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="tel" name="teacher_phone" class="input-text" placeholder="رقم الهاتف" value="' . $teacher_phone . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_job" class="form-label">: مهنتك (Current' . $job_name . ')</label>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <select name="teacher_job" id="" class="box">';


                $list11 = $database->query("select  * from  jobs;");

                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $sn = $row00["job_name"];
                    $id00 = $row00["job_id"];
                    echo "<option value=" . $id00 . ">$sn</option><br/>";
                };




                echo     '       </select><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_password" class="form-label">كلمة المرور </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="teacher_password" class="input-text" placeholder="ادخل كلمة المرور" required><br>
                                        </td>
                                    </tr><tr>
                                        <td class="label-td" colspan="2">
                                            <label for="confirm_teacher_password" class="form-label">تأكيد كلمة المرور </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="confirm_teacher_password" class="input-text" placeholder="تأكيد كلمة المرور" required><br>
                                        </td>
                                    </tr>
                                    
                        
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="إعادة ملىءالصفحة" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
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
            } else {
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
            };
        }
    }
    ?>

</body>

</html>