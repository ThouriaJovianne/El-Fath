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
    <link rel="stylesheet" href="../css/icons.css">
        
    <title>الواجبات المنزلية</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
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
    $useremail = $userfetch["teacher_email"];

    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
            <?php include("profile.php"); ?>

            <tr class="menu-row">
            <td class="menu-btn">
                        <a href="index.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fas fa-th-large"></i>
                                <p class="menu-text"> الرئيسية</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="student.php" class="non-style-link-menu">
                            <div class="menu-content">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p class="menu-text">طلابي</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="assignment.php" class="non-style-link-menu non-style-link-menu-active">
                            <div class="menu-content">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p class="menu-text">الواجبات المنزلية</p>
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
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                <?php include("back.php") ?>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">الواجبات المنزلية لطلابي</p>
                                           
                    </td>
                    <td width="15%">
                        <?php 
                        include("../date.php");
                        $list110 = $database->query("select  * from  assignment;");
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <tr>
                    <td colspan="4" >
                        <div style="display: flex;margin-top: 40px;">

                        <a href="?action=add-assignment&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('../img/icons/add.svg');">أضف واجب منزلي</font></button>
                        </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">جميع الواجبات المنزلية (<?php echo $list110->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <!-- <td width="5%" style="text-align: center;">
                        Date:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                        <td width="5%" style="text-align: center;">
                        Doctor:
                        </td>
                        <td width="30%">
                        <select name="docid" id="" class="box filter-container-items" style="width:90% ;height: 37px;margin: 0;" >
                            <option value="" disabled selected hidden>Choose Doctor Name from the list</option><br/>
                                
                            <?php 
                            
                                // $list11 = $database->query("select  * from teacher order by teacher_name asc;");

                                // for ($y=0;$y<$list11->num_rows;$y++){
                                //     $row00=$list11->fetch_assoc();
                                //     $sn=$row00["teacher_name"];
                                //     $id00=$row00["teacher_id"];
                                //     echo "<option value=".$id00.">$sn</option><br/>";
                                // };


                                ?>

                        </select>
                    </td> -->
                    <!-- <td width="12%">
                        <input type="submit"  name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                    </tr>
                            </table>

                        </center>
                    </td> -->
                    
                </tr>
                
                <?php
                    if($_POST){
                        $sqlpt1="";
                        if(!empty($_POST["sheduledate"])){
                            $sheduledate=$_POST["sheduledate"];
                            $sqlpt1=" assignment.assignment_startdate='$sheduledate' ";
                        }


                        $sqlpt2="";
                        if(!empty($_POST["teacher_id"])){
                            $docid=$_POST["teacher_id"];
                            $sqlpt2=" teacher.teacher_id=$docid ";
                        }

                        $sqlmain= "select assignment.assignment_id,assignment.title,student.student_name,assignment.assignment_startdate,assignment.assignment_enddate from assignment inner join doctor on assignment.student_id=student.student_id ";
                        $sqllist=array($sqlpt1,$sqlpt2);
                        $sqlkeywords=array(" where "," and ");
                        $key2=0;
                        foreach($sqllist as $key){

                            if(!empty($key)){
                                $sqlmain.=$sqlkeywords[$key2].$key;
                                $key2++;
                            };
                        };
                        //echo $sqlmain;

                        
                        
                        //
                    }else{
                        $sqlmain= "select assignment.assignment_id, assignment.assignment_title, student.student_name, assignment.assignment_startdate, assignment.assignment_enddate from assignment inner join student on assignment.student_id=student.student_id  order by assignment.assignment_startdate desc";

                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">

                        <div class="abc scroll">

                        <?php
                            // $page_url = "http://localhost/masjid/admin/teachers.php"; // Replace with the URL of your page

                            include '../Pagination.php';

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
                            echo '<table width="93%" class="sub-table scrolldown pagination" border="0">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th class="table-headin">رقم الواجب المنزلي </th>';
                            echo '<th class="table-headin">  الطالب</th>';
                            echo '<th class="table-headin"> تاريخ وضع الواجب</th>';
                            echo '<th class="table-headin">  تاريخ استلام الواجب</th>';
                            echo '<th class="table-headin">الأحداث </th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                          
                                    
                                
                            
          
                                
                                
                            if($result->num_rows==0){
                                echo '<tr>
                                <td colspan="4">
                                <br><br><br><br>
                                <center>
                                <img src="../img/notfound.svg" width="25%">
                                
                                <br>
                                <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)"> !لم نستطع إيجاد أي شيء متعلق بكلمة بحثك</p>
                                <a class="non-style-link" href="assignment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; أظهر جميع الواجبات المنزلية &nbsp;</font></button>
                                </a>
                                </center>
                                <br><br><br><br>
                                </td>
                                </tr>';
                                
                            }
                            else{
                            for ( $x=0; $x<$result->num_rows;$x++){
                                $row=$result->fetch_assoc();
                                $assignment_id=$row["assignment_id"];
                                $title=$row["assignment_title"];
                                $student_name=$row["student_name"];
                                $assignment_startdate=$row["assignment_startdate"];
                                $assignment_enddate=$row["assignment_enddate"];
                               
                                echo '<tr>
                                    <td> &nbsp;'.
                                    substr($title,0,30)
                                    .'</td>
                                    <td>
                                    '.substr($student_name,0,20).'
                                    </td>
                                    <td style="text-align:center;">
                                        '.substr($assignment_startdate,0,10).' 
                                    </td>
                                    <td style="text-align:center;">
                                        '.substr($assignment_enddate,0,10).'
                                    </td>

                                    <td>
                                    <div style="display:flex;justify-content: center;">
                                    
                                    <a href="?action=view&id='.$assignment_id.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">إظهار</font></button></a>
                                   &nbsp;&nbsp;&nbsp;
                                   <a href="?action=drop&id='.$assignment_id.'&name='.$title.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">إلغاء</font></button></a>
                                    </div>
                                    </td>
                                </tr>';
                                
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

                        <?php // *************************** pagination changes ?>
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                رقم الواجب المنزلي
                                
                                </th>
                                
                                <th class="table-headin">
                                    الطالب
                                </th>
                                <th class="table-headin">
                                    
                                    تاريخ وضع الواجب
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    تاريخ استلام الواجب
                                    
                                </th>
                                
                                <th class="table-headin">
                                    
                                    الأحداث
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                          

                                

 
                            </tbody>

                        </table>
                        </div>
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
        if($action=='add-assignment'){

            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                    
                        <a class="close" href="assignment.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2">'.
                                   ""
                                
                                .'</td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">أضف واجب منزلي جديد</p><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <form action="add-assignment.php" method="POST" class="add-new-form">
                                    <label for="title" class="form-label">: عنوان الواجب المنزلي </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="title" class="input-text" placeholder=" أدخل عنوان هذا الواجب المنزلي" required><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="student_id" class="form-label">: اختر الطالب المكلف بهذا الواجب المنزلي </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="student_id" id="" class="box" >
                                    <option value="" disabled selected hidden>اختر طالبا من هذه القائمة</option><br/>';
                                        
        
                                        $list11 = $database->query("select * from student where student_teacher=$userid order by student_name asc;");
                                        // $sqlmain= "select assignment.assignment_id,assignment.title,student.student_name,assignment.assignment_startdate,assignment.assignment_enddate from assignment inner join doctor on assignment.student_id=student.student_id ";
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $sn=$row00["student_name"];
                                            $id00=$row00["student_id"];
                                            echo "<option value=".$id00.">$sn</option><br/>";
                                        };
        
        
        
                                        
                        echo     '       </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="student_id" class="form-label">:من السورة</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <select name="student_id" id="" class="box" >
                                <option value="" disabled selected hidden>اختر سورة من هذه القائمة</option><br/>';
                                    
                                    
                                    $list11 = $database->query("select * from surah order by surah_id asc;");
                                    // $sqlmain= "select assignment.assignment_id,assignment.title,student.student_name,assignment.assignment_startdate,assignment.assignment_enddate from assignment inner join doctor on assignment.student_id=student.student_id ";
                                    for ($y=0;$y<$list11->num_rows;$y++){
                                        $row00=$list11->fetch_assoc();
                                        $sn=$row00["surah_name"];
                                        $id00=$row00["surah_id"];
                                        echo "<option value=".$id00.">$sn</option><br/>";
                                    };
    
                                    
    
                                    
                    echo     '       </select><br><br>
                            </td>
                        </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="student_id" class="form-label">:من الآية</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="student_id" id="" class="box" >
                                    <option value="" disabled selected hidden>اختر آية من هذه القائمة</option><br/>';
                                        
        
                                        //$list11 = $database->query("select * from surah order by surah_id asc;");
                                        // $sqlmain= "select assignment.assignment_id,assignment.title,student.student_name,assignment.assignment_startdate,assignment.assignment_enddate from assignment inner join doctor on assignment.student_id=student.student_id ";
                                        for ($y=0;$y<256;$y++){

                                            echo "<option value=".$y.">$y</option><br/>";
                                        };
        
        
        
                                        
                        echo     '       </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                            <td class="label-td" colspan="2">
                                <label for="student_id" class="form-label">:إلى السورة</label>
                            </td>
                        </tr>
                        <tr>
                            <td class="label-td" colspan="2">
                                <select name="student_id" id="" class="box" >
                                <option value="" disabled selected hidden>اختر سورة من هذه القائمة</option><br/>';
                                    
    
                                $list11 = $database->query("select * from surah order by surah_id asc;");
                                // $sqlmain= "select assignment.assignment_id,assignment.title,student.student_name,assignment.assignment_startdate,assignment.assignment_enddate from assignment inner join doctor on assignment.student_id=student.student_id ";
                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $sn=$row00["surah_name"];
                                    $id00=$row00["surah_id"];
                                    echo "<option value=".$id00.">$sn</option><br/>";
                                };
    
    
    
                                    
                    echo     '       </select><br><br>
                            </td>
                        </tr>

                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="student_id" class="form-label">: إلى الآية</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="student_id" id="" class="box" >
                                    <option value="" disabled selected hidden>اختر آية من هذه القائمة</option><br/>';
                                        
        
                                    for ($y=0;$y<256;$y++){

                                        echo "<option value=".$y.">$y</option><br/>";
                                    };
        
        
        
                                        
                        echo     '       </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="startdate" class="form-label">: تاريخ إعلان الواجب المنزلي</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="startdate" class="input-text" min="'.date('Y-m-d').'" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="enddate" class="form-label">: آخر أجل لاستلام الواجب المنزلي</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="enddate" class="input-text" min="'.date('Y-m-d').'" required><br>
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="أعد ملإ الصفحة" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="assignment.php"><input type="button" value="إلغاء" class="login-btn btn-primary-soft btn" ></a>
                                    <input type="submit" value="أضف" class="login-btn btn-primary btn" name="shedulesubmit">
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
        }elseif($action=='assignment-added'){
            $titleget=$_GET["title"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>تمت إضافة الواجب المنزلي بنجاح</h2>
                        <a class="close" href="assignment.php">&times;</a>
                        <div class="content"> تمت إضافة "  
                        ' .substr($titleget,0,40).' "<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="assignment.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;حسنا&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='drop'){
            $nameget=$_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>هل أنت متأكد ؟</h2>
                        <a class="close" href="assignment.php">&times;</a>
                        <div class="content">
                            أنت على وشك حذف هذا الواجب المنزلي<br>('.substr($nameget,0,40).').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-assignment.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;نعم&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="assignment.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;لا&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            '; 
        }elseif($action=='view'){
            $sqlmain= "select assignment.assignment_id, assignment.title, student.student_name, assignment.assignment_startdate, assignment.assignment_enddate from assignment inner join student on assignment.student_id=student.student_id  where  assignment.assignment_id=$id";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $student_name=$row["student_name"];
            $assignment_id=$row["assignment_id"];
            $title=$row["title"];
            $assignment_startdate=$row["assignment_startdate"];
            $assignment_enddate=$row["assignment_enddate"];


            $sqlmain12= "select * from appointment inner join patient on patient.pid=appointment.pid inner join assignment on assignment.assignment_id=appointment.assignment_id where assignment.assignment_id=$id;";
            $result12= $database->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href=assignment.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">إظهار التفاصيل</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">: عنوان الواجب المنزلي </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$title.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">: الطالب المكلف بهذا الواجب المنزلي </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$student_name.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">: تاريخ إعلان الواجب المنزلي</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$student_startdate.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">: آخر أجل لاستلام الواجب المنزلي</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$student_enddate.'<br><br>
                                </td>
                            </tr>

                            
                            <tr>
                            <td colspan="4">
                                <center>
                                 <div class="abc scroll">
                                 <table width="100%" class="sub-table scrolldown" border="0">
                                 <thead>
                                 <tr>   
                                        <th class="table-headin">
                                             الرقم التعريفي للطالب
                                         </th>
                                         <th class="table-headin">
                                             اسم ولقب الطالب
                                         </th>
                                         <th class="table-headin">
                                             
                                             Appointment number
                                             
                                         </th>
                                        
                                         
                                         <th class="table-headin">
                                             Patient Telephone
                                         </th>
                                         
                                 </thead>
                                 <tbody>';
                                 
                
                
                                         
                                         $result= $database->query($sqlmain12);
                
                                         if($result->num_rows==0){
                                             echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>
                                             <img src="../img/notfound.svg" width="25%">
                                             
                                             <br>
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">!لم نستطع إيجاد أي شيء متعلق بكلمة بحثك</p>
                                             <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                             </a>
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';
                                             
                                         }
                                         else{
                                         for ( $x=0; $x<$result->num_rows;$x++){
                                             $row=$result->fetch_assoc();
                                             $apponum=$row["apponum"];
                                             $pid=$row["pid"];
                                             $pname=$row["pname"];
                                             $ptel=$row["ptel"];
                                             
                                             echo '<tr style="text-align:center;">
                                                <td>
                                                '.substr($pid,0,15).'
                                                </td>
                                                 <td style="font-weight:600;padding:25px">'.
                                                 
                                                 substr($pname,0,25)
                                                 .'</td >
                                                 <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                                 '.$apponum.'
                                                 
                                                 </td>
                                                 <td>
                                                 '.substr($ptel,0,25).'
                                                 </td>
                                                 
                                                 
                
                                                 
                                             </tr>';
                                             
                                         }
                                     }
                                          
                                     
                
                                    echo '</tbody>
                
                                 </table>
                                 </div>
                                 </center>
                            </td> 
                         </tr>

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';  
    }
}
        
    ?>
    </div>

</body>
</html>