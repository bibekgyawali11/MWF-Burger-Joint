
<!DOCTYPE html>
<html>
<head>
<?php
//connect to the database
include ('../../connect.php');

//if the user usbmits quantity change request update the database
/*if (isset($_POST['submit']))
    {
        //get the inventory id and the quantity
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];

        //pass query to the database
        $sql = "UPDATE inventory SET Count = '$quantity' WHERE ID ='$id'";
        $conn->query($sql);
    }*/
?>
    
 <title>Menu</title>

 <!-- Custom css for the page -->
 <style type="text/css">
//custom css for the page
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
    body{
        background-color: lightblue;
    }
    table{
        border: 1px solid black;
    }
    th,td{
        border: 1px solid black;
        width: 200px;
        height: 120px;
        text-align: center;
    } 
    th{
        border: 1px solid black;
        width: 100px;
        height: 50px;
        text-align: center;
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
<button class="logout-button"> <a href="../index.php">Exit</a></button>
<center>
<h1 style="font-family:cursive;"> Menu </h1>
<button style="width:160px; height:25px"><a class="button1" href="./add_menu.php">Add New Menu Item</a></button><br><br>
<table>
<!-- Header for the table -->
   <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Calories</th>
    <th>Ingredients</th>
    <th>Allergy</th>
    <th>Vegan</th>
    <th>Category</th>
    <th>Picture</th>
    <th>Description</th>
    <th>price</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   <?php
   //connect to the database and pass the query to get all the ingredients
   include ('../connect.php');
   $n1=$_GET['n1'];                     //get the username
   $sql="SELECT * FROM menu";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {               //iterate thrigh each rote got
   ?>
   <tr>
   <!-- Filling all the columns of the row with the value got through query indexing with ID -->
    <td><?php echo $row['id'] ?></td>  
    <td><?php echo $row['S.N'] ?></td> 
    <td><?php echo $row['Calories'] ?></td>
    <td><?php echo $row['Ingredients'] ?></td>
    <td><?php echo $row['Allergy'] ?></td>
    <td><?php echo $row['Vegan'] ?></td>
    <td><?php echo $row['Category'] ?></td>
    <td><img src="<?php echo $row['Picture'] ?>" height="100px" width="100px"></td>
    <td><?php echo $row['Description'] ?></td>
    <td><?php echo $row['price'] ?></td>
    <td><a href="./edit_menu.php?n1=<?php echo $row['id'] ?>">Edit</a></td>
    <td><a href="./delete_menu.php?n1=<?php echo $row['id'] ?>">Delete</a></td>
   </tr>  
   <?php
   }?>
</table>
</form>

</center>
</body>
</html>