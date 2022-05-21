<?php
session_start();
if(!$_SESSION['logged_in'])
{
  header("Location:login.php");
}
require_once("includes/config.php");
require_once("includes/function.php");
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
<header id="header">
    <H1 style="text-align:center">LIBRARY MANAGEMENT SYSTEM</H1>
     <nav id="navbar">
      <a href="index.php"><i class="fas fa-user-graduate"></i></a>
      <form method="post"  action="faculty.php" class="fl">
	  <input type="text" name="name" required="required" placeholder="Add Faculty">
	  <input type="submit" name="submit">
      </form>
    </nav>
 </header>
<?php 
$sql="select * from faculty";
$result= mysqli_query($connection,$sql);
?>
<br>
<body>
<table id="facultyData" >
 <thead>
   <tr>
    <td  class="tablehead">S.N.</td>
    <td class="tablehead">Faculty Name</td>
    <td class="tablehead">Delete</td>
    <td class="tablehead">Edit</td>
  </tr>
 </thead>
 <tbody>
	 <?php
       $i=1;
       while($row= mysqli_fetch_assoc($result))
       {
     ?>
	   <tr> 
		<td class="tbody"><?php echo $i?></td>
		<td class="tbody"><?php echo $row['name']?></td>
		<td class="tbody"><a href="facultyDelete.php?id=<?php echo $row['id'];?>" onclick='return(confirm("Are you sure you want to delete?"));'><img src="assets\images\delete.png" width="20px" height="20px"></a></td>
		<td class="tbody"><a href="facultyEdit.php?id=<?php echo $row['id'];?>"><img src="assets\images\edit.png" width="20px" height="20px"></a></td>
	   </tr>
    <?php
       $i++;
      }
      ?>
 </tbody>
</table>
<br>
<?php
if (isset($_POST['submit']))
{
	$name=$_POST["name"];
	$insert ='INSERT INTO `faculty` (`id`,`name`) VALUES ("","'.$name.'")';
	$check= mysqli_query($connection,$insert);

	if ($check) 
	{
		 echo "<script>window.location.href='faculty.php';</script>";
	}
	else {
		echo mysqli_error($connection);
	}
		
}
?>
 </body>
</html>