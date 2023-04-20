<?php 

function adminPasswordVerify($adminPass, $conn, $adminID){
   $sql = "SELECT * FROM admin
           WHERE adminID=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$adminID]);

   if ($stmt->rowCount() == 1) {
     $admin = $stmt->fetch();
     $pass  = $admin['adminPass'];

     if (password_verify($adminPass, $pass)) {
     	return 1;
     }else {
     	return 0;
     }
   }else {
    return 0;
   }
}