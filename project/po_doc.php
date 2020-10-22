<?php
require("server.php");
$po_id = $_GET['id'];
$userQuery = "SELECT * FROM `purchase order` 
                       JOIN vendor  USING (vendor_id)
                       JOIN company USING (company_id)
                       WHERE po_id = $po_id";
$result = mysqli_query($conn,$userQuery);
$userQuery2 = "SELECT * FROM `po detail` p inner join product d ON p.product_id = d.product_id where po_id = '$po_id'";
$result2 = mysqli_query($conn,$userQuery2);
$Query = "SELECT SUM(product_net) AS Total, FORMAT(SUM((product_net)*0.07),2) as TAX FROM `po detail` WHERE po_id = '$po_id'";
$result3 = mysqli_query($conn,$Query);

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Purchase Order Document</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(6) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    .invoice-box table tr td H3.vendor {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(6) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 1800px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(6) {
        text-align: left;
    }
    
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://dcassetcdn.com/design_img/2854917/520386/520386_15741944_2854917_ae76a10b_image.jpg" style="width:75%; max-width:300px;">
                            </td>
                            
                            <td>
                                <h1>Purchase Order</h1>
                                Purchase Order #: <?php echo $po_id;?><br>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                DATE :  <?php echo "".$row['po_date']."" ?><br>
                        
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               <H3 class="vendor">Vendor</H3>
                               Vendor Name:  <?php echo "".$row['vendor_name']."" ?><br>
                               Address: <?php echo "".$row['vendor_address']."" ?><br>
                               <?php echo "".$row['vendor_city']." ".$row['vendor_postcode']."" ?><br>
                               E-mail: <?php echo "".$row['vendor_email']."" ?><br>
                               Phone : <?php echo "".$row['vendor_phone']."" ?><br>
                                
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ship">
                                <h3 class="vendor">SHIP TO</h3>
                                Vendor Name:  <?php echo "".$row['company_name']."" ?><br>
                               Address: <?php echo "".$row['company_address']."" ?><br>
                               <?php echo "".$row['company_city']." ".$row['company_post']."" ?><br>
                               E-mail: <?php echo "".$row['company_email']."" ?><br>
                               Phone : <?php echo "".$row['company_phone']."" ?><br>
                               <?php } ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            <tr class="heading">
                <td> Item</td>
                <td> Product Description</td>
                <td> Qty</td>
                <td> Unit Price</td>
                
                <td> Total</td>     
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result2)) { ?>    
                <tr class="item">
                 
                        <?php echo "<td>".$row['product_name']."</td>" ?>
                        <?php echo "<td>".$row['product_descrip']."</td>" ?>
                        <?php echo "<td>".$row['qty']."</td>" ?>
                        <?php echo "<td>".$row['product_price']."</td>" ?>
                    
                        <?php echo "<td>".$row['product_net']."</td>" ?>                     
            </tr>
            <?php } ?>
            <?php while ($row = mysqli_fetch_assoc($result3)) { ?>
            <tr class="total"> 
                <td></td>
                <td></td>
                            <td></td>
                            <td></td>
                            
                <td>Sub Total |<?php $t = $row['Total']; ?><?php  echo "".$row['Total']."";?></td> 
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                            <td></td>
                            <td></td>
                            
            <td>Tax | 7% <?php $tax = $row['TAX']; ?></td> 
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                            <td></td>
                            <td></td>
                            
            <td>Total | <?php echo $t+$tax; ?></td> 
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>