<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moderna Bootstrap Template - Index 2 without slider</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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
         
         
          <li><a href="contact.html">تواصلوا معنا </a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a> -->
            <li><a href="team.html">فريقنا</a></li>
            <li><a href="services.html">خدماتنا</a></li>
            <li><a href="about.html">حول المسجد</a></li>
            <li><a href="index.html">الرئيسية</a></li>
        <i class="bi bi-list mobile-nav-toggle"> </i>
      </nav><!-- .navbar -->
      <div class="logo">
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html"><img src="assets/img/Logo.png" alt="" class="img-fluid"></a>
      </div>

      

    </div>
  </header><!-- End Header -->
  
  <!-- ======= Hero No Slider Section ======= -->
  <div id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
    <!-- <div class="black-fill"><br /> <br /> -->
    	<div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" 
    	      method="post"
    	      action="req/login.php"
            style="max-width: 500px; width: 90%; background: rgba(255,255,255, 0.5); padding: 40px; border-radius: 10px; margin-top:100px ;">
    		      <h3>تسجيل الدخول </h3>
              <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
              <?=$_GET['error']?>
	          	</div>
			        <?php } ?>
              <div class="mb-3">
                <label class="form-label">اسم المستخدم</label>
                <input type="text" 
                      class="form-control"
                      name="uname">
              </div>
		          <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" 
                      class="form-control"
                      name="pass">
              </div>
              <div class="mb-3">
                <label class="form-label">دخول التسجيل على اساس </label>
                <select class="form-control"
                        name="role">
                  <option value="1">مشرف عام </option>
                  <option value="2">أستاذ</option>
                  <option value="3">طالب</option>
                  <option value="4">مشرف </option>
                </select>
              </div>

		          <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
	        	</form>
                    <br /><br />
        <div class="text-center text-light">
			<?php
			// $pass = 123;
			// $pass = password_hash($pass, PASSWORD_DEFAULT);
      // echo $pass;
			?>
        </div>
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