<?php
    
    include("../connection.php");



    if($_POST){
   
        $result= $database->query("select * from webuser");
        $student_name=$_POST['student_name'];
        $student_homeaddress=$_POST['student_homeaddress'];
        $student_email=$_POST['student_email'];
        $student_phone=$_POST['student_phone'];
      

        $student_id=$_POST['student_id'];
        
    
         
        

                $sql1="update student set student_email='$student_email',student_name='$student_name',student_homeaddress='$student_homeaddress',student_phone='$student_phone' where teacher_id=$student_id ;";
                $database->query($sql1);

                $error= '4';
                
            }

    
    
    

    header("location: student.php?action=edit&error=".$error."&id=".$student_id);
    ?>
    
   

</body>
</html>