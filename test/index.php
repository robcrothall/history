<!DOCTYPE HTML>
<html>
  <head>
	<meta charset="UTF-8">    
	<title>Class test</title>
  </head>
  <body>
    <h1>Hello World!</h1>
<?php 
	include("class_lib.php");

	$Admin = new table("Administration");
	
	echo "Table name: " . $Admin->get_name() . "<br>";
	//echo "Columns: " . $Admin->get_cols() . "<br>";
	print_r($Admin->get_cols());
	echo "<br>";
	$dummy = $Admin->add_cols("changed");
	print_r($Admin->get_cols());
	echo "<br>";
	print_r($dummy);
	$dummy = $Admin->dequeue_cols();
	echo "Removing first element: " . $dummy . "<br>";
	print_r($Admin->get_cols());
?>
  </body>
</html>
