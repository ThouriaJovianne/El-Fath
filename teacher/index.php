<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/admin.css">

    <title>الأستاذ</title>
    <style>
        .dashbord-tables,
        .doctor-heade {
            animation: transitionIn-Y-over 0.5s;
        }

        .filter-container {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .sub-table,
        #anim {
            animation: transitionIn-Y-bottom 0.5s;
        }

        .doctor-heade {
            animation: transitionIn-Y-over 0.5s;
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


    include("../connection.php");
    $userrow = $database->query("select * from teacher where teacher_email='$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userid = $userfetch["teacher_id"];
    $username = $userfetch["teacher_name"];


    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">


            <?php include("profile.php"); ?>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div>
                                <p class="menu-text">الرئيسية</p>
                        </a>
                    </div></a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-icon-patient">
                        <a href="student.php" class="non-style-link-menu">
                            <div>
                            <p class="menu-text">طلابي</p>
                            </a>
                            </div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-schedule">
                        <a href="assignment.php" class="non-style-link-menu">
                            <div>
                            <p class="menu-text">الواجبات المنزلية لطلابي</p>
                        </a></div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text">الإعدادات</p>
                        </a></div>
                    </td>
                </tr>

    </table>
    </div>
    <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

            <tr>

                <td colspan="1" class="nav-bar">
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;"> الرئيسية</p>

                </td>
                <td width="25%">

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


                        $studentrow = $database->query("select  * from  student where student_teacher = $userid;");
                        $teacherrow = $database->query("select  * from  teacher;");
                        $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                        $assignmentrow = $database->query("select  * from  assignment where assignment_enddate='$today';");


                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img
                            src="../img/calendar.svg" width="100%"></button>
                </td>


            </tr>
            <tr>
                <td colspan="4">

                    <center>
                        <table class="filter-container doctor-header" style="border: none;width:95%" border="0">
                            <tr>
                                <td>
                                    <h3>مرحبا بك </h3>
                                    <h1>
                                        <?php echo $username ?>
                                    </h1>
                                    <p>شكرا على ثقتكم بنا<br>
                                        .بإمكانك رؤية جميع طلبة قسمك , تعديل في دفتر المتابعة لكل طالب
                                        <br><br>
                                    </p>
                                    <a href="student.php" class="non-style-link"><button class="btn-primary btn"
                                            style="width:30%">إظهار جميع طلابي</button></a>
                                    <br>
                                    <br>
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
                                <td width=" 50%">






                        <center>
                            <table class="filter-container" style="border: none;" border="0">
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 20px;font-weight:600;padding-left: 12px;">المستجدات</p>
                                    </td>
                                </tr>
                                <tr>

                                    <td style="width: 25%;">
                                        <div class="dashboard-items"
                                            style="padding:20px;margin:auto;width:95%;display: flex;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php echo $studentrow->num_rows ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    عدد طلابي&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons"
                                                style="background-image: url('../img/icons/patients-hover.svg');"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>




                                </tr>
                            </table>
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