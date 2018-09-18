<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My First PHP App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
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

      // if($result){
      //   echo "queried to db php";
      // } else {
      //   die("query failed connection");
      // }
    }
  ?>

<form action="" method="post">
  <input type="text" name="username" />
  <input type ="password" name="password" />
  <input type="submit" name="submission"/>
  </form>
</body>
</html>