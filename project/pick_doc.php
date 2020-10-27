<?php
require("server.php");
$pick_id = $_GET['id'];
$userQuery = "SELECT * FROM `picking` 
                        JOIN `sale order` USING (sale_id)
                        JOIN quotation USING (quo_id)
                        JOIN inquiry USING (inquiry_id)
                        JOIN storage USING (storage_id)
                        JOIN employee  USING (employee_id)
                        JOIN company  USING (company_id)
                        JOIN customer USING (customer_id)
                       WHERE pick_id = $pick_id";
$result = mysqli_query($conn,$userQuery);
// $userQuery2 = "SELECT * FROM `sale detail` p join product d USING(product_id) where sale_id = '$sale_id'";
// $result2 = mysqli_query($conn,$userQuery2);
// $Query = "SELECT SUM(net) AS Total, FORMAT(SUM((net)*0.07),2) as TAX FROM `sale detail` WHERE sale_id = '$sale_id'";
// $result3 = mysqli_query($conn,$Query);
?>
<!doctype html>
<html>
<head>
</head>
<body>
    <div class="middle">
        <div class="document">
            <header>
                    <div class="header">
                        <h1>Picking Document</h1>
                        Picking Document#: <?php echo $pick_id;?><br>
                    </div>
            </header>
                <div class="date">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            Picking DATE :  <?php echo "".$row['pick_date']."" ?><br>
                </div>
                    <!--------------- ------------->
                <div class="company_to">
                        <div>
                            <p class="Address-Heading_from">From : </p>
                            Customer Name:  <?php echo "".$row['company_name']."" ?><br>
                            Address: <?php echo "".$row['company_address']."" ?><br>
                            <?php echo "".$row['company_city']." ".$row['company_post']." ".$row['company_country']."" ?><br>
                            E-mail: <?php echo "".$row['company_email']."" ?><br>
                            Phone : <?php echo "0".$row['company_phone']."" ?><br>
                        </div>
                </div>
                <div class="customer_from">
                        <div>
                            <p class="Address-Heading_from">To : </p>
                            Customer Name:  <?php echo "".$row['company_name']."" ?><br>
                            Address: <?php echo "".$row['company_address']."" ?><br>
                            <?php echo "".$row['company_city']." ".$row['company_post']." ".$row['company_country']."" ?><br>
                            E-mail: <?php echo "".$row['company_email']."" ?><br>
                            Phone : <?php echo "0".$row['company_phone']."" ?><br>
                        </div>
                </div>
                <div class="content">
                <table class="info">
                        <tr>
                            <th>Order#</th>
                            <th>S.O.Date</th>
                            <th>Shipped VIA</th>
                            <th>Delivery Date</th>
                            <th>F.O.B. Point </th>
                            <th>TERMS </th>
                        </tr>
                            <tr class="order_info">
                                <?php echo "<td>".$row['sale_id']."</td>" ?>
                                <?php echo "<td>".$row['sale_date']."</td>" ?>
                                <?php echo "<td>".$row['ship_method']."</td>" ?>
                                <?php echo "<td>".$row['sale_due_date']."</td>" ?>
                                <?php echo "<td> Destination </td>" ?>
                                <?php echo "<td> Net 30 </td>" ?>
                            </tr>
                        <?php } ?>
</body>