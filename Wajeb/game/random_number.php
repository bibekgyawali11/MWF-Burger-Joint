<html>
<head>
<?php
session_start();
if (!isset($_SESSION['randnum']))
    {
        $_SESSION['randnum'] = rand(1,100);
        $_SESSION['attempt'] = 0;
    }
?>

<title>
    Random Number Game
</title>
<style>
    body{
        background-color: lightblue;
    }
    .logo{
        font-size: 30px;
        font-family: serif;
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

<head>
<body>
<?php if (!isset($_SESSION['pay-game'])) { ?><button class="logout-button"><a href="../customer/kids_mode.php">Quit Game</a></button> <?php } ?>
    <center>
    <div class="logo">
        <img src="./try_your_luck.jpg" alt="try_your luck" width="300px" height="200px"><br>
        Welcome to Random Number Game <br><br>
    </div>
 
    <form action="" method="post">
    Select a Number Betwen 1 and 100:
    <input type="text" name="usernumber">
    <input type="submit" name="submit">
    <br>
    </form>
    <?php
    if (isset($_POST['submit']) and isset($_SESSION['randnum']))
    {
        $userInput = $_POST['usernumber'];
        $correct = $_SESSION['randnum'];
        $max_tries = 5;
       // echo "The correct number is ".$_SESSION['randnum']."<br>";
       $_SESSION['attempt'] = $_SESSION['attempt'] + 1;
       $attempt = $_SESSION['attempt'];
       echo "Attempt: ".$attempt." MAx tries: ".$max_tries."<br>";
        if ($userInput > $correct)
            {
                //no more attempts remaining
                if ($attempt >= $max_tries)
                    {
                        //if playing game after paying
                        if (isset($_SESSION['pay-game']))
                            {
                                unset($_SESSION['attempt']);
                                unset($_SESSION['randnum']);
                                echo "<script>
                                alert('Sorry You lost')
                                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/welcome.php');
                                </script>";

                            }
                        else 
                        {
                                echo "You lost! Try your luck next time!";
                                unset($_SESSION['attempt']);
                                unset($_SESSION['randnum']);
                                header("Refresh:5");
                        }

                    }

                //more attempts remaining
                else
                {
                    echo "The number you entered is ".$_POST['usernumber']."<br>";
                    echo "Entered Number is larger than the correct Number"."<br>";
                    $rem = 5 - $attempt ;
                    echo "Remaining tries: ".$rem."<br>";
                }
            }
        elseif ($userInput < $correct)
            {
                //if no more tries left
                    if ($attempt >= $max_tries)
                    {
                        //if playing game after paying
                        if (isset($_SESSION['pay-game']))
                            {
                                unset($_SESSION['attempt']);
                                unset($_SESSION['randnum']);
                                echo "<script>
                                alert('Sorry You lost')
                                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/welcome.php');
                                </script>";
                            }

                        else
                            {
                                unset($_SESSION['attempt']);
                                unset($_SESSION['randnum']);
                                echo "You lost! Try your luck next time!";
                                header("Refresh:5");
                            }
                    }

                //for more tries left
                else    
                    {
                        echo "The number you entered is ".$_POST['usernumber']."<br>";
                        echo "Entered Number is smaller than the correct Number"."<br>";
                        $rem = 5 - $attempt ;
                        echo "Remaining tries: ".$rem."<br>";
                    }
            }

        //correct answer    
        else if ($userInput == $correct)
            {
                echo"Congratulations! You did it"."<br>";
                echo"You did in ".$_SESSION['attempt']." tries."."<br>";
                $_SESSION['attempt'] = $_SESSION['attempt'] + 1;
                session_destroy();

                //if they played the game after paying and won
                if (isset($_SESSION['pay-game']) and $_SESSION['attempt']<=5)
                    {
                        unset($_SESSION['attempt']);
                        unset($_SESSION['randnum']);
                        header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/game_won.php');
                    }
                //else wise
                else
                    {
                        unset($_SESSION['attempt']);
                        unset($_SESSION['randnum']);
                        header("Refresh:5");
                    }
            }
      
    }
?>
    </center>
</body>
</html>