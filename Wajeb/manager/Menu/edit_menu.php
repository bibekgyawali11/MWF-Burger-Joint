<?php
include ('../../connect.php');

session_start();

$id = $_GET['n1'];
//when the form to add menu is submitted from the user
if (isset($_POST['submiteditmenu']))
    {
        //get the value from the editform
        $name = $_POST['name'];
        $Calories = $_POST['Calories'];
        $Ingredients = $_POST['Ingredients'];
        $Allergy = $_POST['Allergy'];
        $Vegan = $_POST['Vegan'];
        $Category = $_POST['Category'];
        $Picture = $_POST['Picture'];
        $Description = $_POST['Description'];
        $price = $_POST['price'];
        

        //insert into the database
       // $sql = "UPDATE menu SET S.N='$name', Calories='$Calories', Ingredients='$Ingredients', Allergy='$Allergy', Vegan='$Vegan', Category='$Category', Picture='$Picture',               Description='$Description', price='$price' WHERE id='$id' " ;


        $sql = "UPDATE `menu` SET `S.N`='$name',`Calories`='$Calories',`Ingredients`='$Ingredients',`Allergy`='$Allergy',`Vegan`='$Vegan',`Category`='$Category',             `Picture`='$Picture',`Description`='$Description',`price`='$price' WHERE id='$id' ";
        
        $conn->query($sql);

        //javascript message to the user
        echo "<script>
            alert('Succesfully Inserted')
            window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/manager/Menu/view_menu.php');
            </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    
 <title>EDIT Menu</title>
 <link rel="stylesheet" type="text/css" href="style.css" > 
 <style>
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
 </style>
</head>

<body>
<button class="logout-button"><a href="../index.php">Exit</a></button>
<center>
<h1 style="font-family:cursive; "> EDIT  MENU </h1> <br><br>
<form  action="" method="post">

<!-- Form to get all the attributes of the menu -->
    <?php

    $sql = "SELECT * FROM menu WHERE id='$id' LIMIT 1";             //get the menu item
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    
    <label for ="name">Name:</label><br>
    <input style="width:100px; text-align:center;" type="text" name="name" value="<?php echo $row['S.N']?>"> <br><br>

    <label for ="Calories">Calories:</label><br>
    <input style="width:100px; text-align:center;" type="text" name="Calories" value="<?php echo $row['Calories']?>"><br><br>

    <label for ="Ingredients">Ingredients:</label><br>
    <input style="width:500px; text-align:center;" type="text" name="Ingredients" value="<?php echo $row['Ingredients']?>"><br><br>

    <label for ="Allergy">Allergy:</label><br>
    <input style="width:100px; text-align:center;" type="text" name="Allergy" value="<?php echo $row['Allergy']?>"><br><br>

    <label for ="Vegan">Vegan:</label><br>
    <input style="width:100px; text-align:center;" type="text" name="Vegan" value="<?php echo $row['Vegan']?>"><br><br>

    <label for ="Category">Category:</label><br>
    <input style="width:100px; text-align:center;" type="text" name="Category" value="<?php echo $row['Category']?>"><br><br>

    <label for ="Description">Description:</label><br>
    <input style="width:500px; text-align:center;" type="text" name="Description" value="<?php echo $row['Description']?>"><br><br>

    <label for ="Description">Picture Location:</label><br>
    <input style="width:500px; text-align:center;" type="text" name="Picture" value="<?php echo $row['Picture']?>"><br><br>

    <label for="price">Price</label><br>
    <input style="width:100px; text-align:center;" type="text" name="price" value="<?php echo $row['price']?>"><br><br>


    <!-- Submit the page from the whole database -->
    <input style="width:80px; height:40px;" type="submit" name="submiteditmenu">
</form>
</center>

</body>
</html>