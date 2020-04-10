<?php
include ('../../connect.php');

session_start();


//when the form to add menu is submitted from the user
if (isset($_POST['submitnewmenu']))
    {
        //get the value from the form
        $id = $_POST['id'];
        $name = $_POST['name'];
        $Calories = $_POST['Calories'];
        $Ingredients = $_POST['Ingredients'];
        $Allergy = $_POST['Allergy'];
        $Vegan = $_POST['Vegan'];
        $Category = $_POST['Category'];
        $Picture = $_POST['Picture'];
        $Description = $_POST['Description'];
        $price = $_POST['price'];
        
        $sql = "INSERT INTO `menu`(`id`, `S.N`, `Calories`, `Ingredients`, `Allergy`, `Vegan`, `Category`, `Picture`, `Description`, `price`) VALUES ('$id','$name', $Calories,             '$Ingredients','$Allergy', '$Vegan', '$Category', '$Picture', '$Description', '$price')";

        $result = $conn->query($sql);

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
    
 <title>Add Menu</title>
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
<button class="logout-button"><a href="../index.php">EXIT</a></button>
<center>
<h1 style="font-family:cursive; "> ADD MENU </h1> <br><br>


<form  action="" method="post">

<!-- Form to get all the attributes of the menu -->
    <label for ="id">Id:</label><br>
    <input type="text" name="id"><br><br>
  
    <label for ="name">Name:</label><br>
    <input type="text" name="name"><br><br>

    <label for ="Calories">Calories:</label><br>
    <input type="text" name="Calories"><br><br>

    <label for ="Ingredients">Ingredients:</label><br>
    <input type="text" name="Ingredients"><br><br>

    <label for ="Allergy">Allergy:</label><br>
    <input type="text" name="Allergy"><br><br>

    <label for ="Vegan">Vegan:</label><br>
    <input type="text" name="Vegan"><br><br>

    <label for ="Category">Category:</label><br>
    <input type="text" name="Category"><br><br>

    <label for ="Description">Description:</label><br>
    <input type="text" name="Description"><br><br>

    <label for ="Picture">Picture:</label><br>
    <input type="text" name="Picture"><br><br>

    <label for="price">Price</label><br>
    <input type="text" name="price"><br><br>

    <!-- Submit the page from the whole database -->
    <input style="width:80px; height:40px;" type="submit" name="submitnewmenu">
</form>
</center>

</body>
</html>