<?php 
session_start();
if (isset($_SESSION['adminID']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])) {

  if ($_SESSION['role'] == 'مشرف عام') {
     include "../DB_connection.php";
     include "data/student.php";

     $student_id = $_GET['student_id'];
     if (removeStudent($student_id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: student.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: student.php?error=$em");
        exit;
     }


  }else {
    header("Location: student.php");
    exit;
  } 
}else {
	header("Location: student.php");
	exit;
} 