<?php 
session_start();
if (isset($_SESSION['adminID']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'مشرف عام') {
    	

if (isset($_POST['student_firstname'])      &&
    isset($_POST['student_lastname'])      &&
    isset($_POST['username'])   &&
    isset($_POST['student_id']) 
    ) {
    
    include '../../DB_connection.php';
    include "../data/student.php";

    $student_firstname = $_POST['student_firstname'];
    $student_lastname = $_POST['student_lastname'];
    $username = $_POST['username'];
    $student_id = $_POST['student_id'];
    

    $data = 'student_id='.$student_id;

    if (empty($student_firstname)) {
		$em  = "First name is required";
		header("Location: ../student-edit.php?error=$em&$data");
		exit;
	}else if (empty($student_lastname)) {
		$em  = "Last name is required";
		header("Location: ../student-edit.php?error=$em&$data");
		exit;
	}else if (empty($username)) {
		$em  = "Username is required";
		header("Location: ../student-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($username, $conn, $student_id)) {
		$em  = "Username is taken! try another";
		header("Location: ../student-edit.php?error=$em&$data");
		exit;
	}else {
        $sql = "UPDATE student SET
                username = ?, student_firstname=?, student_lastname=?
                WHERE student_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username,$student_firstname, $student_lastname,  $student_id]);
        $sm = "successfully updated!";
        header("Location: ../student-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../student-edit.php?error=$em");
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
