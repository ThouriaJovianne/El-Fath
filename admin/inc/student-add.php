<?php 
session_start();
if (isset($_SESSION['adminID']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'مشرف عام') {
    	

if (isset($_POST['student_firstname']) &&
    isset($_POST['student_lastname']) &&
    isset($_POST['username']) &&
    isset($_POST['password']) )
     {
    
    include '../../DB_connection.php';
    include "../data/student.php";

    $student_firstname = $_POST['student_firstname'];
    $student_lastname = $_POST['student_lastname'];
    $uname = $_POST['username'];
    $password = $_POST['password'];
    
    
  

    
    $data = 'username='.$username.'&student_firstname='.$student_firstname.'&student_lastname='.$student_lastname;

    if (empty($student_firstname)) {
		$em  = "First name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($student_lastname)) {
		$em  = "Last name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "Username is taken! try another";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else {
        // hashing the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 student
                 VALUES(?,?,'','','','','','','','','','','','','','','','',?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([ $student_firstname, $student_lastname,$username, $pass,]);
        $sm = "New student registered successfully";
        header("Location: ../student-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../student-add.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
