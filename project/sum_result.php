<?php

require_once "server.php";
require "navbar.php";
$date = $_POST['date'];
$due_date=$_POST['due'];
$userQuery = "SELECT * FROM `product` JOIN `cutstock` USING (product_id) WHERE cut_date BETWEEN '$date' AND '$due_date'";
$result = mysqli_query($conn,$userQuery);
$i=0;
while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['cut_qty'];
    $name[$i] = $row['product_name'];
    $i++;
}
for($i=0;$i<count($name);$i++){
$dataPoints[$i] =  array("y" => $qty[$i], "label" => "$name[$i]" );
}
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "SUMMARY"
	},
	subtitles: [{
		text: "<?php echo $date."\tTO\t".$due_date ?>"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0\" Piece\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 