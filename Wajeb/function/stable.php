<?php
include ('../connect.php');
$idt=$_GET['idt'];
$open=$_GET['open'];



$sql= "UPDATE place SET statust='occupied' , open='$open' where idt='$idt' "; 
$result = $conn->query($sql);
 
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/welcome.php');

?>