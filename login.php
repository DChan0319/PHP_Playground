<?php
  include "db/db.php";
  include "db/queries.php";

  function encrypt_password($password){
    $hash_format = "$2y$05$";
    $salt = "darrenchanwenttoUCDavis";
    $hash_salt = $hash_format . $salt;
    return crypt($password, $hash_salt);
  }

  if(isset($_POST["login"])){
    $conn = connect_to_db();
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $encrypt_password = encrypt_password($password);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $values = array($username, $encrypt_password);
    $select_query = select_from_where("*","users", $values);
    $find_credentials = $conn->query($select_query);
    $result = mysqli_fetch_array($find_credentials, MYSQLI_NUM);

    if($result[0]){
      session_start();
      $_SESSION['user'] = $username;
      echo "session set";
    }

  } else if (isset($_POST["register"])){
    $conn = connect_to_db();
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $encrypt_password = encrypt_password($password);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);

    $post_query = post_to(array("name","password"), "users", array($username,$encrypt_password));

    $register_user = $conn->query($post_query);

    if($register_user){
      echo "registered";
    }else{
      echo "not registered";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My first PHP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
    if(!(isset($_SESSION['user']))){
      echo "incorrect username/password. Please try again";
  ?>
      <form action="login.php" method="post">
        <input type="text" name="username" />
        <input type ="password" name="password" />
        <input type="submit" name="login" value="login"/>
      </form>
  <?php
    }
  ?>
</body>
</html>