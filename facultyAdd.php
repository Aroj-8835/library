<?php
require_once("includes/config.php")?>
<?php
if (isset($_POST['submit'])){
	$name=$_POST["name"];
	// $gender=$_POST["gender"];
	// $faculty=$_POST["faculty_id"];
	// $address=$_POST["address"];
	// $contact=$_POST["contact_no"];
	// $status=$_POST["is_active"];
	$insert ='INSERT INTO `faculty` (`id`,`name`) VALUES ("","'.$name.'")';
	$check = mysqli_query($connection,$insert);
// }
	if ($check) {
		echo "<hr>";
		echo "data inserted successfully";
	}else {
		echo "<hr>";
		echo "data is not inserted";
		echo mysqli_error($connection);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LIBRARY MANAGEMENT SYSTEM</title>
</head>
<H1 style="text-align:center">LIBRARY MANAGEMENT SYSTEM</H1>
		<br>
<body>
<form method="post" >
	<table class="table table-bodered">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name" ></td>
		</tr>
		
		<tr>
			<th><td><input type="submit" name="submit"></td></th>
		</tr>
		<tr>
			<th><td><a href="faculty.php"> GO BACK</a></td></th>
		</tr>
	
		
	</table>
</form>
</body>
</html>