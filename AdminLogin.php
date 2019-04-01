<?php
    session_start();
    include('connection.php');

    if(isset($_POST["submit"])){
        $userName = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM admins WHERE userName = '$userName' AND password = '$password'";
        $result = mysqli_query($connection, $sql);

        if(!$result){
            header('Location:  AdminLogin.php');
            exit();
        }
        $count = mysqli_num_rows($result);

        if($count == 1){

          $_SESSION["username"] = $userName;

          if (isset($_SESSION['username']))
          {
              $username = $_SESSION['username'];

              header('Location:  dashboard.php');
              exit();
          }
        }else {
            echo "Invalid username or password";
        }
    }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div class="wrapper">
<div class="container">
    <h1>Welcome</h1>
    <form class="form" action="AdminLogin.php" method="post">
        <input type="text" name="username" placeholder="UserName"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="submit" name="submit" value="Login" id="login-button">
    </form>
  	</div>
  </div>
  </body>
</html>
