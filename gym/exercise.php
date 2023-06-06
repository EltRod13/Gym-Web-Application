<?php
include_once 'navigation.php';
include_once 'functions/config.php';
include_once 'functions/actions.php';



if(isset($_REQUEST["submit"])){

  $name = $_REQUEST["name"];
  $muscle = $_REQUEST["muscle"];
  $sets = $_REQUEST["sets"];
  $reps = $_REQUEST["reps"];
  $weight = $_REQUEST["weight"];
  $resttime = $_REQUEST["resttime"];
  $date = $_REQUEST["date"];
  $memberid = $_SESSION["membersId"];

  $ins = "INSERT INTO exercises (exerciseName,exerciseMuscle,exerciseSets,exerciseReps,exerciseWeight,exerciseRestTime,member_fk,exerciseDate) VALUES ('$name','$muscle','$sets','$reps','$weight','$resttime','$memberid','$date');";

  $query = mysqli_query($connection, $ins);

  
  


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginpage.css">
</head>
<body>
    

<!-- form start -->
<div class="login-block">
<h1>EXERCISE TRACKER</h1>
    <form>
       
       <input type="text" name="name" placeholder="Exercise Name...">
       <input type="text" name="muscle" placeholder="Muscle Group...">
       <input type="text" name="sets" placeholder="Number of Sets...">
       <input type="text" name="reps" placeholder="Number of Reps...">
       <input type="text" name="weight" placeholder="Weight(in kg)...">
       <input type="text" name="resttime" placeholder="Rest Time (in seconds)...">
       <input type="date" name="date" placeholder="Exercise Name...">
       <button type="submit" name="submit">Submit Exercise</button>
    </form>
    <button onclick="window.location.href = 'exercisedatecheck.php';">Exercise History</button>
</div>      
<!-- form end -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>