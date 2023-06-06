<?php

if(isset($_POST["submit"])) {
   
   $username = $_POST["uid"];
   $pwd = $_POST["pwd"];

   require_once 'config.php';
   require_once 'actions.php';

   if(emptyInputLogin($username, $pwd) !== false) {
    header("location: ../member-login.php?error=emptyinput");
    exit();
}

loginUser($connection, $username, $pwd);


}

else {
    header("location: ../member-login.php");
    exit();
}


?>