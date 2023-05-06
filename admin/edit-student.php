
    <?php
    
    include("../connection.php");


    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");

        $student_name=$_POST['student_name'];
        $student_homeaddress=$_POST['student_homeaddress'];
        $oldemail=$_POST["oldemail"];
        $student_parentjob=$_POST['student_parentjob'];
        $student_email=$_POST['student_email'];
        $student_phone=$_POST['student_phone'];
        $student_password=$_POST['student_password'];
        $confirm_student_password=$_POST['confirm_student_password'];
        $student_id=$_POST['student_id'];
        $student_educationallevel=$_POST['student_educationallevel'];
        $student_scholaryear=$_POST['student_scholaryear'];
        $student_class=$_POST['student_class'];
        
        if ($student_password==$confirm_student_password){
            $error='3';
            $result= $database->query("select student.student_id from student inner join webuser on student.student_email=webuser.email where webuser.email='$student_email';");

            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["student_id"];
            }else{
                $id2=$student_id;
            }
            
            
            if($id2!=$student_id){
                $error='1';
                //$resultqq1= $database->query("select * from doctor where docemail='$email';");
                //$did= $resultqq1->fetch_assoc()["docid"];
                //if($resultqq1->num_rows==1){
                    
            }else{

                //$sql1="insert into doctor(docemail,docname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
              
                
                
                $sql1="update student set student_email='$student_email',student_name='$student_name',student_password='$student_password',student_homeaddress='$student_homeaddress',student_phone='$student_phone',student_parentjob=$student_parentjob, student_scholaryear=$student_scholaryear, student_educationallevel=$student_educationallevel, student_class=$student_class where student_id=$id2 ;";
                $database->query($sql1); 
        
              
                

              
                 
                
                
                $sql1="update webuser set email='$student_email' where email='$oldemail' ;";
                $database->query($sql1);

                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: students.php?action=edit&error=".$error."&id=".$student_id);
    ?>
    
   

</body>
</html>