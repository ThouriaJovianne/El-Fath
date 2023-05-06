<?php
include "../../connection.php"; 

// for memorization
if(isset($_POST['Mevaluation_mark'])&& isset($_POST['Msurah_id'])&& isset($_POST['Mlastaya']))
{
$Mevaluation_mark=$_POST['Mevaluation_mark'];
$Msurah_id=$_POST['Msurah_id'];
$Mlastaya=$_POST['Mlastaya'];

$Mquery = "insert into evaluation (surah_id,lastaya,evaluation_mark,evaluation_kind) values($Msurah_id,$Mlastaya,$Mevaluation_mark,'m')";
$v1=$database->query($Mquery);
}

//for review
if(isset($_POST['Revaluation_mark'])&& isset($_POST['Rsurah_id'])&& isset($_POST['Rlastaya']))
{
$Revaluation_mark=$_POST['Revaluation_mark'];
$Rsurah_id=$_POST['Rsurah_id'];
$Rlastaya=$_POST['Rlastaya'];

$Rquery = "insert into evaluation (surah_id,lastaya,evaluation_mark,evaluation_kind) values($Rsurah_id,$Rlastaya,$Revaluation_mark,'r')";
$v2=$database->query($Rquery);
}


header("Location: container.php");
?>
