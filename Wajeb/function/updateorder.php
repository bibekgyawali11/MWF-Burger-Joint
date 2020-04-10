<?php
include ('../connect.php');
$id=$_GET['id'];
$orderid=$_GET['orderid'];
$processing=$_GET['processing'];
$status=$_GET['status'];
$name=$_GET['name'];
$sql= "UPDATE order_food SET  status='$status' ,  orderid='$orderid' where id='$id' "; 
$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/customer.php')


?>