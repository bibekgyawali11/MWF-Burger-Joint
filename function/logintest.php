<?php
include ('../connect.php');
$n1=$_GET['n1'];
$n2=$_GET['n2'];
$n3='manager';
$n4='waitress';
$n5='cooker';
$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n3' ";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count = $result-> num_rows;
}
$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n4' ";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count1 = $result-> num_rows;
}

$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n5' ";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count2 = $result-> num_rows;
}

    if ($count >0){
        session_start();
        $_SESSION['username'] = $n1;
    
            header('Location:http://localhost/wajeb/admin/admin.php');
    }
    if ($count1 >0){
        session_start();
        $_SESSION['username'] = $n1;
        header('Location:http://localhost/wajeb/w/wait.php');

    }
    if ($count2 >0){
        session_start();
        $_SESSION['username'] = $n1;
        header('Location:http://localhost/wajeb/kit/km.php');

    }



?>
