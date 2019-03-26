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
      email:<input type="text" name="eid" value='<?php echo $row['eid']; ?>' disabled>
      name:<input type="text" name="name" value='<?php echo $row['name']; ?>'>
      name:<input type="text" name="pos" value='<?php echo $row['pos']; ?>'>
      age:<input type="number" name="dept" value='<?php echo $row['dept']; ?>'>
      <input type="submit" name="submit" value="update this data">
    </form>
    <?php
	}
  if(isset($_POST['submit'])){
    $update="update $tablename set name='".$_POST['name']."' and pos='".$_POST['pos']."' and dept='".$_POST['dept']."' where eid=".$_POST['eid'];
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
