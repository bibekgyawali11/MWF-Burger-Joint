<?php
session_start();
include ('../connect.php');

//for split by ORDER
if (isset($_POST['submit_checkbox']))
{
    $count= 0;
    $_SESSION['temp_total'] = 0;

    //to get all the items in the checkbox
    foreach($_POST['check_list'] as $selected)
        {
            $p_am = $selected;
            $sql = "DELETE FROM split_pay WHERE price='$p_am' LIMIT 1";
            $_SESSION['temp_total']= $_SESSION['temp_total'] + $p_am;
            $result = $conn->query($sql);
            $count = $count + 1;
        }

    if ($count>0){ $_SESSION['split_counter']= $_SESSION['split_counter']+1;}
}

//if the user hits cash or credit while on split by order
if (isset($_POST['payoption_submit']))
    {
        $_SESSION['split_counter']= $_SESSION['split_counter']+1;

        //check to see if no more split necessary
        $sql = "SELECT * FROM split_pay WHERE id=0";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if(!$row){
                    $_SESSION['split_pay']=1;
                    echo"<script>
                    alert('Thank you')
                    window.location.replace('pay.php');
                    </script>";
                }
    }


//initially
if (!isset($_SESSION['ppay_total']))
        {
            $_SESSION['ppay_total']= 1;
            $_SESSION['times'] = 1;
            $_SESSION['remaining_balance'] = $_SESSION['total'];
        }

//get the payment amount for split by amount
if (isset($_POST['submit_1']) or isset($_POST['submit_2']) )
    {
         $_SESSION['ppay_total'] = $_SESSION['ppay_total'] + $_POST['data_amount'];
         $_SESSION['remaining_balance'] = $_SESSION['remaining_balance'] - $_POST['data_amount'] ;
    }

//keep asking until the remaining amount is paid
if ($_SESSION['ppay_total'] >= $_SESSION['total'] )
    {
        $_SESSION['split_pay']=1;
        echo"<script>
        alert('Thank you')
        window.location.replace('pay.php');
        </script>";
    }
?>
<html>
<head>
<title> Split Pay Screen </title>
</head>

<script>

</script>
<body style="background-color:lightblue;">
<center>
<h1> Split Pay </h1><br><br>


<!-- Split through order -->
<?php if (isset($_SESSION['split_order'])) { ?>

<h3 style="font-size:25px">Split By Order </h3><br><br>


<!-- Push to the split table intitally -->
    <?php if(!isset($_SESSION['split_counter']))
    {
        //copy the values from the table
        $sql = "SELECT * FROM order_food WHERE id=0";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
            {
                //getting the total price and name and storing to display to user
                $price = $row['Quantity'] * $row['price'];
                $name = $row['name'];
                $id = 0;
                $sql = "INSERT INTO split_pay (id, name, price) VALUES('$id', '$name', '$price')";
                $conn->query($sql);
            }

        $_SESSION['split_counter']=1;
    }
    ?>

<!-- Display to the user -->
<?php if($_SESSION['split_counter']%2==1) { ?>
    <?php
        $sql = "SELECT * FROM split_pay WHERE id=0";
        $result = $conn->query($sql);
    ?>
        <form action="" method="post">
        <label style="font-size:25px; font-family:cursive;">Choose which one you want to pay together: </label><br><br>
       <?php while ($row = $result->fetch_assoc()){ ?>
            <input type="checkbox" name="check_list[]" value="<?php echo $row['price'] ?>"> <?php echo $row['name']."--------------->Total Price: ".$row['price'] ?><br><br>
       <?php }?>
       <br><br><br>
       <input style="width:100px; height:75px;" type="submit" name="submit_checkbox" value="Choose">
       </form>
<?php } ?> 


<!-- Ask for the payment method -->
<?php if($_SESSION['split_counter']%2==0  and $_SESSION['split_counter']>=2) { ?>
        <h3 style="font-size:25px; font-family:cursive;">Choose your Method of Payment: <br>Total : <?php echo $_SESSION['temp_total'] ?><br><br>
        <form action="" method="post">
        <input type="submit" value="CASH" name="payoption_submit">
        <input type="submit" value="CREDIT" name="payoption_submit">
        </form>
<?php } ?> 

<?php } ?>


<?php if (isset($_SESSION['split_amount'])) 
    { ?>
        <h3>Split By Amount</h3>
        <!-- Display the Remaining Amount to User -->

        <h4> Total Remaining Balance Due: <?php echo "$".$_SESSION['remaining_balance']; ?> </h4>
        <form action="" method="post">

        <!-- Form to Collect the payment information and amount -->
        Enter your  Payment Number <?php echo $_SESSION['times'] ?>:
        <?php $_SESSION['times'] = $_SESSION['times'] +1; ?> 
              <input type="text" name="data_amount" placeholder="Amount"> 
              <input type="submit" name="submit_1" value="CASH">
              <input type="submit" name="submit_2" value="CREDIT"><br><br>
        </form>
<?php } ?>

</center>
<body>
</html>
