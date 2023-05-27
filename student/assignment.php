<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>الواجبات المنزلية</title>
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
    
    date_default_timezone_set('Africa/Algiers');

    $today = date('Y-m-d');
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
                                 <p class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                 <p class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2">
                                 <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
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
                    <td class="menu-btn menu-icon-appoinment menu-active menu-icon-appoinment-active">
                        <a href="assignment.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">الواجبات المنزلية  </p></div></a>
                    </td>
                </tr>
                
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="done-assignment.php" class="non-style-link-menu"><div><p class="menu-text">الواجبات التامة  </p></div></a>
                    </td>
                </tr>
               
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings">
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text">الإعدادات</p></a></div>
                    </td>
                </tr>
                
            </table>
        </div>
        <?php

                $sqlmain= "select * from assignment where assignment.student_id=$userid and assignment.assignment_enddate<='$today' order by assignment.assignment_startdate asc";
                $sqlpt1="";
                $insertkey="";
                $q='';
                
                        if($_POST){
                        
                        if(!empty($_POST["search"])){
                            
                            $keyword=$_POST["search"];
                            $sqlmain= "select * from assignment where assignment.student_id=$userid";
                            // and assignment.assignment_startdate>='$today' and 
                            // (assignment.assignment_title='$keyword' or assignment.assignment_title like '$keyword%' or assignment.assignment_title like '%$keyword' or assignment.assignment_title like '%$keyword%' or 
                            // assignment.assignment_startdate like '$keyword%' or assignment.assignment_startdate like '%$keyword' or assignment.assignment_startdate like '%$keyword%' or assignment.assignment_startdate='$keyword' or 
                            // assignment.assignment_enddate like '$keyword%' or assignment.assignment_enddate like '%$keyword' or assignment.assignment_enddate like '%$keyword%' or assignment.assignment_enddate='$keyword' )  order by assignment.assignment_startdate asc";
                            $insertkey=$keyword;
                            
                            $q='"';
                        }

                    }


                $result= $database->query($sqlmain)


                ?>
                  
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <?php include("back.php"); ?>
                    <td >
                            <form action="" method="post" class="header-search">

                                        <input type="search" name="search" class="input-text header-searchbar" placeholder="ابحث عن عنوان واجب منزلي أو تاريخه" list="assignments" value="<?php  echo $insertkey ?>">&nbsp;&nbsp;
                                        
                                        <?php
                                        //     echo '<datalist id="assignments">';
                                            
                                        //     $list12 = $database->query("select DISTINCT * from  assignment GROUP BY title;");

                                        //     for ($y=0;$y<$list12->num_rows;$y++){
                                        //         $row00=$list12->fetch_assoc();
                                        //         $d=$row00["assignment_title"];
                                               
                                        //         echo "<option value='$d'><br/>";
                                        //                                                  };

                                        // echo ' </datalist>';
            ?>
                                        
                                
                                        <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                        </form>
                    </td>
                    <td width="15%">
                        <?php include("../date.php"); ?>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
                
                
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)"><?php echo " جميع الواجبات المنزلية "."(".$result->num_rows.")"; ?> </p>
                        <p class="heading-main12" style="margin-left: 45px;font-size:22px;color:rgb(49, 49, 49)"><?php echo $q.$insertkey.$q ; ?> </p>
                    </td>
                    
                </tr>
                
                
                
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px;border:none">
                            
                        <tbody>
                        
                            <?php

                                
                                

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">!لم نستطع إيجاد أي شيء متعلق بكلمة بحثك</p>
                                    <a class="non-style-link" href="assignment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; أظهر جميع الواجبات المنزلية &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                        
                                for ( $x=0; $x<($result->num_rows);$x++){
                                    echo "<tr>";
                                    for($q=0;$q<3;$q++){
                                        $row=$result->fetch_assoc();
                                        if (!isset($row)){
                                            break;
                                        };
                                        $assignment_id=$row["assignment_id"];
                                        $assignment_title=$row["assignment_title"];
                                        $assignment_startdate=$row["assignment_startdate"];
                                        $assignment_enddate=$row["assignment_enddate"];
                                        $startsurah = $row["startsurah_id"];
                                        $startaya = $row["startaya"];
                                        $endsurah = $row["startsurah_id"];
                                        $endaya = $row["endaya"];

                                        if($assignment_id==""){
                                            break;
                                        }

                                        echo '
                                        <td style="width: 25%;">
                                                <div  class="dashboard-items search-items"  >
                                                
                                                    <div style="width:100%">
                                                            <div class="h1-search">
                                                                '.substr($assignment_title,0,21).'
                                                            </div><br>
                                                            <div class="h3-search">
                                                                '.substr($assignment_startdate,0,10).'
                                                            </div>
                                                            <div class="h4-search">
                                                                '.substr($assignment_enddate,0,10).'
                                                            </div><br>
                                                            <div class="h3-search">
                                                            '.substr($startsurah,0,21).'
                                                        </div>
                                                        <div class="h4-search">
                                                            '.substr($startaya,0,10).'
                                                        </div><br>
                                                        <div class="h3-search">
                                                            '.substr($endsurah,0,10).'
                                                        </div>
                                                        <div class="h4-search">
                                                        '.substr($endaya,0,21).'
                                                    </div>

                                                            <br>
                                                            <a href="done-assignments.php?id='.$assignment_id.'" ><button  class="login-btn btn-primary-soft btn "  style="padding-top:11px;padding-bottom:11px;width:100%"><font class="tn-in-text">تم الواجب المنزلي</font></button></a>
                                                    </div>
                                                            
                                                </div>
                                            </td>';

                                    }
                                    echo "</tr>";
                                    
                                    
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

    </div>

</body>
</html>
