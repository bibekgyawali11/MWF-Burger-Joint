
<?php
session_start();
include ('../../connect.php');

$e=$_GET['email'];
//echo $e."<br>";
$sql="SELECT * FROM customer WHERE email='$e'";

$result = $conn->query($sql);
$count = 0 ;
$times = 0;
while($row = $result->fetch_assoc()) {
    $count = $result-> num_rows;
    $times = $row['visit'];
}

if ($count > 0)
{
                if (!isset($_SESSION['discount'])) { $_SESSION['discount'] = 0;}                    //if discount not set yet
                //checking for their birthday
                $sql = "SELECT dob FROM customer WHERE email='$e'";
                $result = $conn->query($sql);
                $dobrow = $result->fetch_assoc();
                $customer_bd = $dobrow['dob'];

                //if it is the customer birthday today
                if(date('m-d') == substr($customer_bd,5,5)){
                        $_SESSION['discount'] = ($_SESSION['total']*15)/100;
                        echo "<script>
                        alert('Happy Birthday! We have applied 15% off on your total!')
                        window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/pay.php');
                        </script>";
                }

                $_SESSION['reward']=1;
                $times = $times + 1;
                $sql = "UPDATE customer SET visit='$times' WHERE email='$e'";
                $conn->query($sql);
                $rem = 5 - ($times%5);

                //for the fifth visit 
                if ($times%5 == 0)
                    {
                        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/profile/coupon_won.php');
                    }
                else
                    {
                        echo "<script>
                        alert('Visit Added! Wohoooo! $rem More visits for a free meal......')
                        window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/pay.php');
                        </script>";
                    }
}
else
{
                echo "<script>
                alert('Email Not Found! Rewards not applied! Try Joining in ! Oops......')
                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/profile/enroll.php');
                </script>";
                //header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/pay.php');
}
?>


