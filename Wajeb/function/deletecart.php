<?php
include ('../connect.php');
$id=$_GET['id'];
$name=$_GET['name'];
$sql= "DELETE from order_food where id='$id' "; 

$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/waitstaff/menuCopy.php?n1=')
?>