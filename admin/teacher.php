<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'مشرف عام') {
       include "../DB_connection.php";

       $query = "SELECT * FROM teacher";
       $stmt = $conn->prepare($query);
       $stmt->execute();

       $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Teachers</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets\css\style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($teachers != 0) {
     ?>
     <div class="container mt-5">
        <a href="data/add_teacher.php"
           class="btn btn-dark">إضافة أستاذ</a>

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

           <div class="table-responsive">
              <table class="header_fixed">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">اللقب</th>
                    <th scope="col">اسم المستخدم</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">عنوان المنزل</th>
                    <th scope="col">تعديل/حذف</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($teachers as $teacher ) { ?>
                  <tr>
                    <th scope="row">1</th>
                    <td><?=$teacher['teacher_id']?></td>
                    <td><?=$teacher['teacher_firstname']?></td>
                    <td><?=$teacher['teacher_lastname']?></td>
                    <td><?=$teacher['username']?></td>
                    <td><?=$teacher['teacher_phone1']?></td>
                    <td><?=$teacher['teacher_address']?></td>

                    <td>
                        <a href="teacher-edit.php?teacher_id=<?=$teacher['teacher_id']?>"
                           class="btn btn-warning">تعديل</a>
                        <a href="teacher-delete.php?teacher_id=<?=$teacher['teacher_id']?>"
                           class="btn btn-danger">حذف</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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