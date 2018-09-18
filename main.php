<?php include "html/header.php";?>
<?php include "db/db.php";?>

<body>
  <?php

    if(isset($_POST["submission"])){
      $username = $_POST["username"];
      $password = $_POST["password"];

      $connection = new mysqli('localhost', 'root', '', 'php');

      $query = "SELECT * FROM users";

      $result = $connection->query($query);

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