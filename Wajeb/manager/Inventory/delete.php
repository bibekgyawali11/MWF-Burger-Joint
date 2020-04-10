<?php
include ('../../connect.php');
session_start();
$n1=$_GET['n1'];
$sql= "DELETE from inventory where ID='$n1' "; 
$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/manager/Inventory/view_inventory.php');
?>