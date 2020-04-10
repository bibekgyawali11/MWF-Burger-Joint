<?php
include ('../connect.php');
$idt=$_GET['idt'];
$drink=$_GET['drink'];

$sql= "UPDATE place SET refill='$drink', refillstatus='enabled' WHERE idt='$idt' "; 

$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/refill_requested.php')
?>