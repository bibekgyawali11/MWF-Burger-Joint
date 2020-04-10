<?php
include ('../../connect.php');
session_start();
//get the id from the url
$n1=$_GET['n1'];
$sql= "DELETE from menu where id='$n1' ";           //query to the table to find an item with that item
$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/manager/Menu/view_menu.php');      //direct after deleting
?>