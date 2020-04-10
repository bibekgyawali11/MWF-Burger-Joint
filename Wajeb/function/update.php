<?php
include ('../connect.php');
$status1=$_GET['status1'];
$id=$_GET['id'];

$sql= "UPDATE adduser SET status1='$status1' where id='$id' "; 

$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/admin/admin.php')
?>