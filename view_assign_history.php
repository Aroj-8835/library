<?php
session_start();
if(!$_SESSION['logged_in'])
{
header("Location:login.php");
}

require_once("includes/config.php");
require_once("includes/function.php");

if(isset($_GET['clear_id']))
{
  $sql = "select * from issue where id =".$_GET['clear_id']." limit 1";
  $result         = mysqli_query($connection, $sql);
  $issue_row        = mysqli_fetch_assoc($result);
  $current_date     = date("Y-m-d",time());
  $date_difference  = abs(strtotime($current_date) - strtotime($issue_row['issue_date']));
  $date_difference =  floor($date_difference/(24*60*60)); 
  $sql = 'insert into `return` (`id`,`book_id`,`student_id`,`issued_date`,`return_date`,`fine`,`exceeded_days`) values ("",'.$issue_row["book_id"].','.$issue_row["id"].', "'.$issue_row["issue_date"].'","'.$current_date.'","","'.$date_difference.'")';
  
  mysqli_query($connection, $sql);
  $del_sql = "delete from issue where id =".$_GET['clear_id'];
  mysqli_query($connection, $del_sql);
  if($del_sql)
  {
  $add='update books set quantity = quantity+1 where books.id='.$issue_row['book_id'].'';
  mysqli_query($connection,$add);
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
    <a style="text_align:center" href="index.php">Go Back</a>
    <nav id="navbar">
       <a href="books.php"><i class="fas fa-book"></i></a>
      <a href="index.php"><i class="fas fa-user-graduate"></i></a>
      </form>
    </nav>
 </header>
<body>
  <?php 
  $sql = "select * from student where id=".$_GET['student_id']." limit 1";
  $result = mysqli_query($connection, $sql);
  $student = mysqli_fetch_assoc($result);
  
  ?>
Student Name: <?php echo $student['name']; ?>
<table id="viewData">
  <thead>
  <tr>
    <td class="tablehead" >S.N.</td>
    <td class="tablehead" >Book Name</td>
    <td class="tablehead">Issue Date</td>
    <td class="tablehead">Expected return</td>
    <td class="tablehead">Action</td>
  </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
  $days_valid = 5;
  $sql = "select * from issue where student_id=".$student['id'];
  $result = mysqli_query($connection,$sql);
  while($row = mysqli_fetch_assoc($result))
  {
    $expected_date =  date('Y-m-d', strtotime($row['issue_date']. ' + '.$days_valid.' days')); 
    $sql = "select * from books where id=".$row['book_id']." limit 1";
    $book_result = mysqli_query($connection, $sql);
    $book_selected = mysqli_fetch_assoc($book_result);
  ?>
  <tr> 
    <td class="tbody"class="tbody"><?php echo $i?></td>
    <td class="tbody"><?php echo $book_selected['name']?></td>
    <td class="tbody"><?php echo $row['issue_date']?></td>
    <td class="tbody"><?php echo $expected_date; ?></td>
    <td class="tbody"><a href="view_assign_history.php?student_id=<?php echo $student['id']; ?>&clear_id=<?php echo $row['id']; ?>" onclick='return(confirm("Are you sure you want to clear?"));'>Clear</a></td>
  </tr>

<?php 
  $i++;
}
?>
</tbody>
</table>


Add Book: <input type="text" id="search_book" name="">
<input type="hidden" id="student_id" name="student_id" value="<?php echo $student['id']; ?>" />
</body>
</html>