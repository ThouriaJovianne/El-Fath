<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>طلابي</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
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
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">الرئيسية</p></a></div></a>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient menu-active menu-icon-patient-active">
                        <a href="student.php" class="non-style-link-menu  non-style-link-menu-active"><div><p class="menu-text">طلابي</p></a></div>
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
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings   ">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">الإعدادات</p></a></div>
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
                    <td width="13%">

                    <a href="student.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">رجوع</font></button></a>
                        
                    </td>
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
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <td width="12%">
                        <input type="submit"  name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>
                        <form action="" method="post">
                        <td width="30%">
                        <select name="showonly" id="" class="box filter-container-items" style="width:90% ;height: 37px;margin: 0;" >
                                    <option value="" disabled selected hidden><?php echo "طلابي فقط "   ?></option><br/>
                                    <option value="my">طلابي فقط </option><br/>
                                    <option value="all">جميع الطلبة</option><br/>
                                    

                        </select>
                    </td>
                    
                        <td  style="text-align: right;">
                        :إظهار بيانات حول  &nbsp;
                        </td>
                        
                   

                    </tr>
                            </table>

                        </center>
                    </td>
                    
                </tr>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown"  style="border-spacing:0;">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                اسم الطالب
                                
                                </th>
                                <th class="table-headin">
                                    البريد الالكتروني
                                </th>
                                <th class="table-headin">
                                    
                                    رقم الهاتف
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    عنوان المنزل
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    الحفظ والمراجعة
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                
                                $result= $database->query($sqlmain);
                               
                                if($result->num_rows==0){
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
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $student_id=$row["student_id"];
                                    $_SESSION['student_id'] = $student_id;
                                    $student_name=$row["student_name"];
                                    $student_email=$row["student_email"];
                                    $student_homeaddress=$row["student_homeaddress"];
                                    $student_phone=$row["student_phone"];
                                    
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($student_name,0,35)
                                        .'</td>
                                        <td>
                                        '.substr($student_email,0,12).'
                                        </td>
                                        <td>
                                            '.substr($student_phone,0,10).'
                                        </td>
                                        <td>
                                        '.substr($student_homeaddress,0,20).'
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
                                 
                            ?>
 
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
    // if($_GET){

        
        // $student_id=$_GET["id"];
        // $action=$_GET["action"];
        // if($action=='edit') {
        //     $sqlmain= "select * from student where student_id='$student_id'";
        //     $result= $database->query($sqlmain);
        //     $row=$result->fetch_assoc();
        //     $student_name=$row["student_name"];
        //     $student_email=$row["student_email"];
        //     $student_homeaddress=$row["student_homeaddress"];
        //     $student_phone=$row["student_phone"];
           
        //     echo '
            // <div id="popup1" class="overlay">
            //         <div class="popup">
            //         <center>
            //             <a class="close" href="daftar-elmutaba3a.php">&times;</a>
            //             <div class="content">

            //             </div>
            //             <div style="display: flex;justify-content: center;">
            //             <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
            //                 <tr>
            //                     <td>
            //                         <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">دفتر المتابعة</p><br><br>
            //                     </td>
            //                 </tr>
            //                 <tr>
                                
            //                     <td class="label-td" colspan="2">
            //                         <label for="name" class="form-label">Patient ID: </label>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                         P-'.$student_id.'<br><br>
            //                     </td>
                                
            //                 </tr>
                            
            //                 <tr>
                                
            //                     <td class="label-td" colspan="2">
            //                         <label for="name" class="form-label">Name: </label>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                         '.$student_name.'<br><br>
            //                     </td>
                                
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                         <label for="Email" class="form-label">Email: </label>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                     '.$student_email.'<br><br>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                         <label for="nic" class="form-label">NIC: </label>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                     '.$student_homeaddress.'<br><br>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                         <label for="Tele" class="form-label">Telephone: </label>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                     '.$student_phone.'<br><br>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td class="label-td" colspan="2">
            //                         <label for="spec" class="form-label">Address: </label>
                                    
            //                     </td>
            //                 </tr>
            //                 <tr>
                                
            //                     <td class="label-td" colspan="2">
            //                         <label for="name" class="form-label">Date of Birth: </label>
            //                     </td>
            //                 </tr>
            //                 <tr>
            //                     <td colspan="2">
            //                         <a href="student.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
            //                     </td>
                
            //                 </tr>
                           

            //             </table>
            //             </div>
            //         </center>
            //         <br><br>
            // </div>
            // </div>
//             ';
        
//     };
    

// };

// ?>
</div>

</body>
</html>