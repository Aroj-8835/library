<?php
require_once("includes/config.php")?>
<?php
if (isset($_POST['submit'])){
	$book_name=$_POST["name"];
	$author_name=$_POST["author"];
	$quantity=$_POST["quantity"];
	$insert ='INSERT INTO `books` (`id`,`name`,`author`,`quantity`) VALUES ("","'.$book_name.'","'.$author_name.'","'.$quantity.'")';
	$check = mysqli_query($connection,$insert);
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
			<th>Book name</th>
			<td><input type="text" name="name" ></td>
		</tr>
		<tr>
			<th>Author name</th>
			<td><input type="text" name="author" ></td>
		</tr>
		<tr>
			<th>Quantity</th>
			<td><input type="text" name="quantity" ></td>
		</tr>
		<tr>
			<th><td><input type="submit" name="submit"></td></th>
		</tr>
		<tr>
			<th><td><a href="books.php"> GO BACK</a></td></th>
		</tr>
	
		
	</table>
</form>
</body>
</html>