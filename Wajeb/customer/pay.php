<?php
//starting the session and connecting the database
session_start();
include ('../connect.php');
include ('./kids_meal.php');
?>

<!DOCTYPE html>
<html>
<head>
<?php

//if skip reward is pressed
if (isset($_POST['skipreward']))
    {
        $_SESSION['reward'] = 1;
    }

//for skip tip
if (isset($_POST['skiptip']))
    {
        $_SESSION['tip'] = 1;
    }

//for skip coupon
if (isset($_POST['skipcoupon']))
    {
        $_SESSION['coupon'] = 1;
    }

if (isset($_POST['split_skip']))
    {
        $_SESSION['split_pay_skip']= 1;
       // $_SESSION['split_pay']=1;
    }
elseif (!isset($_SESSION['split_pay']) and (isset($_POST['split_order']) or isset($_POST['split_amount']))) {
        if (isset($_POST['split_order'])) { $_SESSION['split_order']=1; }
        else { $_SESSION['split_amount']=1;}
        header("location:split_function.php");
}


//for payment cash or card
if (isset($_POST['cash']) or isset($_POST['credit']))
    {
        $_SESSION['split_pay'] = 1;
    }

//for receipt type
if (isset($_POST['noreceipt']) or isset($_POST['print']) or isset($_POST['t-email']) or isset($_POST['s-email']) or isset($_POST['both']))
    {
        $_SESSION['receipt'] = 1;

        //customer have one in 5 chance to win coupon for free desert after paying
        $rand_num = rand(0,5);
        if ($rand_num == 0)  {
                header('location:coupon_random.php');
        }
        else
        {
            echo "<script>
            alert('Your receipt has been delievered')
            window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/survey_decision.php');
            </script>";
        }
    }

//when the user submits coupon
if (isset($_POST['submit_coupon']))
    {
        $code = $_POST['coupon_code'];
        $sql = "SELECT * FROM coupon WHERE code='$code'";
        $result =  $conn->query($sql);
        $r_count= 0;
        while($row=$result->fetch_assoc()) 
            {
                $r_count = $r_count + 1;
                $type = $row['type'];
            }
        //if coupon not found
        if ($r_count<1) {
            echo "<script>
                alert('Coupon code not found');
                </script>";
        }
        else
            {
                //giving discount according to the type of the coupon code
                if (!isset($_SESSION['discount'])) { $_SESSION['discount'] = 0;}
                $amount = 0;
                //free desert
                if ($type==1) {
                
                    //$sql = "SELECT price FROM order_food WHERE id='$_SESSION['tablesession'] AND Category='Deserrt' LIMIT 1";
                    //$result = $conn->query(sql);
                    //$row = $result->fetch_assoc() { $amount = $amount + $row['price']; }
                    // $_SESSION['discount']= $_SESSION['discount'] + $amount ;
                    $_SESSION['discount']= $_SESSION['discount'] + 4.99; 
                    }

                //free meal
                elseif ($type==2) {
                    //$sql = "SELECT price FROM order_food WHERE id='$_SESSION['tablesession'] AND Category='Burger' LIMIT 1";
                    //$result = $conn->query(sql);
                    //$row = $result->fetch_assoc() { $amount = $amount + $row['price']; }
                    //$_SESSION['discount']= $_SESSION['discount'] + $amount ;
                     $_SESSION['discount'] = $_SESSION['discount'] + 4.99; 
                     }

                //15% off on the birthday
                //else { $_SESSION['discount']= $_SESSION['discount'] + (15 * $_SESSION['total'])/100 ;}

                //deleting that coupon code from the database
                $sql = "DELETE FROM coupon WHERE code='$code'";
                $conn->query($sql);
                $_SESSION['coupon'] = 1;
                echo "<script>
                alert('Thank You! Discount Applied!');
                </script>";

            }
    }
?>
<title>
		Payment Menu
</title>
<link rel = "stylesheet" href="./styles.css">
<!-- Scripts Used -->
<script type="text/javascript">
    
