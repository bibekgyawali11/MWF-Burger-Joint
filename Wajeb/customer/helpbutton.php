<?php
include ('../connect.php');
$idt=$_GET['idt'];
$help=$_GET['help'];

$sql= "UPDATE place SET help='$help' WHERE idt='$idt' "; 

$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/help.php')
?>