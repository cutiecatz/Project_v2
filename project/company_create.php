<?php
require("server.php");

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/project_v2/project/css/style_v2.css">
</head>

<h1 class="head">Add Customer</h1>
<div class="container">
  <form action="company_add.php">

    <label for="id">ID</label>
    <input type="text" name="company_id" placeholder="your id...">

    <label for="cname">Company Name</label>
    <input type="text" name="company_name" placeholder="your company name...">

    <label for="code">Company Code</label>
    <input type="text" name="company_code" placeholder="your company code...">

    <label for="add">Address</label>
    <input type="text" name="company_add" placeholder="your company address...">

    <label for="city">City</label>
    <input type="text" name="company_city" placeholder="your company city...">

    <label for="pcode">Post Code</label>
    <input type="text" name="company_post" placeholder="your company post code...">

    <label for="phone">Telephone </label>
    <input type="text" name="company_phone" placeholder="your company telephone...">

    <label for="mail">E-mail </label>
    <input type="text" name="email" placeholder="your company email...">




    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
</table>
</form>
</html>