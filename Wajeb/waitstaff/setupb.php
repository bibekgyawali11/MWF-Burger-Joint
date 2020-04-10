<?php
include ('../connect.php');
$namet=$_GET['namet'];
$open=$_GET['open'];

$sql= "UPDATE place SET open='$open' WHERE namet='$namet' "; 

$result = $conn->query($sql);

header('Location:http://mwfburgerjoint.epizy.com/Wajeb/waitstaff/waitstaffb.php')
?>