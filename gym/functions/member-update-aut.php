<?php
session_start();
require_once 'config.php';
require_once 'actions.php';
$memberid = $_SESSION['membersId'];



if(isset($_POST["submit"]))
  {
    $newname = $_POST["name"];
    $newemail = $_POST["email"];
    $newusername = $_POST["uid"];
    $newage = $_POST["age"];
    $newaddress = $_POST["address"];
    $newstartdate = $_POST["startDate"];
    $newenddate = $_POST["endDate"];
    $newcw = $_POST["currentWeight"];
    $newtw = $_POST["targetWeight"];

    $select = "SELECT * FROM members WHERE members.memberId = '$memberid'";
    $query = mysqli_query($connection, $select);
    $row = mysqli_fetch_assoc($query);

    $res = $row['memberId'];
    
    if($res == $memberid)
    {
        $data = "UPDATE members SET members.memberName='$newname', members.memberEmailId='$newemail', members.memberUsername='$newusername', members.memberAge='$newage', members.memberAddress='$newaddress',members.memberStartdate= '$newstartdate', members.memberEnddate='$newenddate', members.memberCurrentweight='$newcw', members.memberTargetweight='$newtw' WHERE members.memberId = '$memberid' ";
        $query2 = mysqli_query($connection,$data);
    
        header("location: ../profile.php");
    

  }

}

?>