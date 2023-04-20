<?php 
session_start();
if (isset($_SESSION['adminID']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'مشرف عام') {
       include "../DB_connection.php";
       include "data/student.php";
      
       $students = getAllStudents($conn);
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشرف عام</title>
    <link href="style1.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>   

</head>
<body>
     <?php 
        
        if ($students != 0) {
     ?>

    <div class="table">
        <div class="table-header">
            <p>معلومات التلاميذ</p>
          <div >
            <a class="add_new" href="student-add.php" > إضافة تلميذ جديد</a>
            <a class="add_new" href="../data/admin.php" > رجوع</a>
            
          </div>
       </div>
       <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>
       <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>الرقم السري</th>
                    <th>اسم المستخدم</th>
                    <th>الاسم</th>
                    <th>اللقب</th>
                </tr>
            </thead> 

            <tbody>
                  <?php foreach ($students as $student ) { ?>
                  <tr>
                    <th scope="row">1</th>
                    <td><?=$student['student_id']?></td>
                    <td><?=$student['username']?></td>
                    <td><?=$student['student_firstname']?></td>
                    <td><?=$student['student_lastname']?></td>
                    <td>
                        <a href="student-edit.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-warning">تعديل</a>
                        <a href="student-delete.php?student_id=<?=$student['student_id']?>"
                           class="btn btn-danger">حذف</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            
            </div>    
            <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>

          
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