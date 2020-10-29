<?php
require("server.php");
$id = $_GET['id'];
$userQuery = "SELECT * FROM `product` JOIN `storage detail` USING (product_id) WHERE storage_id = '$id'";
$result = mysqli_query($conn,$userQuery);
$i=0;
while ($row = mysqli_fetch_assoc($result)) { 
    $qty[$i] = $row['product_qty'];
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