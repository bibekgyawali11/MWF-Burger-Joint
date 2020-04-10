<?php
include ('../connect.php');
$name=$_GET['name'];
$img=$_GET['img'];
$price=$_GET['price'];

$sql="INSERT INTO menu (name , img , price ) 
VALUES('$name','$img','$price')";
$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/manager/addmenu.php')
?>