function tipamount(num)
        {
                var sum = 2000;
                sum = sum*num;
                sum = sum/100 ; 
                document.getElementById('tipvalue').value= sum;
        }
</script>

<!-- Custom CSS For the Page -->
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    th,td{
        width: 200px;
        height: 20px;
        text-align: center;
    }
    .right-class{
        width: 200px;
        height: 20px;
        text-align: right;
    }
</style>
</head>
<body style="background-color: lightcyan;">

<!-- Printing the Title -->
	<div class="logo">
	MWF Burger Joint
	</div>


    <!--Start Displaying in Center -->
    <center>
	<div style="font-size:30px; font-family:cursive;"> Your Order </div> <br>
    <table>
        <tr>
        <th>S.N </th>
        <th>Menu Item </th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        </tr>
        <?php
        //Variables to calculate the Total
        $count = 0;
        $total = 0;
        $total_after_tax = 0;
        $row_total = 0;
        $tax= 0.00;
        if (!isset($_SESSION['discount'])) 
                    { 
                        $discount = 0.00;
                    }
        else 
            { 
                $discount = $_SESSION['discount']; 
            }
        $tip = 0.00;

        //connect to retrieve the order
        $sql = "SELECT * FROM order_food WHERE id=0 LIMIT 2";          //just a test
        $result = $conn->query($sql);
        while($row= $result->fetch_assoc()){
        ?>
        <tr>

        <!-- Calculate the row total for the Order -->

        <?php
        $count = $count +1;
        $rowtotal = $row['price'] * $row['Quantity'];
        $total = $total + $rowtotal;
        ?>

        <!-- Display the details about food and then quantity and price -->
        <td><?php echo $count ?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo "$".$row['price'] ?></td>
        <td><?php echo $row['Quantity'] ?></td>
        <td><?php echo "$".$rowtotal ?></td>
        </tr>
        <?php
        }
        ?>
        <!-- Printing the Total -->
        <tr>
            <td class="right-class" colspan="4"><?php echo "Total:" ?></td>
            <td><?php echo "$".$total ?> </td>
        </tr>

        <!-- Calculating Tax and Display total after Tax -->
        <tr>
            <td class="right-class" colspan="4"><?php echo "Tax:" ?></td>
            <?php $tax = round((8.25 * $total)/100, 2, PHP_ROUND_HALF_UP); ?>
            <td><?php echo "$".$tax ?> </td>
        </tr>

        <!-- Discount tab -->
        <tr>
            <td class="right-class" colspan="4"><?php echo "Discount:" ?></td>
            <td><?php echo "$".number_format($discount,2) ?> </td>
        </tr>

        <!-- Total after Discount applied -->
        <?php $total_after_tax = round($total + $tax - $discount, 2, PHP_ROUND_HALF_UP); ?>
        <tr>

        <!-- The Tip Section -->
        <td class="right-class" colspan="4"><?php echo "Tip: "?> </td>
            <?php
                    if (isset($_POST['submitc']) or isset($_POST['submit20']) or isset($_POST['submit30']) or isset($_POST['submit10']))
                        {
                            $_SESSION['tip'] = 1;
                        }
                    if (isset($_POST['submit10'])) { $tip = (10*$total_after_tax)/100; }
                    elseif (isset($_POST['submit20'])) { $tip = (20*$total_after_tax)/100; }
                    elseif (isset($_POST['submit30'])) { $tip = (30*$total_after_tax)/100; }
                    elseif (isset($_POST['submitc'])) { $tip = $_POST['custom_tip']; }
                
            ?>
        <!-- Display the Tip -->
        <td> <?php echo "$".number_format($tip,2) ?> </td>
        </tr>

        <!-- Total after tip -->
        <tr>
            <td class="right-class" colspan="4"><?php echo "GrandTotal:" ?></td>
            <?php $total = round($total_after_tax + $tip, PHP_ROUND_HALF_UP); ?>
            <td><?php echo "$".number_format($total,2) ?> </td>
            <?php $_SESSION['total']=$total; ?>
        </tr>
    </table>
    <hr>
    <?php kids_meal_and_free_drink_check(); ?>
    

    <!-- Tip Section -->
    <?php if (!isset($_SESSION['tip'])) { ?>
        <div style="font-size: 20px; font-family:sans-serif;">Gratutity</div><br>
            <form action="" method="post">
            <input type= "text" name="custom_tip" placeholder= "Enter a custom tip">
            <input type="submit" name="submit10" value="10%">
            <input type="submit" name="submit20" value="20%">
            <input type="submit" name="submit20" value="30%">
            <input type="submit" name="submitc" value-"Submit">
        </form>
        <form action="" method="post"> <input type="submit" name="skiptip" value="Skip"></form>
        <hr>
    <?php } ?>


    <!-- Rewards Member Section -->
    <?php if (isset($_SESSION[tip]) and !isset($_SESSION['reward'])) { ?>
            <div style="font-size: 20px; font-family:sans-serif;"> Are you a rewards member? </div> <br>

            <!-- Form to profile Check -->
            <form action="./profile/check_email.php" method="get">
                <input type="email" id="email" name="email" placeholder="Enter your Email">
                <input type="submit" value="Sign in">
            </form>

            <!-- Else to Enroll -->
            <br>
            Click here to enroll: <button> <a href="./profile/enroll.php">Join now</a></button> <br>
            <br>
            <form action="" method="post"> <input type="submit" name="skipreward" value="Skip"></form>
            <br>
            <hr>
    <?php } ?>

    <!-- Coupon Section -->
    <?php if (isset($_SESSION['reward']) and !isset($_SESSION['coupon'])) { ?>
        <div style="font-size: 20px; font-family:sans-serif;"> Coupons </div> <br>
        <form action="" method="post">
            <input type="text" id="code" name="coupon_code" placeholder="Enter your coupon code">
            <input type="submit" name="submit_coupon" value="Redeem">
        </form>
        <br>
        <form action="" method="post"> <input type="submit" name="skipcoupon" value="Skip"></form>
        <hr>
    <?php } ?>

