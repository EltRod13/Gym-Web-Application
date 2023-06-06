<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/loginpage.css">
</head>

<body>
    
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<nav class="navbar">
            <a href="index.html" class="navbar__logo">Gym Mania</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <div class="navbar__menu">
                <a href="member-signup.php" class="navbar__link">Sign Up</a>
                <a href="member-login.php" class="navbar__link">Log In</a>
                
            </div>
        </nav>

<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <form action="functions/member-login-aut.php" method="post">
       <input type="text" name="uid" placeholder="Username...">
       <input type="password" name="pwd" placeholder="Password...">
       <button type="submit" name="submit">Log In</button>
    </form>  
</div>

<?php
  if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput") {
      echo "<p>Please complete all fields!</p>";
    }
    else if($_GET["error"] == "wronglogin") {
      echo "<p>Login Unsuccessful!</p>";
    }
    else if($_GET["error"] == "none") {
      echo "<p>Logged in!</p>"; 
    }
  }

?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>