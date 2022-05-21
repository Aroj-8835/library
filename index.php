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
  <style type="text/css">
    #header{
      background-color: #f1f1f1;
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
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/frontend.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
  
  <?php 
  $sql ="select * from student";
  $result= mysqli_query($connection,$sql);
  ?>
<div id="header">
  <h1 style="text-align: center;">Library Management System</h1>
<nav id="navbar" >
  <?php echo getLoggedUser($_SESSION['user_logged_in'],$connection); ?>
  <a href="books.php"><i class="fas fa-book"></i></a>
  <a  href="studentAdd.php"><i class="fas fa-user-plus"></i></a>
  <a href="faculty.php">Faculty</a>
</nav>
</div>
<table id="studentData" >
  <thead>
   <tr >
    <td  class="tablehead">S.N.</td>
    <td class="tablehead">Name</td>
    <td class="tablehead" >Contact</td>
    <td class="tablehead" >Address</td>
    <td  class="tablehead">Faculty</td>
    <td class="tablehead">Status</td>
    <td class="tablehead">Delete</td>
    <td class="tablehead">Edit</td>
    <td class="tablehead">View</td>
  </tr>
 </thead>
 <tbody>
  <?php
  $i=1;
while($row= mysqli_fetch_assoc($result))
{
  $sql="select name from faculty where id = ".$row['faculty_id']. " limit 1";
  $show=mysqli_query($connection,$sql);
  $faculty_row=mysqli_fetch_array($show);

  ?>

  <tr> 
    <td class="tbody"><?php echo $i?></td>
    <td class="tbody"><?php echo $row['name']?></td>
    <td  class="tbody"><?php echo $row['contact_no']?></td>
    <td class="tbody"><?php echo $row['address']?></td>
    <td  class="tbody"><?php echo ($faculty_row['name']);?></td>
    <td class="tbody"><?php echo $row['is_active']?></td>
    <td class="tbody"><a href="studentDelete.php?id=<?php echo $row['id'];?>" onclick='return(confirm("Are you sure you want to delete?"));'><img src="assets\images\delete.png" width="20px" length="20px"></a></a></td>
    <td class="tbody"><a href="studentEdit.php?id=<?php echo $row['id'];?>"><img src="assets\images\edit.png" width="20px" length="20px"></a></td>
    <td class="tbody"><a href="view_assign_history.php?student_id=<?php echo $row['id']; ?>"><img src="assets\images\view.png" width="20px" length="20px"></td>
  </tr>

  <?php
  $i++;
  }
  ?>
  </tbody>
 </table>
 </body>
</html>