<!-- Split Payment -->
<?php if (isset($_SESSION['coupon']) and !isset($_SESSION['split_pay']) and !isset($_SESSION['split_pay_skip'])) { ?>
        <div style="font-size: 20px; font-family:sans-serif;">SPLIT PAYMENT METHOD </div> <br>
        <form action="" method="post">
        <input type="submit" name="split_order" value="SPLIT BY ORDER">
        <input type="submit" name="split_amount" value="SPLIT BY AMOUNT"><br><br>
        <input type="submit" name="split_skip" value="Skip">
        </form>    
    <hr>
    <?php } ?>


<!-- Payment Section -->
   <?php if (isset($_SESSION['split_pay_skip']) and !isset($_SESSION['split_pay'])) { ?>
        <div style="font-size: 20px; font-family:sans-serif;">PAYMENT METHOD </div> <br>
        <form action="" method="post">
        <input type="submit" name="cash" value="CASH">
        <input type="submit" name="credit" value="CREDIT">
        </form>
    <hr>
     <?php } ?>

<!-- Receipt Type -->
    <?php if (isset($_SESSION['split_pay']) and !isset($_SESSION['receipt'])) { ?>
       <div class="font-size: 20px; font=family:sans-serif;"> RECEIPT DELIEVERY TYPE </div> <br><br>
        <form action="" method="post">
        <input type="submit" name="noreceipt" value="Noreceipt"><br><br>
        <input type="submit" name="print" value="Print"><br><br>
        <label for="r-email">Email: </label>
        <input type="text" name="t-email" placeholder="Enter your email">
        <input type="submit" name="s-email" value="Send by Email"><br><br>
        <input type="submit" name="both" value="Both Email and Print"><br><br>
        </form>
        <hr>
    <?php } ?>

</body>
	
</html>