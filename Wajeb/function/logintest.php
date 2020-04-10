<?php

//conenct the database
include ('../connect.php');

//get the username and passwords
$n1=$_GET['n1'];
$n2=$_GET['n2'];
$n3='manager';
$n4='waitstaff A';
$n7='waitstaff B';
$n5='kitchenstaff';
$n6='customer';

//make a query for manager
$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n3' ";

//run the query
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count = $result-> num_rows;
}

//for waitstaff
$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n4' ";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count1 = $result-> num_rows;
}

//for kitchenstaff
$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n5' ";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count2 = $result-> num_rows;
}

//for the waitstaff
$sql="SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n7' ";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count4 = $result-> num_rows;
}


//for the customer tablet
$sql= "SELECT * FROM adduser WHERE usename='$n1' AND password1='$n2' AND status1='$n6' ";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $count3 = $result-> num_rows;
}

    //if it is a manager
    if ($count >0){
        session_start();
        $_SESSION['username'] = $n1;
            header('Location:http://mwfburgerjoint.epizy.com/Wajeb/manager/index.php');
    }

    //if it is a waitstaff
   elseif ($count1 >0){
        session_start();
        $_SESSION['username'] = $n1;
        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/waitstaff/index.php');

    }

    //if a kitchen staff
    elseif ($count2 >0){
        session_start();
        $_SESSION['username'] = $n1;
        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/kitchen/test.php');

    }

    //for the customer tablet
    elseif($count3 >0){
        session_start();
        $_SESSION['username'] = $n1;
        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/customer.php');
    }


    //for the waitstaff B
     elseif($count4 >0){
        session_start();
        $_SESSION['username'] = $n1;
        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/waitstaff/waitstaffb.php');
    }
    
    //for error login
    else{
                    echo "<script>
                alert('Invalid Username/Password!')
                window.location.replace('http://mwfburgerjoint.epizy.com/index.php');
                </script>";
    }
?>
