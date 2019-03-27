<?php
include "config.php";
if(!$conn)
	{
		die("update 'config.php'");
  }
  if(isset($_POST['submit'])){
    $updatename="update $tablename set name='".$_POST['name']."' where eid=".$_POST['eid'];
    $resultname=mysqli_query($conn,$updatename);
    $updatepos="update $tablename set pos='".$_POST['pos']."' where eid=".$_POST['eid'];
    $resultpos=mysqli_query($conn,$updatepos);
    $updatedept="update $tablename set dept='".$_POST['dept']."' where eid=".$_POST['eid'];
    $resultdept=mysqli_query($conn,$updatedept);
    if ($resultpos==1 && $resultdept==1 && $resultname==1){
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
      email:<input type="text" name="eid" value='<?php echo $row['eid']; ?>' disabled>
      name:<input type="text" name="name" value='<?php echo $row['name']; ?>'>
      name:<input type="text" name="pos" value='<?php echo $row['pos']; ?>'>
      age:<input type="number" name="dept" value='<?php echo $row['dept']; ?>'>
      <input type="submit" name="submit" value="update this data">
    </form>
    <?php
    if(isset($data))
    echo json_encode($data);
	}
  
  ?>
