<?php
session_start();
if(!$_SESSION['logged_in'])
{
    header("Location:login.php");
}
require_once("includes/config.php");
$faculty_id=$_GET['id'];
echo $student_id;
$sql='Delete from faculty where id='.$faculty_id;
$result=mysqli_query($connection,$sql);
if ($result) {
	$url='faculty.php';
	header('location:'.$url,true);
}
?>