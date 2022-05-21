<?php
require_once("includes/config.php");

function getBookIdsByStudentId($student_id,$connection)
{
	$sql = "select book_id from issue where student_id=".$student_id;
	$result=mysqli_query($connection,$sql);
	$books_ids = array();
	while($row = mysqli_fetch_assoc($result))

	{
		array_push($books_ids,$row['book_id']);
	}

	return $books_ids;
 }

function getLoggedUser($user_id,$connection)
{
	$sql = "select username from users where id = ".$user_id;
    $result = mysqli_query($connection, $sql);
    $user_row = mysqli_fetch_assoc($result);
    $greetings  = "Welcome ".$user_row['username'];
    $greetings = '<a href="logout.php">Log Out</a>';
    return $greetings;
}

function alertBox($alert_msg, $redirect_link)
{
    $alert = '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
    $alert .= '<script type="text/javascript">alert("' . $alert_msg . '");';
    if (!empty($redirect_link)):
    $alert .= 'window.location="' . $redirect_link . '";';
    endif;
    $alert .= '</script>;';
    return $alert;
}
?>