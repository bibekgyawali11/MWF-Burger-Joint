<?php
include ('../connect.php');
$idt=$_GET['idt'];
$help=$_GET['kitchenhelp'];

$sql= "UPDATE place SET kitchenhelp='$help' WHERE idt='$idt' "; 

$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/kitchen/help.php')
?>