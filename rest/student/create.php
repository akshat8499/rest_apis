<html>
  <body>
    <form action="#" method="post">
      Enter Name<input type="text" name="name"><br>
      Enter age<input type="number" name="age"><br>
      Enter roll number<input type="number" name="roll"><br>
      <input type="submit" name="submit" value="insert data">
    </form>
    <?php
    if(isset($_POST['submit'])){
      include "config.php";
      if(!$conn)
      {
        die("update 'config.php'");
      }
      $query="insert into $tablename(`name`,`roll`,`age`) values('".$_POST['name']."',".$_POST['roll'].",".$_POST['age'].")";
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
