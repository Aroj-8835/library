<?php 
session_start();
if(!$_SESSION['logged_in'])
{
    header("Location:login.php");
}

require_once("includes/config.php");
$res = array();
$html ='';
$search_text = $_POST['search_book'];
if(empty($search_text))
{
	$res['html']= "";
	echo json_encode($res); exit;
}
$student_id = $_POST['student_id'];
$sql = 'select * from books where name like "%'.$search_text.'%"';
$result = mysqli_query($connection, $sql);
$html .= '<table>';
$html .= '<tr>
				<td>#</td>
				<td>Book Name</td>
				<td>Author</td>
				<td>Quantity</td>
				<td>Action</td>
		   </tr>';
while ($row = mysqli_fetch_assoc($result)) 
  {
	   $html .= '<tr>';
		$html .= '<td></td>';
		$html .= '<td>'.$row['name'].'</td>';
		$html .= '<td>'.$row['author'].'</td>';
		$html .= '<td>'.$row['quantity'].'</td>';
		$html .= '<td><span class="book_add" href="view_assign_history.php?book_id='.$row["id"].'&  student_id='.$student_id.'" id="book_add_'.$row["id"].'">Add Book</span></td>';
	    $html .='</tr>';
  }
$html .= '</table>';
$res['html']= $html;
echo json_encode($res); exit;
?>