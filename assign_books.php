<?php 

session_start();
if(!$_SESSION['logged_in'])
{
 header("Location:login.php");
}

require_once("includes/config.php");
require_once("includes/function.php");
$res = array();
$html ='';
$issue_date = date("Y-m-d",time());
$book_id    = $_POST['book_id'];
$student_id = $_POST['student_id'];
$book_ids = getBookIdsByStudentId($student_id,$connection);

if(in_array($book_id,$book_ids))
{
	$msg="Book already assigned";
	$res['msg'] = $msg;
	echo json_encode($res); exit;
}

else
  {
	$sql = 'insert into issue (`id`,`book_id`,`student_id`,`issue_date`) values ("",'.$book_id.','.$student_id.', "'.$issue_date.'")';
     $result=mysqli_query($connection, $sql);
     $res['msg']= "books_added_successfully";

  }

     if($result)
       {
	          $red='update books set quantity = quantity-1 where books.id='.$_POST['book_id'].'';
	          mysqli_query($connection,$red);
       }

echo json_encode($res); exit;
?>