<?php
include ('../connect.php');
$firstname=$_GET['firstname'];
$lastname=$_GET['lastname'];
$usename=$_GET['usename'];
//$sql="SELECT * FROM usermwf WHERE usename='$n1' AND password1='$n2'";
//$result = $conn->query($sql);
//while($row = $result->fetch_assoc()) {
  //  $count = $result-> num_rows;
//}
//if ($count >0){
  //  session_start();
    //$_SESSION['username1'] = $n1 ;
    //header('Location:http://localhost/wajeb/index.php');
    //exit();
    
//}

$emailaddress=$_GET['emailaddress'];
$password1=$_GET['password1'];
$repassword=$_GET['repassword'];
//if ($password1 !== $repassword){
  //  header('Location:http://localhost/wajeb/index.php');
    //exit();
//}
$status1=$_GET['status1'];
$sql="INSERT INTO adduser (firstname , lastname , usename , emailaddress , password1 , repassword , status1 ) 
VALUES('$firstname','$lastname','$usename','$emailaddress','$password1','$repassword','$status1' )";
$result = $conn->query($sql);
header('Location:http://localhost/wajeb/login.php')
?>