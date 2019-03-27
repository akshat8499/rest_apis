<?php
include "config.php";
if(!$conn)
	{
		die("update 'config.php'");
	}
	$query="select * from $tablename";
	$result=mysqli_query($conn,$query);
	echo "<form action='#' method='get'> <table>";
	while($row = mysqli_fetch_assoc($result))
	{
    ?>
		<br><input type='radio' name='radio_roll' value='<?php echo $row['roll']; ?>'>
		<?php
		echo $row['roll'];
	}
	echo "<br></table><input type='submit' name='submit'></form>";
  if(isset($_GET['submit'])){
    $update="delete from $tablename where roll='".$_GET['radio_roll']."'";
  	$result=mysqli_query($conn,$update);
    if ($result){
      $data["message"] = "deleted";
      $data["status"] = "true";
    }
    else{
      $data["message"] = "failed to delete data";
      $data["status"] = "false";
    }
    echo json_encode($data);
  }
  ?>
