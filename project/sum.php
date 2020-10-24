<?php

require_once "server.php";
require "navbar.php";

?>

<html>
    <head> 
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../project/css/msdee.css">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
      <h1 class="phead">  SUMMARY</h1>
      <div class="PO">
        <table style="width:90%">
      <tr>
          <th> DATE</th>
          <th> Between</th>
          <th> DATE</th>
      </tr>
      
      <div class="POdetail">
      <form action="sum_result.php" method="POST" style="border:1px solid gray;">
          <table>
              <tr>
                  <td><input type="date" name="date"></td>
                  <td></td>
                  <td><input type="date" name="due"></td>
              </tr>
              <tr>
    <td><input type="submit" value="submit"/></td>
    <td><input type="reset" value="reset"/></td>
</tr>
          </table>
      </form>
      </div>
      </div>