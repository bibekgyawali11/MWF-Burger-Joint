
<!DOCTYPE html>
<html>
<head>
<?php

//connect to the database
include ('../../connect.php');

//if the user usbmits quantity change request update the database
if (isset($_POST['submit']))
    {
        //get the inventory id and the quantity
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        //pass query to the database
        $sql = "UPDATE inventory SET Count = '$quantity' WHERE ID ='$id'";
        $conn->query($sql);
    }
?>
    
 <title>Ingredients</title>

 <!-- Custom css for the page -->
 <style type="text/css">
    body{
        background-color: lightblue;
    }
    table{
        border: 1px solid black;
    }
    th,td{
        border: 1px solid black;
        width: 200px;
        height: 20px;
        text-align: center;
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
<!-- Start the session -->
 <?php
        session_start();
        $n1=$_SESSION['username'];
        echo $n1;
?>
</head>

<body>

<!-- Exit Button for the manager -->
<button class="logout-button"> <a href="../index.php"> Exit </a></button>
<center>
<h1 style="font-family:cursive;"> Inventory </h1>
<button style="width:160px; height:25px"><a class="button1" href="./add_inventory.php">Add New Item</a></button><br><br>
<table>
<!-- Header for the table -->
   <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Count</th>
    <th>Edit Quantity</th>
    <th>Delete </th>
   </tr>
   <?php
   //connect to the database and pass the query to get all the ingredients
   include ('../../connect.php');
   $n1=$_GET['n1'];
   $sql="SELECT * FROM inventory ORDER BY ID";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {               //iterate thrigh each rote got
   ?>
   <tr>
   <!-- Filling all the columns of the row with the value got through query indexing with ID -->
    <td><?php echo $row['ID'] ?></td>  
    <td><?php echo $row['Name'] ?></td> 
    <td><?php echo $row['Count'] ?></td>
    <td>

    <!--  A form within a table To change the quantity of a ingredient -->
    <form action="" method="post">
    <input type="text" name="quantity">
    <input type="hidden" name="id" value="<?php echo $row['ID']?>">
    <input type="submit" name="submit" value="OK">
    </form>
    </td>

    <!-- A button which will delete the ingredient in that column in the table -->
    <td><a href="./delete.php?n1=<?php echo $row['ID'] ?>">Delete</a></td>
   </tr>  
   <?php
   }?>
</table>
</form>

</center>
</body>
</html>