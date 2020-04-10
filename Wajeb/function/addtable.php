<?php
include ('../connect.php');
$namet=$_GET['namet'];
$statust=$_GET['statust'];
$sql="INSERT INTO place (namet , statust ) 
VALUES('$namet','$statust' )";
$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/addtable.php')
?>