<?php
include ('../connect.php');
$idt=$_GET['idt'];



$sql= "UPDATE place SET statust='busy' where idt='$idt' "; 

$result = $conn->query($sql);
header('Location:http://localhost/wajeb/menu.php')
?>