
<?php
    
    include("../connection.php");



    if($_POST){
   
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $oldemail=$_POST["oldemail"];
        $homeaddress=$_POST['homeaddress'];
        $parentjob=$_POST['parentjob'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        $id=$_POST['id'];
        
        if ($password==$confirm_password){
            $error='3';
            $result= $database->query("select student.student_id from student inner join webuser on student.student_email=webuser.email where webuser.email='$email';");
         
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["student_id"];
            }else{
                $id2=$id;
            }
            
    
            if($id2!=$id){
                $error='1';
    
                    
            }else{

                $sql1="update student set student_email='$email',student_name='$name',student_password='$password',student_homeaddress='$homeaddress',student_phone='$phone',student_parentjob=$parentjob where student_id=$id ;";
                $database->query($sql1);

                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);

                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
      
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>