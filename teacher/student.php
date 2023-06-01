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
        
    <title>طلابي</title>
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

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    include("../connection.php");
    $userrow = $database->query("select * from teacher where teacher_email='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["teacher_id"];
    $username=$userfetch["teacher_name"];

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
                        <a href="student.php" class="non-style-link-menu non-style-link-menu-active">
                            <div class="menu-content">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p class="menu-text">طلابي</p>
                            </div>
                        </a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="assignment.php" class="non-style-link-menu">
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
        <?php       

                    $selecttype="My";
                    $current="My students Only";
                    if($_POST){

                        if(isset($_POST["search"])){
                            $keyword=$_POST["search12"];
                            
                            $sqlmain= "select * from student where student_email='$keyword' or student_name='$keyword' or student_name like '$keyword%' or student_name like '%$keyword' or student_name like '%$keyword%' ";
                            $selecttype="my";
                        }
                        
                        if(isset($_POST["filter"])){
                            if($_POST["showonly"]=='all'){
                                $sqlmain= "select * from student";
                                $selecttype="All";
                                $current="All students";
                            }else{
                                $sqlmain= "select * from student where student_teacher=$userid;";
                                $selecttype="My";
                                $current="My students Only";
                            }
                        }
                    }else{
                        $sqlmain= "select * from student where student_teacher=$userid;";
                        $selecttype="My";
                    }



                ?>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                <?php include("back.php") ?>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search12" class="input-text header-searchbar" placeholder="إبحث حول اسم الطالب او بريده الإلكتروني" list="students">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="students">';
                                $list11 = $database->query($sqlmain);
                               
                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["student_name"];
                                    $c=$row00["student_email"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
?>
                                                  
                            <input type="Submit" value="بحث" name="search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <!-- date showed -->
                    <td width="15%">
                        <?php include("../date.php");?>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <!-- number of students -->
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)"><?php echo "(".$list11->num_rows.") إجمالي الطلاب "; ?></p>
                    </td>
                    
                </tr>
            
                  
                <tr>
                   <td colspan="4">
                       <center>
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
                            echo '<th class="table-headin">اسم الطالب</th>';
                            echo '<th class="table-headin">البريد الالكتروني</th>';
                            echo '<th class="table-headin">رقم الهاتف</th>';
                            echo '<th class="table-headin">عنوان المنزل</th>';
                            echo '<th class="table-headin">الحفظ والمراجعة</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            if ($result->num_rows == 0) {
                                echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">! لم نتمكن من العثور على أي شيء يتعلق بكلمات بحثك</p>
                                    <a class="non-style-link" href="student.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; إظهار جميع التلاميذ &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                            } else {
                                $starting_record = ($current_page - 1) * $records_per_page;
                                $ending_record = $starting_record + $records_per_page - 1;

                                // Move the result pointer to the starting record
                                $result->data_seek($starting_record);
                                for ($x = $starting_record; $x <= $ending_record && $row = $result->fetch_assoc(); $x++) {
                                    $student_id = $row["student_id"];
                                    $_SESSION['student_id'] = $student_id;
                                    $student_name = $row["student_name"];
                                    $student_email = $row["student_email"];
                                    $student_homeaddress = $row["student_homeaddress"];
                                    $student_phone = $row["student_phone"];

                                    echo '<tr>
                                        <td> &nbsp;' .
                                        substr($student_name, 0, 35)
                                        . '</td>
                                        <td>
                                        ' . substr($student_email, 0, 12) . '
                                        </td>
                                        <td>
                                            ' . substr($student_phone, 0, 10) . '
                                        </td>
                                        <td>
                                        ' . substr($student_homeaddress, 0, 20) . '
                                         </td>
                                        <td >
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="Daftar-El-Mutaba3a/container.php" class="btn-primary-soft btn button-icon btn-edit"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;">
                                        
                                        <font class="tn-in-text">دفتر المتابعة</font>
                                       
                                        </a>
                                       
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
        </div>
        <?php

        ?>
    </div>

</body>

</html>

                        