<?php
include "config.php";
if(!$conn)
	{
		die("update 'config.php'");
  }
if(isset($_POST['submit'])){
  $updateage="update $tablename set age=".$_POST['age']." where email='".$_POST['email']."'";
  $resultage=mysqli_query($conn,$updateage);
  $updatename="update $tablename set name='".$_POST['name']."' where email='".$_POST['email']."'";
  $resultname=mysqli_query($conn,$updatename);
  if ($resultage==1 && $resultname==1){
    $data["message"] = "data update successfully";
    $data["status"] = "true";
  }
  else{
    $data["message"] = "failed to update data";
    $data["status"] = "false";
  }
}
	$query="select*from $tablename";
	$result=mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($result))
	{
    ?>
    <form action="#" method="post">
      email:<input type="text" name="email" value='<?php echo $row['email']; ?>' readonly>
      name:<input type="text" name="name" value='<?php echo $row['name']; ?>'>
      age:<input type="number" name="age" value='<?php echo $row['age']; ?>'>
      <input type="submit" name="submit" value="update this data">
    </form>
    <?php
  }
  if(isset($data))
    echo json_encode($data);
  ?>
