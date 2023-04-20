<?php 
session_start();
// Checking if the current user is Admin, if so, they are eligable to add a new teacher to the database 
// (All the code in this file can be only executed by Admin)

if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    
    if ($_SESSION['role'] == 'مشرف عام') {
      
    include "../../DB_connection.php";
    $query = "SELECT * FROM teacher";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

       $fname = '';
       $lname = '';
       $uname = '';
       $address = '';
       $job = '';
       $phone1 = '';
       $phone2 = '';

       if (isset($_GET['fname'])) $fname = $_GET['fname'];
       if (isset($_GET['lname'])) $lname = $_GET['lname'];
       if (isset($_GET['uname'])) $uname = $_GET['uname'];
       if (isset($_GET['address'])) $address = $_GET['address'];
       if (isset($_GET['job'])) $job = $_GET['job'];
       if (isset($_GET['phone1'])) $phone1 = $_GET['phone1'];
       if (isset($_GET['phone2'])) $phone2 = $_GET['phone2'];
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="../css/style.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="../logo.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>مشرف عام -اضافة استاذ </title> 
    
</head>
<body>
    
    <div class="container mt-5">
        <a href="../teacher.php"
           class="btn btn-dark">الرجوع</a>

        <header>إضافة أستاذ</header>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="add_teacher.php">

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

            <div class="form first">
                <div class="details personal">
                    <span class="title">المعلومات الشخصية</span>
                     <br>
                    <div class="fields">
                        <div class="input-field">
                            <label>الاسم </label>
                            <input type="text" 
                                    value = "<?=$fname?>" 
                                    placeholder="ادخل الاسم " 
                                    name = "fname"
                                    required>
                            <br><br>
                        </div>

                        <div class="input-field">
                            <label>اللقب </label>
                            <input type="text" 
                                    value="<?=$lname?>"
                                    placeholder="ادخل اللقب "
                                    name="lname" 
                                    required>
                            <br><br>
                        </div>

                        <div class="input-field">
                            <label>اسم المستخدم</label>
                            <input type="text" 
                                    value="<?=$uname?>"
                                    placeholder="ادخل اسم المستخدم"
                                    name="uname" 
                                    required>
                            <br><br>
                        </div>

                        <div class="input-field">
                            <label>كلمة السر</label>
                            <input type="text" 
                                    value="<?=$uname?>"
                                    placeholder="ادخل كلمة السر"
                                    name="password" 
                                    required>
                            <br><br>
                        </div>

                        <div class="input-field">
                            <label>عنوان المنزل</label>
                            <input type="text" 
                                    value = "<?=$address?>"
                                    placeholder="ادخل عنوان المنزل"
                                    name="address" 
                                    required>
                            <br><br>
                        </div>

                        <div class="input-field">
                            <label>الوظيفة</label>
                            <input type="text" 
                                    value = "<?=$job?>"
                                    placeholder="ادخل الوظيفة"
                                    name="job" 
                                    required>
                            <br><br>
                        </div>

                        <div class="input-field">
                            <label>رقم الهاتف</label>
                            <input type="number"
                                    value = "<?=$phone1?>"
                                    placeholder="ادخل رقم الهاتف"
                                    name = "phone1"
                                    required>
                            <br><br>
                        </div>

                        
                        <div class="input-field">
                            <label>رقم الهاتف</label>
                            <input type="number"
                                    value = "<?=$phone2?>"
                                    placeholder=" (اختياري) ادخل رقم هاتف" 
                                    name = "phone2"
                                    required>
                            <br><br>
                        </div>

                            <button class="sumbit">
                                <span class="btnText">تقديم </span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>  
                  
                </div>
                   
            </div>  
               
        </form>
    </div>

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

    <script src="assets/js/main.js"></script>
</body>
</html>
<?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $address = $_POST["address"];
        $job = $_POST["job"];
        $phone1 = $_POST["phone1"];
        $phone2 = $_POST["phone2"];
    
        $sql = "INSERT INTO teacher (teacher_firstname, teacher_lastname, username, password, teacher_address, teacher_job, teacher_phone1, teacher_phone2)	
        VALUES (:teacher_firstname, :teacher_lastname, :username, :password, :teacher_address, :teacher_job, :teacher_phone1, :teacher_phone2)";
    
        $stmt = $conn->prepare($sql);
    
        $password = md5($_POST["password"]);

        $stmt->bindParam(":teacher_firstname", $fname);
        $stmt->bindParam(":teacher_lastname", $lname);
        $stmt->bindParam(":username", $uname);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":teacher_address", $address);
        $stmt->bindParam(":teacher_job", $job);
        $stmt->bindParam(":teacher_phone1", $phone1);
        $stmt->bindParam(":teacher_phone2", $phone2);

        $stmt->execute();
    
        echo "تم إضافة أستاذ بنجاح";

    }

  }else {
    header("Location: ../../login.php");
    exit;
  } 
}else {
	header("Location: ../../login.php");
	exit;
} 






?> 