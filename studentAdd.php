<?php
session_start();
if(!$_SESSION['logged_in'])
{
    header("Location:login.php");
}
require_once("includes/config.php");
?>
<?php
if (isset($_POST['submit']))
{
	$name=$_POST["name"];
	$faculty=$_POST["faculty_id"];
	$address=$_POST["address"];
	$contact=$_POST["contact_no"];
	$status=$_POST["is_active"];
	$insert ='INSERT INTO `student` (`id`,`name`,`faculty_id`,`address`, `contact_no`,`is_active`) VALUES ("","'.$name.'","'.$faculty.'","'.$address.'","'.$contact.'","'.$status.'")';
	$check = mysqli_query($connection,$insert);
	if ($check)
	{
		
		$msg = "data inserted successfully";
		header('Location:index.php?msg='.$msg);
	}
	else 
	{
		$msg = "data is not inserted";
		header('Location:index.php?msg='.$msg);

	}
}

?>
<?php
$SQL="select * from faculty";
$RESULT=mysqli_query($connection,$SQL);
?>
<!DOCTYPE html>
<html>
<head>
	<title>LIBRARY MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<style>
	#header{
      background-color: #f1f1f1;
      width: 100%;
    }
    #navbar{
      margin: 0;
      width: 100%;
      overflow: hidden;
      height: 50px;
    }
    #navbar a{

      display: inline-block;
      text-align: center;
      float: right;
      width: 120px;
      height: 50px;
      color: #000;
      transition: 0.5s;
      text-decoration: none;
      padding-top: 8px;
      font-size: 25px;

    }
    #navbar a:hover{
      transform: scale(0.9);
      background-color: rgba(0,0,0,0.3);
    }
 * {
   box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
td{
      border: 1px solid #000;
      text-align: left;
      padding: 16px;
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
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

tr:nth-child(even) 
{
  background-color: #f2f2f2;
}
   </style>
  </head>
 <body>
	<header id="header">
    <H1 style="text-align:center">LIBRARY MANAGEMENT SYSTEM</H1>
    <nav id="navbar">
    <a href="index.php"><i class="fas fa-user-graduate"></i></a>
    </nav>
  </header>
 <div class="row">
 <div class="column">
 	<?php 
 		$sql = "select * from faculty";
 		$result = mysqli_query($connection, $sql);
 	?>
<form method="post" >
	<table class="table table-bodered">
		<tr>
			<th class="tablehead">Name</th>
			<td class="tbody"><input type="text" name="name" required="required" ></td>
		</tr>
		<tr>
			<th class="tablehead">Faculty</th>
			<td class="tbody">
				<select  name="faculty_id">
					<option>select faculty</option>
					<?php while($row = mysqli_fetch_assoc($result))
					{ ?>
							<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="tablehead">Address</th>
			<td class="tbody"><input type="text" name="address"></td>
		</tr>
		<tr>
			<th class="tablehead">Contact</th>
			<td class="tbody"><input type="text" name="contact_no"></td>
		</tr>
		<tr>
			<th class="tablehead">Status</th>
			<td class="tbody"><input type="radio" name="is_active" value="1">Active
				<input type="radio" name="is_active" value="0">Inactive</td>
		</tr>
		<tr>

			<th colspan="2" style="text-align: center;"><input type="submit" name="submit" value="Add Student"></th>
		</tr>
</table>
</form>
</div>
	<div class="column">
		<table><tr>
			<td class="tablehead">S.N.</td>
			<td class="tablehead">Faculty Name</td>
			<td class="tablehead">Faculty id</td>
		</tr>
		 <?php
       $i=1;
       while($ROW= mysqli_fetch_assoc($RESULT))
       {
     ?>
	   <tr> 
		<td class="tbody"><?php echo $i?></td>
		<td class="tbody"><?php echo $ROW['name']?></td>
		<td class="tbody"><?php echo $ROW['id']?></td>
	 <?php
       $i++;
      }
     ?>
		</table>
	</div>
	</div>
</body>
</html>