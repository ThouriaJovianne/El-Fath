<?php  
function getStudentById($student_id, $conn){
   $sql = "SELECT * FROM student
           WHERE student_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$student_id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}


function getAllStudents($conn){
   $sql = "SELECT * FROM student";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
   	return 0;
   }
}

// Check if the username Unique
function unameIsUnique($uname, $conn, $student_id=0){
   $sql = "SELECT username, student_id FROM student
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($student_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $student = $stmt->fetch();
       if ($student['student_id'] == $student_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}

// DELETE
function removeStudent($student_id, $conn){
   $sql  = "DELETE FROM student
           WHERE student_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$student_id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}