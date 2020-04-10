<?php
session_start();
if (isset($_POST['game_yes']))
    {
        $_SESSION['pay-game']=1;
        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/game/random_number.php');
    }
if (isset($_POST['game_no']))
    {
        session_destroy();
        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/welcome.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	
	<title>
		Game Decision
	</title>
</head>

<body style="background-color: lightblue;">

        <div class="logo">
	MWF Burger Joint    
        </div>
	
	<div class = "logo">
    Would you like to play a quick game to get a chance to get a chance to win a free desert?
    </div> <br>
    <center>
    <form action="" method="post">
    <input style="width:400px height:100px" type="submit" name="game_yes" value="Yes"><br><br>
    <input style="width:400px height:100px" type="submit" name="game_no" value="No. Thank you !">
    </form>
    </center>
</body>
	
</html>