<html>
  <body>
    <form action="#" method="post">
      Enter Name<input type="text" name="name"><br>
      Enter Department name<input type="text" name="dept"><br>
      Enter Position<input type="text" name="pos"><br>
      Enter Employee ID<input type="number" name="eid"><br>
      <input type="submit" name="submit" value="insert data">
    </form>
    <?php
    if(isset($_POST['submit'])){
      include "config.php";
      if(!$conn)
      {
        die("update 'config.php'");
      }
      $query="insert into $tablename(`name`,`dept`,`pos`,`eid`) values('".$_POST['name']."','".$_POST['dept']."','".$_POST['pos']."',".$_POST['eid'].")";
      $result=mysqli_query($conn,$query);
      if ($result){
        $data["message"] = "data inserted successfully";
        $data["status"] = "true";
      }
      else{
        $data["message"] = "failed to insert data";
        $data["status"] = "false";
      }
      echo json_encode($data);
    }
    ?>
  </body>
</html>
