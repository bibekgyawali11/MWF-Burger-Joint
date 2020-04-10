<?php
include ('../../connect.php');


//if the form has been submitted
if (isset($_POST['submit']))
    {
        //get all the attributes
        $id = $_POST['id'];
        $name = $_POST['name'];
        $count = $_POST['count'];
        $xprice = $_POST['xprice'];
        $type = $_POST['type'];

        //sql query to insert
        $sql = "INSERT INTO inventory (ID, Name, ExtraPrice, Type, Count) VALUES('$id', '$name', '$xprice', '$type', '$count')";
        $conn->query($sql);

        //java script message to display
        echo "<script>
            alert('Succesfully Inserted')
            window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/manager/Inventory/view_inventory.php');
            </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    
 <title>Add Inventory</title>
 <link rel="stylesheet" type="text/css" href="style.css" > 
 <style>
    body{
        background-color: lightblue;
    }
    .logout-button           
        {
            
            height: 25px;
            width: 100px;
            font-size: 20px;
            align-text: center;
            //border: 1px solid black;
            display:block;
            color: red;
            text-align:center;
            position: absolute;
            top: 10px;
            right: 10px;
        }
 </style>
</head>

<body>
<center>
<h1 style="font-family:cursive; "> ADD INGREDIENT </h1> <br><br>
<button class="logout-button"><a href="../index.php">Exit</a></button>

<!-- Form to get all the atributes -->
<form  action="" method="post">
    <label for="id">ID: </label>
    <input type="text" name="id"><br><br>
    <label for ="name">Name:</label>
    <input type="text" name="name"><br><br>
    <label for ="xprice">Extra Price:</label>
    <input type="text" name="xprice"><br><br>
    <label for ="type">Type:</label>
    <input type="text" name="type"><br><br>
    <label for="count">Count</label>
    <input type="text" name="count"><br><br>
    <input style="width:80px; height:40px;" type="submit" name="submit">
</form>
</center>

</body>
</html>