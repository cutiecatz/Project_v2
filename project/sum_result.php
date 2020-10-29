<?php
require_once "navbar.php";
require_once "server.php";
$date = $_POST['date'];
$due_date=$_POST['due'];
$userQuery = "SELECT DISTINCT product_id,product_name FROM `product` JOIN `cutstock` USING (product_id)
	JOIN picking USING (pick_id)
    WHERE pick_date BETWEEN '$date' AND '$due_date' ";
$result = mysqli_query($conn,$userQuery);
$i=0;
while ($row = mysqli_fetch_assoc($result)) { 
	$id[$i] = $row['product_id'];
	$name[$i] = $row['product_name'];
	$Query = "SELECT * FROM cutstock WHERE product_id = '$id[$i]' AND cut_date  BETWEEN '$date' AND '$due_date' ";
    $res = mysqli_query($conn,$Query);
	$qty[$i] = 0;
	while($row2 = mysqli_fetch_assoc($res)){
		  $q1 = $row2['cut_qty'];
		$qty[$i] += $q1;   
	}
    $i++;
}
for($i=0;$i<count($name);$i++){
$dataPoints[$i] =  array("y" => $qty[$i], "label" => "$name[$i]" );
}
?>

<!DOCTYPE HTML>
<html>
<head>
<tr>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Stock"
	},
	axisY: {
		title: "Unit"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## piece",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</tr>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>