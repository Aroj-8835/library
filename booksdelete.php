<?php
session_start();
if(!$_SESSION['logged_in'])
{
  header("Location:login.php");
}

require_once("includes/config.php");
$books_id=$_GET['id'];
$sql='Delete from books where id='.$books_id;
$result=mysqli_query($connection,$sql);
if ($result)
 {
	$url='books.php';
	header('location:'.$url,true);
 }
 ?>