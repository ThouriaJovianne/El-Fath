<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'مشرف عام') {
      
       include "../DB_connection.php";


       $student_firstname = '';
       $student_lastname = '';
       $username = '';

       if (isset($_GET['student_firstname'])) $fname = $_GET['student_firstname'];
       if (isset($_GET['student_lastname'])) $lname = $_GET['student_lastname'];
       if (isset($_GET['username'])) $username = $_GET['username'];
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>اضافة تلميذ</title> 
</head>
<body>
    <div class="container">
       
        <button href="student.php"
           class="btn btn-dark">الرجوع</button>
         
        <form method="post" action="inc/student-add.php">
            <div class="form first">
                <div class="details personal">
                     <header>اضافة تلميذ</header>
                     <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>

                    <div class="fields">
                        <div class="input-field">
                            <label>الاسم</label>
                            <input type="text" placeholder="ادخل الاسم "  value="<?=$student_firstname?>" 
                 name="student_firstname" required>
                        </div>
                        
                        <div class="input-field">
                            <label>اللقب</label>
                            <input type="text" placeholder="ادخل اللقب" value="<?=$student_lastname?>" 
                 name="student_lastname" required>
                        </div>
                        
                        <div class="input-field">
                            <label>اسم المستخدم</label>
                            <input type="text" placeholder="ادخل اسم المستخدم" value="<?=$username?>"
                 name="username" required>
                        </div>
                        
                        <div class="input-field">
                            <label> كلمة المرور </label>
                            <input type="text" placeholder="ادخل كلمة المرور" name="password"
                     id="passInput" required>
                        </div>
                        
                    </div>
                    
                </div>
      
             
            </div>
            <button type="submit" >اضافة</button>
        </form>
    </div>

    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
        });
    </script>
</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>