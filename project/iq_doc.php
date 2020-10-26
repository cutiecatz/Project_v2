<?php
require("server.php");
$inquiry_id = $_GET['id'];
$userQuery = "SELECT * FROM `inquiry` 
                       JOIN customer  USING (customer_id)
                       WHERE inquiry_id = $inquiry_id";
$result = mysqli_query($conn,$userQuery);
// $userQuery2 = "SELECT * FROM `po detail` p inner join product d ON p.product_id = d.product_id where po_id = '$po_id'";
// $result2 = mysqli_query($conn,$userQuery2);
?>
<div class="middle">
       <div class="document">
           <header>
                <div class="header">
                    <h1>Inquiry</h1>
                    Inquiry#: <?php echo $inquiry_id;?><br>
                </div>
            </header>
            <div class="date">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        DATE :  <?php echo "".$row['inquiry_date']."" ?><br>
                        Due DATE :  <?php echo "".$row['inquiry_due_date']."" ?><br>
                    <?php }?>
                </div>
                <!--------------- ------------->
            <div class="customer">
                    <div>
                        <p class="Address-Heading">Ship to: </p>
                        <H3 class="customer_info">Customer</H3>
                        Customer Name:  <?php echo "".$row['customer_name']."" ?><br>
                        Address: <?php echo "".$row['customer_bill']."" ?><br>
                        <?php echo "".$row['customer_bill_city']." ".$row['customer_bill_zipcode']."" ?><br>
                        E-mail: <?php echo "".$row['customer_email']."" ?><br>
                        Phone : <?php echo "".$row['customer_phone']."" ?><br>
                    </div>
                </div>
                <!--------------- ------------->
             <div class="content">
               <!-- <table class="product">
                     <tr>
                     <th colspan="3">Code</th>
                     <th colspan="3">Name</th>
                     <th colspan="3">Qty</th>
                    </tr>
                     <tr v-for="datas in data" :key="datas.materialID">
                        <td colspan="3">{{datas.MaterialCode}}</td>
                        <td colspan="3">{{datas.MaterialName}}</td>
                        <td colspan="3">{{datas.qty}}</td>
                    </tr>
                </table>  -->
            </div>
       </div>
   </div>