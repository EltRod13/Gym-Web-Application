<?php

if(isset($_POST["submit"])) {

$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["uid"];
$pwd = $_POST["pwd"];
$pwdrepeat = $_POST["pwdrepeat"];
$age = $_POST["age"];
$address = $_POST["address"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$currentWeight = $_POST["currentWeight"];
$targetWeight = $_POST["targetWeight"];

require_once 'config.php';
require_once 'actions.php';

if(emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat,$age,$address,$startDate,$endDate,$currentWeight,$targetWeight) !== false) {
    header("location: ../member-signup.php?error=emptyinput");
    exit();
}


if(pwdMatch($pwd, $pwdrepeat) !== false) {
    header("location: ../member-signup.php?error=passwordsdontmatch");
    exit();
}

createUser($connection, $name, $email, $username, $pwd, $age, $address, $startDate, $endDate, $currentWeight, $targetWeight);

}

else{
    header("location: ../member-signup.php");
}

?>