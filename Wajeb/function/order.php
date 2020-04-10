<?php
include ('../connect.php');
$id=$_GET['id'];
$name=$_GET['name'];
$price=$_GET['price'];
$details=$_GET['details'];
$Quantity=$_GET['Quantity'];
$togo=$_GET['togo'];
$status=$_GET['status'];
$sql="INSERT INTO order_food (id , name , price , details , Quantity , status , orderid , togo) 
VALUES('$id','$name','$price','$details', '$Quantity' , '$status' , '0' , '$togo')";
$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/waitstaff/menu.php')
?>