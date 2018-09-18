<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My First PHP App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<form action="login.php" method="post">
  <input type="text" name="username" />
  <input type ="password" name="password" />
  <input type="submit" name="login" value="login"/>
  <input type="submit" name="register" value="register"/>
</form>

<br>

<a href="get.php?search=friends&top=10">Get friends</a>

</body>
</html>