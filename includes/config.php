<?php 
defined( "DB_SERVER")? NULL : define("DB_SERVER","localhost");
defined( "DB_USER")? NULL : define("DB_USER","root");
defined( "DB_PASS")? NULL : define("DB_PASS","");
defined( "DB_NAME")? NULL : define("DB_NAME","library");
$connection= mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$connection)
{
	echo "Database connection Failed" . mysqli_error($connection);
}
else{
	// echo "connection successful";
}
?>