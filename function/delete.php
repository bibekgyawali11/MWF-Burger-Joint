<?php
include ('../connect.php');
$n1=$_GET['n1'];

$sql= "DELETE from adduser where id='$n1' "; 

$result = $conn->query($sql);
header('Location:http://localhost/WAJEB/admin/admin.php?n1=')
?>