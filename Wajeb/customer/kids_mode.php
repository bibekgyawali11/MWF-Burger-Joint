<html>
<head>
	<link rel="stylesheet" href="./styles.css">
	
	<title>
		Kids Mode
	</title>
    <style>

//custom css for the page
table {
  border: 2px solid black;
}

td {
    border: 1px solid black;
    height: 300px;
    width: 300px;
    align-text: center;
}
.exit-button
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

<body style="background-color: lightblue;">
<div class="exit-button"><a href="./customer.php"> Exit </a></div>
        <div class="logo">
	MWF Burger Joint    
        </div>
	
	<div class = "logo">
	KIDS MODE
	</div>
<center>
<!-- Table to display all the available games -->
<table>
<tr>
<td><button><a href="../game/tictactoe.php"> <img src="../game/tictactoe.jpg"  width="285" height="285"></a></button></td>
<td><button><a href="../game/random_number.php"><img src="../game/try_your_luck.jpg" width="285" height="285"></a></button></td>
</tr>
<tr>
<td><button><a href="../game/hangman.php"><img src="../game/hangman.jpg" width="285" height="285"></a></button></td>
<td><button><a href="../game/snake.php"><img src="../game/snake.jpeg" width="285" height="285"></a></td>
</tr>
<td colspan="2"><button><a href="../game/tetris.php"><img src="../game/tetris.jpg" width="285" height="285"></a></button></td>
<table>
</center>
</body>
	
</html>