
    <?php
    
    include("../connection.php");



    if($_POST){
   
        $result= $database->query("select * from webuser");
        $teacher_name=$_POST['teacher_name'];
        $oldemail=$_POST["oldemail"];
        $teacher_homeaddress=$_POST['teacher_homeaddress'];
        $teacher_job=$_POST['teacher_job'];
        $teacher_email=$_POST['teacher_email'];
        $teacher_phone=$_POST['teacher_phone'];
        $teacher_password=$_POST['teacher_password'];
        $confirm_teacher_password=$_POST['confirm_teacher_password'];
        $teacher_id=$_POST['teacher_id'];
        
        if ($teacher_password==$confirm_teacher_password){
            $error='3';
            $result= $database->query("select teacher.teacher_id from teacher inner join webuser on teacher.teacher_email=webuser.email where webuser.email='$teacher_email';");
         
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["teacher_id"];
            }else{
                $id2=$teacher_id;
            }
            
    
            if($id2!=$teacher_id){
                $error='1';
    
                    
            }else{

                $sql1="update teacher set teacher_email='$teacher_email',teacher_name='$teacher_name',teacher_password='$teacher_password',teacher_homeaddress='$teacher_homeaddress',teacher_phone='$teacher_phone',teacher_job=$teacher_job where teacher_id=$teacher_id ;";
                $database->query($sql1);

                $sql1="update webuser set email='$teacher_email' where email='$oldemail' ;";
                $database->query($sql1);

                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
      
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$teacher_id);
    ?>
    
   

</body>
</html>