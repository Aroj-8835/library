<?php

session_start();
if(!$_SESSION['logged_in'])
{
   header("Location:login.php");
}
require_once("includes/config.php");
$books_id = $_GET['id'];
$sql = 'select * from books where id='.$books_id;
$result = mysqli_query($connection,$sql);


if (!empty($result))
{
	$row = mysqli_fetch_assoc($result);
	$name=$row["name"];
	$author_name=$row["author"];
	$quantity=$row["quantity"];
	$update_id= $row['id'];
}
else{
	$name='';
	$author_name='';
	$quantity='';
	$update_id='';
    }
	
if(isset($_POST['submit']))
{

	$books_id=$_POST['update_id'];
    $name=$_POST["name"];
    $author_name=$_POST["author"];
	$quantity=$_POST["quantity"];
 	$update= "UPDATE `books` SET `id`='".$books_id."',`name`='".$name."',`author`='".$author_name."',`quantity`='".$quantity."'
 	WHERE id= '".$books_id."'";
	$check = mysqli_query($connection,$update);
	if ($check)
	 {
		echo "<hr>";
		echo "books edited successfully";
	 }else 
	 {
		echo "<hr>";
		echo "books is not edited";
		echo mysqli_error($connection);
	 }
}


?>
<!DOCTYPE html>
<html>
 <head>
	<title>LIBRARY MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
   <style type="text/css">
    #header{
      background-color: #f1f1f1;
      /*width: 1500px;*/
      width: 100%;
    }
    #navbar{
      margin: 0;
      width: 100%;
      overflow: hidden;
      height: 30px;
    }
    .fl{
    	float: right;
    }
    #navbar a{

      display: inline-block;
      text-align: center;
      float: right;
      width: 120px;
      height: 30px;
      color: #000;
      transition: 0.5s;
      text-decoration: none;
      font-size: 20px;

    }
    #navbar a:hover{
      transform: scale(0.9);
      background-color: rgba(0,0,0,0.3);
    }
    td{
      border: 1px solid #000;
    }
    .tablehead{
      font-weight: bolder;
      border: 2px solid #000;
      background-color: #126284;
      color: #fff;
    }
    .tbody{
      background-color: #C4DBE5;
      color: #000000;
    }
    </style>
  </head>
 <body>
	<header id="header">
	<H1 style="text-align:center">LIBRARY MANAGEMENT SYSTEM</H1>
	</header>
    <form method="post" >
	<table style="font-family: arial, sans-serif;
     border-collapse: collapse;
      width: 100%;">
        <tr>
			<th class="tablehead">Book id</th>
			<td class="tbody"><input type="text" name="id" value="<?php echo $books_id;?>"></td>
		</tr>
		<tr>
			<th class="tablehead">Book name</th>
			<td class="tbody"><input type="text" name="name" value="<?php echo $name;?>"></td>
		</tr>
		<tr>
			<th class="tablehead">Author name</th>
			<td class="tbody"><input type="text" name="author" value="<?php echo $author_name;?>"></td>
		</tr>
		<tr>
			<th class="tablehead">quantity</th>
			<td class="tbody"><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
		</tr>
		<tr>
			<th class="tablehead"><td class="tbody"><input type="submit" name="submit"></td></th>
		</tr>
		<tr>
			<th class="tablehead"><td class="tbody"><a href="books.php" class="btn"> GO BACK</a></td></th>
		</tr>
	
		
	  </table>
	<input type="hidden" name="update_id" value="<?php echo $books_id ;?>">
  </form>
 </body>
</html>