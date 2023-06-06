<?php

include 'database_helper.php';

function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat,$age,$address,$startDate,$endDate, $currentWeight, $targetWeight) {
   $result;
   if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdrepeat)||empty($age)||empty($address)||empty($startDate)||empty($endDate)||empty($currentWeight)||empty($targetWeight)){
       $result = true;
   } 
    else {
       $result = false;
   } 

   return $result;

}

 function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    } 
    
    else {
        $result = false;
    }
 
    return $result;
 }

 function uidExists ($connection, $username, $email) {
    $sql = "SELECT * FROM members WHERE memberUsername = ? OR memberEmailId = ?;";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../member-signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $matched_users_query = prepareAndExecuteQuery($connection, "SELECT memberUsername FROM members WHERE memberEmailId= ?;" , 's', [$email]);

    $user_exists = mysqli_num_rows($matched_users_query) > 0;
    if ($user_exists) {
        $row = mysqli_fetch_array($matched_users_query);
        $_SESSION['username'] = $row['memberUsername'];
    }

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
        
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


 function createUser($connection, $name, $email, $username, $pwd, $age, $address, $startDate, $endDate, $currentWeight, $targetWeight) {
   $sql = "INSERT INTO members (memberName, memberEmailId, memberUsername, memberPassword, memberAge, memberAddress, memberStartdate, memberEnddate, memberCurrentweight, memberTargetweight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
   $stmt = mysqli_stmt_init($connection);
   if(!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../member-signup.php?error=stmtfailed");
     exit();
   }

   $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

   mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $email, $username, $hashedPwd, $age, $address, $startDate, $endDate, $currentWeight, $targetWeight);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../profile.php?error=none");

   $uidExists = uidExists($connection, $username, $username);
   session_start();
        $_SESSION["membersId"] = $uidExists["memberId"];
        $_SESSION["membersUid"] = $uidExists["memberUsername"];
     exit();

 }

 function emptyInputLogin($username, $pwd) {
    $result;
    if(empty($username)||empty($pwd)){
        $result = true;
    } 
     else {
        $result = false;
    } 
 
    return $result;
 
 }

 function loginUser($connection, $username, $pwd) {
    $uidExists = uidExists($connection, $username, $username);
 
    if ($uidExists === false) {
        header("location: ../member-login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["memberPassword"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../member-login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["membersId"] = $uidExists["memberId"];
        $_SESSION["membersUid"] = $uidExists["memberUsername"];
        header("location: ../profile.php");
        exit();
    }
}

function getUsersData ($connection, $id)
{
    $array = array();
    $sql = "SELECT * FROM members WHERE members.memberId = '$id' ";
    $result = $connection->query($sql);
    if ($result->num_rows > 0)
    while($row = $result->fetch_assoc())
    {
        $array['memberId'] = $row['memberId'];
        $array['memberName'] = $row['memberName'];
        $array['memberEmailId'] = $row['memberEmailId'];
        $array['memberUsername'] = $row['memberUsername'];
        $array['memberPassword'] = $row['memberPassword'];
        $array['memberAge'] = $row['memberAge'];
        $array['memberAddress'] = $row['memberAddress'];
        $array['memberStartdate'] = $row['memberStartdate'];
        $array['memberEnddate'] = $row['memberEnddate'];
        $array['memberCurrentweight'] = $row['memberCurrentweight'];
        $array['memberTargetweight'] = $row['memberTargetweight'];

    } 
    return $array;
}

function getId($connection, $username)
{
    $sql = "SELECT * FROM members WHERE members.memberUsername = '$username'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0)
    while($row = $result->fetch_assoc())
    {
        return $row['memberId'];
    } 
}

function getSelectedDate ($connection, $selecteddate)
{
    session_start();
        $_SESSION["selecteddate"] = $selecteddate;
        header("location: ../exercisesaved.php");
        exit();
}


?>