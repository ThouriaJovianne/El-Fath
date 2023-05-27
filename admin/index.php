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

    <title>الصفحة الرئيسية: مشرف عام</title>
    <style>
        .dashbord-tables {
            animation: transitionIn-Y-over 0.5s;
        }

        .filter-container {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
                    <td class="menu-item">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div class="menu-content">
                                <i class="fas fa-th-large"></i>
                                <p class="menu-text">الرئيسية</p>
                            </div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-item">
                        <a href="teachers.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-person-chalkboard"></i>
                                <p class="menu-text">الأساتذة</p>
                            </div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-item">
                        <a href="students.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p class="menu-text">الطلاب</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-item">
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
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

                <tr>

                    <td colspan="2" class="nav-bar">

                        <form action="teachers.php" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="ابحث عن اسم أستاذ أو بريده الالكتروني" list="teachers">&nbsp;&nbsp;

                            <?php
                            echo '<datalist id="teachers">';
                            $list11 = $database->query("select  teacher_name,teacher_email from  teacher;");

                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $d = $row00["teacher_name"];
                                $c = $row00["teacher_email"];
                                echo "<option value='$d'><br/>";
                                echo "<option value='$c'><br/>";
                            };

                            echo ' </datalist>';
                            ?>


                            <input type="Submit" value="ابحث" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                        </form>

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


                            $patientrow = $database->query("select  * from  student;");
                            $doctorrow = $database->query("select  * from teacher;");
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
                                        <p style="font-size: 20px;font-weight:600;padding-left: 12px;">مستجدات المدرسة القرآنية</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $doctorrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    أساتذة&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                                        </div>
                                    </td>
                                    <td style="width: 50%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $patientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    طالب &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                        </div>
                                    </td>



                                </tr>
                            </table>
                        </center>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <table width="100%" border="0" class="dashbord-tables">
                            <tr>
                                <td>
                                    <p style="padding:10px;padding-left:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                        أحدث الأساتذة المسجلين
                                    </p>
                                    <p style="padding-bottom:19px;padding-left:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                        هنا وصول سريع إلى أحدث الأساتذة المسجلين في المدرسة القرآنية لميجد الفتح<br>
                                        يمكنك إضافة, تعديل أو حذف طالب من قاعدة البيانات من حلال زيارتك لصفحة @الطلبة
                                    </p>

                                </td>
                                <td>
                                    <p style="text-align:right;padding:10px;padding-right:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                        أحدث الطلاب المسجلين
                                    </p>
                                    <p style="padding-bottom:19px;text-align:right;padding-right:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                        هنا وصول سريع إلى أحدث الطلبة المسجلين في المدرسة القرآنية لميجد الفتح<br>
                                        يمكنك إضافة, تعديل أو حذف طالب من قاعدة البيانات من حلال زيارتك لصفحة @الطلاب
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <center>
                                        <div class="abc scroll" style="height: 200px;">
                                            <table width="85%" class="sub-table scrolldown" border="0">
                                                <thead>
                                                    <tr>
                                                        <th class="table-headin">

                                                            اسم الأستاذ

                                                        </th>
                                                        <th class="table-headin">

                                                            البريد الالكتروني للأستاذ

                                                        </th>
                                                        <th class="table-headin">


                                                            الطور التدريسي

                                                        </th>
                                                        <th class="table-headin">


                                                            القسم

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $nextweek = date("Y-m-d", strtotime("+1 week"));
                                                    $sqlmain = "select appointment.appoid,schedule.scheduleid,schedule.title,teacher.teacher_name,student.student_name,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join student on student.student_id=appointment.pid inner join teacher on schedule.docid=teacher.teacher_id  where schedule.scheduledate>='$today'  and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc";

                                                    $result = $database->query($sqlmain);

                                                    if ($result->num_rows == 0) {
                                                        echo '<tr>
                                                    <td colspan="3">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    } else {
                                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                                            $row = $result->fetch_assoc();
                                                            $appoid = $row["appoid"];
                                                            $scheduleid = $row["scheduleid"];
                                                            $title = $row["title"];
                                                            $teacher_name = $row["teacher_name"];
                                                            $scheduledate = $row["scheduledate"];
                                                            $scheduletime = $row["scheduletime"];
                                                            $student_name = $row["student_name"];
                                                            $apponum = $row["apponum"];
                                                            $appodate = $row["appodate"];
                                                            echo '<tr>


                                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);padding:20px;">
                                                            ' . $apponum . '
                                                            
                                                        </td>

                                                        <td style="font-weight:600;"> &nbsp;' .

                                                                substr($pname, 0, 25)
                                                                . '</td >
                                                        <td style="font-weight:600;"> &nbsp;' .

                                                                substr($docname, 0, 25)
                                                                . '</td >
                                                           
                                                        
                                                        <td>
                                                        ' . substr($title, 0, 15) . '
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
                                <td width="50%" style="padding: 0;">
                                    <center>
                                        <div class="abc scroll" style="height: 200px;padding: 0;margin: 0;">
                                            <table width="85%" class="sub-table scrolldown" border="0">
                                                <thead>
                                                    <tr>
                                                        <th class="table-headin">


                                                            اسم الطالب

                                                        </th>

                                                        <th class="table-headin">

                                                            البريد الالكتروني للطالب

                                                        </th>
                                                        <th class="table-headin">

                                                            الطور الدراسي

                                                        </th>

                                                        <th class="table-headin">

                                                            القسم
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $nextweek = date("Y-m-d", strtotime("+1 week"));
                                                    $sqlmain = "select schedule.scheduleid,schedule.title,teacher.teacher_name,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join teacher on schedule.docid=teacher.teacher_id  where schedule.scheduledate>='$today' and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc";
                                                    $result = $database->query($sqlmain);

                                                    if ($result->num_rows == 0) {
                                                        echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                    } else {
                                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                                            $row = $result->fetch_assoc();
                                                            $scheduleid = $row["scheduleid"];
                                                            $title = $row["title"];
                                                            $docname = $row["docname"];
                                                            $scheduledate = $row["scheduledate"];
                                                            $scheduletime = $row["scheduletime"];
                                                            $nop = $row["nop"];
                                                            echo '<tr>
                                                        <td style="padding:20px;"> &nbsp;' .
                                                                substr($title, 0, 30)
                                                                . '</td>
                                                        <td>
                                                        ' . substr($docname, 0, 20) . '
                                                        </td>
                                                        <td style="text-align:center;">
                                                            ' . substr($scheduledate, 0, 10) . ' ' . substr($scheduletime, 0, 5) . '
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
                            <tr>
                                <td>
                                    <center>
                                        <a href="teachers.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">أظهر جميع الأساتذة</button></a>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="students.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">أظهر جميع الطلبة</button></a>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
            </center>
            </td>
            </tr>
            </table>
        </div>
    </div>


</body>

</html>