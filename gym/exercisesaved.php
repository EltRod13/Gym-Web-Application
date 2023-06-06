<?php
include 'functions/config.php';
include 'functions/actions.php';
include_once 'navigation.php';

$memberid = $_SESSION["membersId"];
$datechosen = $_SESSION["selecteddate"];


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/table.css">
</head>
<body>

<div class="table-wrapper">
<table class="fl-table">

<?php
 
 $sql = "SELECT * FROM exercises WHERE member_fk = '$memberid' AND exercises.exerciseDate = '$datechosen' ; ";
 $result = $connection->query($sql);
 if ($result->num_rows > 0) {
    echo "<h3>" . "Workout Session on " . $datechosen . "</h3>" ;
    echo "<thead>
    <tr>
    <th>Exercise Name</th>
    <th>Muscle Group</th>
    <th>Sets</th>
    <th>Reps</th>
    <th>Weight(in kg)</th>
    <th>Rest Time (in seconds)</th>
    </tr>
    </thead>";
 // output data of each row
 while($row = $result->fetch_assoc()) {
    if($row)
    {
 echo "<tbody>" . "<tr><td>" . $row["exerciseName"]. "</td><td>" . $row["exerciseMuscle"] . "</td><td>". $row["exerciseSets"] . "</td><td>"
 . $row["exerciseReps"] . "</td><td>" . $row["exerciseWeight"] . "kg" . "</td><td>". $row["exerciseRestTime"]. " seconds" . "</td></tr>" . "</tbody>";
    }
}
 echo "</table>";
 } else { echo "<h1>" . "No workout was recorded on this day" . "</h>"; }
 $connection->close();
?>
</table>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>