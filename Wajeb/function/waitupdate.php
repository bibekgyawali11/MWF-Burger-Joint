
   <?php
include ('../connect.php');
$id=$_GET['id'];
$orderid=$_GET['orderid'];
$processing=$_GET['processing'];
$orderdone=$_GET['orderdone'];
$statust=$_GET['statust'];
$sql= "UPDATE place SET   statust='$statust' , orderdone='$orderdone'  where idt='$id' "; 
$result = $conn->query($sql);


$result = $conn->query($sql);
header('Location:http://mwfburgerjoint.epizy.com/Wajeb/waitstaff/')
?>