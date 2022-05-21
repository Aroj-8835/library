<?php
require_once("includes/config.php");
$student_id=$_GET['id'];
echo $student_id;
$sql='Delete from student where id='.$student_id;
$result=mysqli_query($connection,$sql);
if ($result) {
	$url='index.php';
	header('location:'.$url,true);
}
?>