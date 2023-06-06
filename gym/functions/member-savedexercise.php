<?php

if(isset($_POST["submit"])) {
   
   $selecteddate = $_POST["selecteddate"];

   require_once 'config.php';
   require_once 'actions.php';
   getSelectedDate($connection, $selecteddate);


}

else {
    header("location: ../exercisedatecheck.php");
    exit();
}


?>