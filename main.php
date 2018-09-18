<?php 
  include "html/header.php";
  include "db/db.php";
  include "db/queries.php";
?>


<body>
  <?php

    if(isset($_POST["submission"])){
      $username = $_POST["username"];
      $password = $_POST["password"];

      $conn = connect_to_db();
      $query = select_from("*","users");

      $result = $conn->query($query);

      while($row = mysqli_fetch_assoc($result)){
        print_r($row);
      }
    }
  ?>

<form action="" method="post">
  <input type="text" name="username" />
  <input type ="password" name="password" />
  <input type="submit" name="submission"/>
  </form>
</body>
</html>