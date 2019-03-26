<?php
include "config.php";
if(!$conn)
	{
		die("update 'config.php'");
	}
	$query="select*from $tablename";
	$result=mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($result))
	{
    ?>
    <form action="#" method="post">
      email:<input type="text" name="email" value='<?php echo $row['email']; ?>' disabled>
      name:<input type="text" name="name" value='<?php echo $row['name']; ?>'>
      age:<input type="number" name="age" value='<?php echo $row['age']; ?>'>
      <input type="submit" name="submit" value="update this data">
    </form>
    <?php
	}
  if(isset($_POST['submit'])){
    $update="update $tablename set name='".$_POST['name']."' and age=".$_POST['age']." where email='".$_POST['email']."'";
  	$result=mysqli_query($conn,$update);
    if ($result){
      $data["message"] = "data update successfully";
      $data["status"] = "true";
    }
    else{
      $data["message"] = "failed to update data";
      $data["status"] = "false";
    }
    echo json_encode($data);
  }
  ?>
