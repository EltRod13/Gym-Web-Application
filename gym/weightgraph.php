<?php
include_once 'navigation.php';
include_once 'functions/config.php';
include_once 'functions/actions.php';

$memberid = $_SESSION["membersId"];

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
    <thead>
<tr>
<th>Weight (in kg) </th>
<th>Date Recorded</th>
</tr>
</thead>
<?php

$sql = "SELECT * FROM weights WHERE member_wtfk = '$memberid' ORDER BY weightDateadded ASC; ";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tbody>" . "<tr><td>" . $row["weightSaved"]. "kg" . "</td><td>" . $row["weightDateadded"] . "</td></tr>" . "</tbody>";
}
echo "</table>";
} else { echo "<h1>" . "You have not saved any records of your weight" . "</h1>"; }

?>
</table>
</div>

<?php

$test=array();

$count=0;
$sql = "SELECT * FROM weights where member_wtfk = '$memberid' ORDER BY weightDateadded ASC";
$res = mysqli_query($connection, $sql);
while($row=mysqli_fetch_array($res))
{
    $test[$count]["label"]=$row["weightDateadded"];
    $test[$count]["y"]=$row["weightSaved"];
    $count = $count + 1;
}

 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Weight History"
	},
	axisY: {
		title: "Weight"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="margin: 50px 360px 70px; height: 370px; width: 50%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>