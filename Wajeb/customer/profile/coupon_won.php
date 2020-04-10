<?php
session_start();
include ('../../connect.php');
if (isset($_POST['submit']) or isset($_POST['submitok']))
    {
            echo "<script>
                alert('Thank you for Being a Loyal Customer')
                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/welcome.php');
                </script>";
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../styles.css">
    <title>
        Customer Visit Reward
    </title>
</head>
<body style="background-color:lightblue;">
    <div class="logo"> MWF Burger Joint </div>
    <div style="border:1px solid red; align-content:centre; font-size: xx-large; margin: 30px; padding:50px; text-align:center;">
        Congratulations ! You have won a free Desert on your Next Purchase ! <br>
        Here is a Coupon Code for that : <br>
        <?php
        //Generate a random coupon code and push it into the database and show it to the customer
        //all the available characters
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 10;           //10 digit code
        $randomString = ''; 
        for ($i = 0; $i < $length; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        }
        echo $randomString."<br>";
        //code to add the random number to the database
        $type = 1;          //for the free desert coupon
        $sql = "INSERT INTO coupon (code, type) VALUES ('$randomString','$type')";
        $conn->query($sql);
        ?>
        <form action="#" method="post">
        <input style="width:200px; height:30px;" type="email" name="email" placeholder="Enter your email">
        <input style="width:200px; height:50px;" type="submit" name="submit" value="Send The Code By Email">
        <input style="width:50px; height:25px" type="submit" name="submitok" value="OK">
        </form>
    </div>
</body>
</html>