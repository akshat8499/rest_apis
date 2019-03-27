<html>
  <body>
    <form action="#" method="post">
      Enter Name<input type="text" name="name"><br>
      Enter age<input type="text" name="age"><br>
      Enter email<input type="text" name="email"><br>
      <input type="submit" name="submit" value="insert data">
    </form>
    <?php
    if(isset($_POST['submit'])){
      include "config.php";
      if(!$conn)
      {
        die("update 'config.php'");
      }
      $query="insert into $tablename(`name`,`email`,`age`) values('".$_POST['name']."','".$_POST['email']."',".$_POST['age'].")";
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
