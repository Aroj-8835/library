<?php
session_start();
require_once("includes/config.php");
if(!$_SESSION['logged_in'])
{
  header("Location:login.php");
}
$student_id = $_GET['id'];
$sql = 'select * from student where id='.$student_id;
$result = mysqli_query($connection,$sql);
if (!empty($result)){
	$row = mysqli_fetch_assoc($result);
	$name=$row["name"];
	$faculty=$row["faculty_id"];
	$address=$row["address"];
	$contact=$row["contact_no"];
	$status=$row["is_active"];
	$update_id= $row['id'];
}
else{
	$name     ='';
	$faculty  ='';
	$address  ='';
	$contact  ='';
	$status   ='';
	$update_id='';
}
	
if(isset($_POST['submit'])){
	$student_id=$_POST['update_id'];
    $name      =$_POST["name"];
	$faculty   =$_POST["faculty_id"];
	$address   =$_POST["address"];
	$contact   =$_POST["contact_no"];
	$status    =$_POST["is_active"];

    $update= "UPDATE `student` SET `id`='".$student_id."',`name`='".$name."',`faculty_id`='".$faculty."',`contact_no`='".$contact."',`address`='".$address."',`is_active`='".$status."' WHERE id= '".$student_id."'";
    $check = mysqli_query($connection,$update);
	if ($check) {
		$msg = "student edited successfully";
		header('Location:index.php?msg='.$msg);
	    header('index.php');
	}
	else {
		$msg = "could not edit";
		header('Location:index.php?msg='.$msg);
		echo mysqli_error($connection);
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>LIBRARY MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/frontend.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
   <style type="text/css">
    #header{
      background-color: #f1f1f1;
      width: 100%;
    }
    #navbar{
      margin: 0;
      width: 100%;
      overflow: hidden;
      height: 50px;
      background-color: #f1f1f1;
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
      padding-top: 8px;
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
 <header id="header">
   <H1 style="text-align:center">LIBRARY MANAGEMENT SYSTEM</H1>
 </header>
<body>
	<?php 
 		$sql = "select * from faculty";
 		$result = mysqli_query($connection, $sql);
 	?>
<form method="post" >
	<table style="font-family: arial" class="table table-bodered">
		<tr>
			<th class="tablehead">Name</th>
			<td class="tbody"><input type="text" name="name" value="<?php echo $name;?>"></td>
		</tr>
		<tr>
			<th class="tablehead">Faculty Id</th>
			<td class="tbody">
				<select  name="faculty_id">
					<option>select faculty</option>
					<?php while($row = mysqli_fetch_assoc($result)){ ?>
							<option value="<?php echo $row['id']; ?>" <?php if($faculty == $row['id']){ ?> selected="selected" <?php } ?>><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<th class="tablehead">Address</th>
			<td class="tbody"><input type="text" name="address" value="<?php echo $address;?>"></td>
		</tr>
		<tr>
			<th class="tablehead">Contact</th>
			<td class="tbody"><input type="text" name="contact_no" value="<?php echo $contact;?>"></td>
		</tr>
		<tr>
			<th class="tablehead">Status</th>
			<td class="tbody"><input type="radio" name="is_active"<?php if ($status==1) {echo 'checked="checked"';}?> value="1">Active
				<input type="radio" name="is_active" <?php if ($status==0) {echo 'checked="checked"';}?> value="0">Inactive</td>
		</tr>
		<tr>
			<th class="tablehead"><td class="tbody"><a href="index.php"><input type="submit" name="submit" ></a></td></th>
		</tr>
		<tr>
			<th class="tablehead"><td><a href="index.php" class="btn"> GO BACK</a></td></th>
		</tr>
	</table>
	<input type="hidden" name="update_id" value="<?php echo $student_id;?>">
</form>
</body>
</html>