<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/pagination.css">

    <title>الأساتذة</title>
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
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
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
            header("location: ../login.php");
        }
    } else {
        header("location: ../login.php");
    }

    include("../connection.php");

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
                                    <p class="profile-title">المشرف العام</p>
                                    <p class="profile-subtitle">admin@edoc.com</p>
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
                    <td class="menu-btn menu-icon-dashbord">
                        <a href="index.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">الرئيسية</p>
                        </a>
        </div></a>
        </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                <a href="teachers.php" class="non-style-link-menu non-style-link-menu-active">
                    <div>
                        <p class="menu-text">الأساتذة</p>
                </a>
    </div>
    </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient">
            <a href="students.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">الطلاب</p>
            </a></div>
        </td>
    </tr>
    </table>
    </div>
    <div class="dash-body">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
            <tr>
                <td width="13%">
                    <a href="teachers.php"><button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px">
                            <font class="tn-in-text">الرجوع</font>
                        </button></a>
                </td>
                <td>

                    <form action="" method="post" class="header-search">

                        <input type="search" name="search" class="input-text header-searchbar" placeholder="ابحث حول اسم أستاذ أو بريده الالكتروني" list="teachers">&nbsp;&nbsp;

                        <?php
                        echo '<datalist id="teachers">';
                        $list11 = $database->query("select teacher_name, teacher_email from teacher;");

                        for ($y = 0; $y < $list11->num_rows; $y++) {
                            $row00 = $list11->fetch_assoc();
                            $d = $row00["teacher_name"];
                            $c = $row00["teacher_email"];
                            echo "<option value='$d'><br/>";
                            echo "<option value='$c'><br/>";
                        };

                        echo ' </datalist>';
                        ?>


                        <input type="Submit" value="ابحث" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        تاريخ اليوم
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php
                        date_default_timezone_set('Africa/Algiers');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                </td>


            </tr>

            <tr>
                <td colspan="2" style="padding-top:30px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">إضافة أستاذ جديد</p>
                </td>
                <td colspan="2">
                    <a href="?action=add&id=none&error=0" class="non-style-link"><button class="login-btn btn-primary btn button-icon" style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('../img/icons/add.svg');">إضافة أستاذ</font></button>
                    </a>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="padding-top:10px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">جميع الأساتذة (<?php echo $list11->num_rows; ?>)</p>
                </td>

            </tr>
            <?php
            if ($_POST) {
                $keyword = $_POST["search"];

                $sqlmain = "select * from teacher where teacher_email='$keyword' or teacher_name='$keyword' or teacher_name like '$keyword%' or teacher_name like '%$keyword' or teacher_name like '%$keyword%'";
            } else {
                $sqlmain = "select * from teacher order by teacher_id desc";
            }



            ?>

            <tr>
                <td colspan="4">
                    <center>
                        <div class="abc scroll">
                            <!-- //////////////////////////////********************************//////////////////////////////////// */ -->
                            <?php
                            // $page_url = "http://localhost/masjid/admin/teachers.php"; // Replace with the URL of your page

                            include 'Pagination.php';

                            $records_per_page = 1; // Replace with the desired number of records per page

                            // Display pagination links
                            $page_url = "http://localhost/masjid/admin/teachers.php"; // Replace with the URL of your page
                            // Instantiate the Pagination class


                            // Get the current page

                            // Calculate the offset for SQL query


                            // Execute the modified query
                            $result = $database->query($sqlmain);
                            $pagination = new Pagination($result->num_rows, $records_per_page);
                            $current_page = $pagination->getCurrentPage();
                            $offset = ($current_page - 1) * $records_per_page;
                            $sqlmain = $sqlmain . " LIMIT $offset, $records_per_page";
                            // Display the table
                            echo '<table width="93%" class="sub-table scrolldown pagination" border="0">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th class="table-headin">اسم الأستاذ</th>';
                            echo '<th class="table-headin">البريد الالكتروني</th>';
                            echo '<th class="table-headin">رقم الهاتف</th>';
                            echo '<th class="table-headin">عنوان المنزل</th>';
                            echo '<th class="table-headin">تعديل / حذف</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            if ($result->num_rows == 0) {
                                echo '<tr>';
                                echo '<td colspan="4">';
                                echo '<br><br><br><br>';
                                echo '<center>';
                                echo '<img src="../img/notfound.svg" width="25%">';
                                echo '<br>';
                                echo '<p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">! لم نستطع إيجاد أي شئ متعلق بكلمة بحثك</p>';
                                echo '<a class="non-style-link" href="teachers.php"><button class="login-btn btn-primary-soft btn" style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; أظهر جميع الأساتذة &nbsp;</font></button></a>';
                                echo '</center>';
                                echo '<br><br><br><br>';
                                echo '</td>';
                                echo '</tr>';
                            } else {
                                $starting_record = ($current_page - 1) * $records_per_page;
                                $ending_record = $starting_record + $records_per_page - 1;

                                // Move the result pointer to the starting record
                                $result->data_seek($starting_record);

                                for ($x = $starting_record; $x <= $ending_record && $row = $result->fetch_assoc(); $x++) {

                                    $teacher_id = $row["teacher_id"];
                                    $teacher_name = $row["teacher_name"];
                                    $teacher_email = $row["teacher_email"];
                                    $teacher_homeaddress = $row["teacher_homeaddress"];
                                    $teacher_phone = $row["teacher_phone"];
                                    echo '<tr>';
                                    echo '<td>' . substr($teacher_name, 0, 30) . '</td>';
                                    echo '<td>' . substr($teacher_email, 0, 20) . '</td>';
                                    echo '<td>' . substr($teacher_phone, 0, 20) . '</td>';
                                    echo '<td>' . substr($teacher_homeaddress, 0, 20) . '</td>';
                                    echo '<td>';
                                    echo '<div style="display:flex;justify-content: center;">';
                                    echo '<a href="?action=edit&id=' . $teacher_id . '&error=0" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-edit" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">تعديل</font></button></a>';
                                    echo '&nbsp;&nbsp;&nbsp;';
                                    echo '<a href="?action=view&id=' . $teacher_id . '" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-view" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">رؤية</font></button></a>';
                                    echo '&nbsp;&nbsp;&nbsp;';
                                    echo '<a href="?action=drop&id=' . $teacher_id . '&name=' . $teacher_name . '" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">حذف</font></button></a>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }

                            echo '</tbody>';
                            echo '</table>';

                            // Display pagination links
                            $page_url = $_SERVER['PHP_SELF']; // Change this to the URL of the page
                            echo '<div class="pagination-links">';
                            echo $pagination->getPreviousLink($page_url);
                            echo $pagination->getPaginationLinks($page_url);
                            echo $pagination->getNextLink($page_url);
                            echo '</div>';
                            ?>


                        </div>
    </div>
    <?php
    if (isset($_GET["id"]) && isset($_GET["action"])) {
        $teacher_id = $_GET["id"];
        $action = $_GET["action"];
    } else {
        $teacher_id = 0; // or any default value you want
        $action = "";
    }



    if ($action == 'drop') {
        $nameget = $_GET["name"];
        echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>هل أنت متأكد ؟</h2>
                        <a class="close" href="teachers.php">&times;</a>
                        <div class="content">
                            أنت تريد أن تحذف هذا الأستاذ
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-teacher.php?id=' . $teacher_id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;نعم&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="teachers.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;لا&nbsp;&nbsp;</font></button></a>

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
        $teacher_homeaddress = $row['teacher_homeaddress'];
        $teacher_phone = $row['teacher_phone'];

        $teacher_job = $row["teacher_job"];
        $job_result = $database->query("select job_name from jobs where job_id='$teacher_job'");
        $job_array = $job_result->fetch_assoc();
        $job_name = $job_array["job_name"];

        $teacher_educationallevel = $row["teacher_educationallevel"];
        $educationallevel_result = $database->query("select educationallevel_name from educationallevel where educationallevel_id='$teacher_educationallevel'");
        $educationallevel_array = $educationallevel_result->fetch_assoc();
        $educationallevel_name = $educationallevel_array["educationallevel_name"];

        $teacher_scholaryear = $row["teacher_scholaryear"];
        $scholaryear_result = $database->query("select scholaryear_name from scholaryear where scholaryear_id='$teacher_scholaryear'");
        $scholaryear_array = $scholaryear_result->fetch_assoc();
        $scholaryear_name = $scholaryear_array["scholaryear_name"];

        $teacher_class = $row["teacher_class"];
        $class_result = $database->query("select class_name from class where class_id='$teacher_class'");
        $class_array = $class_result->fetch_assoc();
        $class_name = $class_array["class_name"];



        echo '
            <div id="popup1" class="overlay" >
                    <div class="popup" style="overflow-y: scroll;
                    max-height: 600px;">
                    <center>
                        <h2></h2>
                        <a class="close" href="teachers.php">&times;</a>
                        <div class="content">
                            أشبال الفتح <br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">المزيد حول الأستاذ</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="teacher_name" class="form-label">:الاسم </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $teacher_name . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_email" class="form-label">:البريد الالكنروني </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $teacher_email . '<br><br>
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="teacher_phone" class="form-label">:رقم الهاتف </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                            ' . $teacher_phone . '<br><br>
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
                                    <label for="teacher_job" class="form-label">:المهنة </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $job_name . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_job" class="form-label">:المستوى التعليمي</label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $educationallevel_name . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_job" class="form-label">:السنة الدراسية</label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $scholaryear_name . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_job" class="form-label">:القسم</label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $class_name . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="teachers.php"><input type="button" value="حسنا" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
    } elseif ($action == 'add') {
        $error_1 = $_GET["error"];
        $errorlist = array(
            '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">هناك مسبقا حساب لهذا البريد الالكتروني</label>',
            '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">  خطأ في تأكيد كلمة السر! الرجاء إعادة تأكيد كلمة السر</label>',
            '3' => "",
            '4' => "",
            '0' => '',

        );
        if ($error_1 != '4') {
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                        <a class="close" href="teachers.php">&times;</a> 
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
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">إضافة أستاذ جديد</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                <form  action="add-teacher.php" method="POST" class="add-new-form" name="addTeacherForm" >
                                <td class="label-td" colspan="2">
                                    <label for="teacher_name" class="form-label">الاسم: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="teacher_name" id="teacher_name" class="input-text" placeholder="اسم الأستاذ" required><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_email" class="form-label">البريد الالكتروني: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="email" name="teacher_email" id="teacher_email" class="input-text" placeholder="البريد الالكتروني" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_homeaddress" class="form-label">عنوان المنزل: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="teacher_homeaddress" id="teacher_homeaddress" class="input-text" placeholder="عنوان المنزل" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_phone" class="form-label">رقم الهاتف: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="tel" name="teacher_phone" id="teacher_phone" class="input-text" placeholder="رقم الهاتف" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_job" class="form-label">اختر مهنة: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                                <select name="teacher_job" id="teacher_job" class="box" >';


            $list11 = $database->query("select  * from  jobs order by job_id asc;");

            for ($y = 0; $y < $list11->num_rows; $y++) {
                $row00 = $list11->fetch_assoc();
                $jobn = $row00["job_name"];
                $id00 = $row00["job_id"];
                echo "<option value=" . $id00 . ">$jobn</option><br/>";
            };


            echo     '       </select><br><br>
                            </td>
                        </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_educationallevel" class="form-label">اختر الطور التعليمي: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="teacher_educationallevel" id="teacher_educationallevel" class="box" >';


            $list12 = $database->query("select  * from  educationallevel order by educationallevel_id asc;");

            for ($y = 0; $y < $list12->num_rows; $y++) {
                $row01 = $list12->fetch_assoc();
                $edul = $row01["educationallevel_name"];
                $id01 = $row01["educationallevel_id"];
                echo "<option value=" . $id01 . ">$edul</option><br/>";
            };




            echo     '       </select><br><br>
                                </td>
                            </tr>

                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="teacher_scholaryear" class="form-label">اختر السنة الدراسية: </label>
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <select name="teacher_scholaryear" id="teacher_scholaryear" class="box" >';


            $list13 = $database->query("select  * from  scholaryear order by scholaryear_id asc;");

            for ($y = 0; $y < $list13->num_rows; $y++) {
                $row02 = $list13->fetch_assoc();
                $schy = $row02["scholaryear_name"];
                $id02 = $row02["scholaryear_id"];
                echo "<option value=" . $id02 . ">$schy</option><br/>";
            };




            echo     '       </select><br><br>
                            </td>
                        </tr>

                        <tr>
                        <td class="label-td" colspan="2">
                            <label for="teacher_class" class="form-label">:اختر القسم </label>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <select name="teacher_class" id="teacher_class" class="box" >';


            $list14 = $database->query("select  * from  class  order by class_id asc;");

            for ($y = 0; $y < $list14->num_rows; $y++) {
                $row03 = $list14->fetch_assoc();
                $class = $row03["class_name"];
                $id03 = $row03["class_id"];
                echo "<option value=" . $id03 . ">$class</option><br/>";
            };




            echo     '       </select><br><br>
                        </td>
                    </tr>
                            
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="teacher_password" class="form-label">كلمة السر: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="password" name="teacher_password" class="input-text" placeholder="أدخل كلمة سر" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="confirm_teacher_password" class="form-label">أكد كلمة السر: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="password" name="confirm_teacher_password" class="input-text" placeholder="أكد كلمة السر" required><br>
                                </td>
                            </tr>
                            
                
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="أعد ملأ الصفحة" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="أضف" class="login-btn btn-primary btn">
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
                                <h2>تم إضافة أستاذ جديد بنجاح !</h2>
                                <a class="close" href="teachers.php">&times;</a>
                                <div class="content">
                                    
                                    
                                </div>
                                <div style="display: flex;justify-content: center;">
                                
                                <a href="teachers.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;حسنا&nbsp;&nbsp;</font></button></a>

                                </div>
                                <br><br>
                            </center>
                    </div>
                    </div>
        ';
        }
    } elseif ($action == 'edit') {
        $sqlmain = "select * from teacher where teacher_id='$teacher_id'";
        $result = $database->query($sqlmain);
        $row = $result->fetch_assoc();
        $teacher_name = $row["teacher_name"];
        $teacher_email = $row["teacher_email"];
        $teacher_homeaddress = $row['teacher_homeaddress'];
        $teacher_phone = $row["teacher_phone"];
        $teacher_password = $row["teacher_password"];

        $teacher_job = $row["teacher_job"];
        $job_result = $database->query("select job_name from jobs where job_id='$teacher_job'");
        $job_array = $job_result->fetch_assoc();
        $job_name = $job_array["job_name"];

        $teacher_educationallevel = $row["teacher_educationallevel"];
        $educationallevel_result = $database->query("select educationallevel_name from educationallevel where educationallevel_id='$teacher_educationallevel'");
        $educationallevel_array = $educationallevel_result->fetch_assoc();
        $educationallevel_name = $educationallevel_array["educationallevel_name"];

        $teacher_scholaryear = $row["teacher_scholaryear"];
        $scholaryear_result = $database->query("select scholaryear_name from scholaryear where scholaryear_id='$teacher_scholaryear'");
        $scholaryear_array = $scholaryear_result->fetch_assoc();
        $scholaryear_name = $scholaryear_array["scholaryear_name"];

        $teacher_class = $row["teacher_class"];
        $class_result = $database->query("select class_name from class where class_id='$teacher_class'");
        $class_array = $class_result->fetch_assoc();
        $class_name = $class_array["class_name"];


        $error_1 = $_GET["error"];
        $errorlist = array(
            '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">هناك مسبقا حساب لهذا البريد الالكتروني</label>',
            '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">خطأ في تأكيد كلمة السر! الرجاء إعادة تأكيد كلمة السر</label>',
            '3' => '',
            '4' => "",
            '0' => '',

        );

        if ($error_1 != '4') {
            echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            
                                <a class="close" href="teachers.php">&times;</a> 
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
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">تعديل معلومات الأستاذ</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <form action="edit-teacher.php" method="POST" class="add-new-form">
                                            <label for="teacher_email" class="form-label">:البريد الالكتروني </label>
                                            <input type="hidden" value="' . $teacher_id . '" name="teacher_id">
                                            <input type="hidden" name="oldemail" value="' . $teacher_email . '" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                        <input type="email" name="teacher_email" class="input-text" placeholder="البريد الالكتروني" value="' . $teacher_email . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_name" class="form-label">:الاسم </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="teacher_name" class="input-text" placeholder="اسم الأستاذ" value="' . $teacher_name . '" required><br>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_homeaddress" class="form-label">عنوان المنزل </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="teacher_homeaddress" class="input-text" placeholder="عنوان المنزل" value="' . $teacher_homeaddress . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_phone" class="form-label">:رقم الهاتف </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="tel" name="teacher_phone" class="input-text" placeholder="رقم الهاتف" value="' . $teacher_phone . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_job" class="form-label">:اختر مهنة</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <select name="teacher_job" value="' . $teacher_job . '" id="" class="box">';


            $list11 = $database->query("select * from  jobs;");

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
                                    <label for="teacher_educationallevel" class="form-label">اختر الطور التعليمي: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="teacher_educationallevel" value="' . $teacher_educationallevel . '" id="" class="box" >';


            $list12 = $database->query("select  * from  educationallevel order by educationallevel_id asc;");

            for ($y = 0; $y < $list12->num_rows; $y++) {
                $row01 = $list12->fetch_assoc();
                $edul = $row01["educationallevel_name"];
                $id01 = $row01["educationallevel_id"];
                echo "<option value=" . $id01 . ">$edul</option><br/>";
            };




            echo     '       </select><br><br>
                                </td>
                            </tr>

                            

                            <tr>
                            <td class="label-td" colspan="2">
                                <label for="teacher_scholaryear" class="form-label">اختر السنة الدراسية: </label>
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <select name="teacher_scholaryear" value="' . $teacher_scholaryear . '" id="" class="box" >';


            $list13 = $database->query("select  * from  scholaryear order by scholaryear_id asc;");

            for ($y = 0; $y < $list13->num_rows; $y++) {
                $row02 = $list13->fetch_assoc();
                $schy = $row02["scholaryear_name"];
                $id02 = $row02["scholaryear_id"];
                echo "<option value=" . $id02 . ">$schy</option><br/>";
            };




            echo     '       </select><br><br>
                            </td>
                        </tr>

                        <tr>
                        <td class="label-td" colspan="2">
                            <label for="teacher_class" class="form-label">:اختر القسم </label>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <select name="teacher_class" value="' . $teacher_class . '" id="" class="box" >';


            $list14 = $database->query("select  * from  class order by class_id asc;");

            for ($y = 0; $y < $list14->num_rows; $y++) {
                $row03 = $list14->fetch_assoc();
                $class = $row03["class_name"];
                $id03 = $row03["class_id"];
                echo "<option value=" . $id03 . ">$class</option><br/>";
            };




            echo     '       </select><br><br>
                        </td>
                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="teacher_password" class="form-label">:كلمة السر </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="teacher_password" class="input-text" placeholder=":أدخل كلمة سر" required><br>
                                        </td>
                                    </tr><tr>
                                        <td class="label-td" colspan="2">
                                            <label for="confirm_teacher_password" class="form-label">:تأكيد كلمة السر </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="confirm_teacher_password" class="input-text" placeholder="أكد كلمة السر" required><br>
                                        </td>
                                    </tr>
                                    
                        
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="أعد ملأ الصفحة" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
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
                            <a class="close" href="teachers.php">&times;</a>
                            <div class="content">
                                
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="teachers.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;حسنا&nbsp;&nbsp;</font></button></a>

                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';
        };
    };




    ?>
    </div>

</body>

</html>