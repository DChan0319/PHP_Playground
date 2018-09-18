<?php 
  include "html/header.php";
  include "db/db.php";
  include "db/queries.php";
?>


<body>
  <?php

    if(isset($_POST["submission"])){
      $conn = connect_to_db();

      $hash_format = "$2y$05$";
      $salt = "darrenchanwenttoUCDavis";
      $hash_salt = $hash_format . $salt;
      $password = mysqli_real_escape_string($conn, $_POST["password"]);
      $encrypt_password = crypt($password, $hash_salt);

      $username = mysqli_real_escape_string($conn, $_POST["username"]);

      $select_query = select_from("*","users");
      $select_result = $conn->query($select_query);

      $content = array("name", "password");
      $values = array($username, $encrypt_password);
      $post_query = post_to($content, "users", $values);

      $post_result = $conn->query($post_query);

      if($post_result){
        echo "posted!";
      } else {
        echo $post_query;
      }

      while($row = mysqli_fetch_assoc($select_result)){
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