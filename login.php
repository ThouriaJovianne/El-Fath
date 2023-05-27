<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>تسجيل الدخول</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/Logo2.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
         
</head>
<body>

<div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">
      <nav id="navbar" class="navbar">
        <ul> 
         
         
          <li><a href="login.php">تواصلوا معنا </a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a> -->
            <li><a href="team.php">فريقنا</a></li>
            <li><a href="services.php">خدماتنا</a></li>
            <li><a href="about.php">حول المسجد</a></li>
            <li><a href="index.php">الرئيسية</a></li>
        <i class="bi bi-list mobile-nav-toggle"> </i>
      </nav><!-- .navbar -->
      <div class="logo">
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.php"><img src="assets/img/Logo.png" alt="" class="img-fluid"></a>
      </div>

      

    </div>
  </header><!-- End Header -->

    <?php

    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Africa/Algiers');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    
    include("connection.php");

    



    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                $checker = $database->query("select * from student where student_email='$email' and student_password='$password'");
                if ($checker->num_rows==1){


                    //   student dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: student/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">بيانات الاعتماد غير صحيحة: البريد الإلكتروني أو كلمة المرور غير صالحة</label>';
                    echo $error;
                }

            }elseif($utype=='a'){
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">بيانات الاعتماد غير صحيحة: البريد الإلكتروني أو كلمة المرور غير صالحة</label>';
                    echo $error;
                }


            }elseif($utype=='d'){
                $checker = $database->query("select * from teacher where teacher_email='$email' and teacher_password='$password'");
                if ($checker->num_rows==1){


                    //   teacher dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: teacher/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">بيانات الاعتماد غير صحيحة: البريد الإلكتروني أو كلمة المرور غير صالحة</label>';
                    echo $error;
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">لم نتمكن من العثور على أي حساب يستخدم هذا البريد الإلكتروني</label>';
            echo $error;
        }






        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>



<!-- ======= Hero No Slider Section ======= -->
<div id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
    <!-- <div class="black-fill"><br /> <br /> -->
    	<div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" 
    	      method="POST"
    	      action=""
            style="max-width: 500px; width: 90%; background: rgba(255,255,255, 0.5); padding: 40px; border-radius: 10px; margin-top:100px ;">
    		      <h3>تسجيل الدخول </h3>
              
              <div class="mb-3">
                <label class="form-label">بريد المستخدم</label>
                <input type="text" 
                      class="form-control"
                      name="useremail">
              </div>
		          <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" 
                      class="form-control"
                      name="userpassword">
              </div>
              <!-- <div class="mb-3">
                <label class="form-label">دخول التسجيل على اساس </label>
                <select class="form-control"
                        name="role">
                  <option value="1">مشرف عام </option>
                  <option value="2">أستاذ</option>
                  <option value="3">طالب</option>
                  <option value="4">مشرف </option>
                </select>
              </div> -->

		          <button type="submit" value="Login" class="btn btn-primary">تسجيل الدخول</button>
	        	</form>
                    <br /><br />

      </div>
      </div>
      </div>
    <!-- </div> -->
  </div>
  <!-- End Hero No Slider Sectio -->
  
  </div>
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



                




                        
                        
    
                        
                    
     



</body>
</html>