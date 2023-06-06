<?php
include_once 'navigation.php';
include_once 'functions/config.php';
require 'functions/actions.php';
$memberid = $_SESSION['membersUid'];

$usersData = getUsersData($connection, getId($connection, $memberid));

$fn = $usersData['memberName'];
$em = $usersData['memberEmailId'];
$un = $usersData['memberUsername'];
$age = $usersData['memberAge'];
$add = $usersData['memberAddress'];
$sd = $usersData['memberStartdate'];
$ed = $usersData['memberEnddate'];
$cw = $usersData['memberCurrentweight'];
$tw = $usersData['memberTargetweight'];

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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<div class="logo"></div>
<div class="login-block">
    <h1>Membership Details</h1>
    <form action="functions/member-update-aut.php" method="post">
      <input type="text" value="<?php echo "$fn" ?>" name="name" placeholder="Full name...">
      <input type="text" value="<?php echo "$em" ?>" name="email" placeholder="Email...">
      <input type="text" value="<?php echo "$un" ?>" name="uid" placeholder="Username...">
      <input type="text" value="<?php echo "$age" ?>" name="age" placeholder="Age...">
      <input type="text" value="<?php echo "$add" ?>" name="address" placeholder="Address...">
      <input type="date" value="<?php echo "$sd" ?>" name="startDate" placeholder="Start Date...">
      <input type="date" value="<?php echo "$ed" ?>" name="endDate" placeholder="End Date...">
      <input type="text" value="<?php echo "$cw" ?>" name="currentWeight" placeholder="Address...">
      <input type="text" value="<?php echo "$tw" ?>" name="targetWeight" placeholder="Address...">

      <button type="submit" name="submit">Update</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>