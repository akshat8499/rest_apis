<?php
header("content-type:application/json");
include "config.php";
if(!$conn)
	{
		die("update 'config.php'");
	}
	$query="select*from $tablename";
	$result=mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$output[]=$row;
	}
	print(json_encode($output));
	?>
