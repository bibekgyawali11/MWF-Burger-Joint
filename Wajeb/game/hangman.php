<?php

require_once 'hanged_man.php';
session_start();
$words = array();
$numwords = 0;

//copied from open source github

function printPage($image, $guesstemplate, $which, $guessed, $wrong) {
  echo <<<ENDPAGE
<!DOCTYPE html>
<html>
  <head>
	<title>Hangman</title>
  </head>
</html>


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
<body>
 <center>
 <div class="logout-button"><a href="../customer/kids_mode.php">Exit Game </a> </div>
  <h1>Hangman Game</h1>
  <br />
  <pre>$image</pre>
  <br />
  <p><strong>Word to guess: $guesstemplate</strong></p>

  <p>Letters used in guesses so far: $guessed</p>

  <form method="post" action="$script">
	<input type="hidden" name="wrong" value="$wrong" />
	<input type="hidden" name="lettersguessed" value="$guessed" />
	<input type="hidden" name="word" value="$which" />
	<fieldset>
	  <legend>Your next guess</legend>
	  <input type="text" name="letter" autofocus />
	  <input type="submit" value="Guess" />
	</fieldset>
  </form>
</center>
</body>
ENDPAGE;
}


//open the file to get the words
function loadWords() {
  global $words;
  global $numwords;
  $input = fopen("./words.txt", "r");

    //get until the last line
  while (true) {
	  $str = fgets($input);
	  if (!$str) break;
	  $words[] = rtrim($str);
	  $numwords++;
  }

  fclose($input);
}


//starting the game
function startGame() {
  global $words;
  global $numwords;
  global $hang;

  $which = rand(0, $numwords - 1);              //randomly choosing the word
  $word =  $words[$which];
  $len = strlen($word);
  $guesstemplate = str_repeat('_ ', $len);        //filing the template
  $script = $_SERVER["PHP_SELF"];

  printPage($hang[0], $guesstemplate, $which, "", 0);           //printing the page
}

//if the player looses
function killPlayer($word) {
                if (isset($_SESSION['pay-game']))
                {
                    session_destroy();
                    echo "<script>
                        alert('Sorry! You Lost');
                        window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/welcome.php');
                        </script>";
                }
            else
            {
              echo "<script>
                alert('OOPS! You died! The word you were trying to match was $word')
                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/game/hangman.php');
                </script>";
            }
}


//if the player looses
function congratulateWinner($word) {
            if (isset($_SESSION['pay-game']))
                {
                    echo "<script>
                        alert('Congratulation ! You won');
                        window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/game_won.php');
                        </script>";
                }
            else
                {
                 echo "<script>
                alert('Congratulations! You won')
                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/game/hangman.php');
                </script>";
            }
}


//check the letters
function matchLetters($word, $guessedLetters) {
  $len = strlen($word);
  $guesstemplate = str_repeat("_ ", $len);


    //check every characters
  for ($i = 0; $i < $len; $i++) {
	$ch = $word[$i];
	if (strstr($guessedLetters, $ch)) {
	  $pos = 2 * $i;
	  $guesstemplate[$pos] = $ch;
	}
  }

  return $guesstemplate;
}


//checks how many letters are still unmatched
function handleGuess() {
  global $words;
  global $hang;

  $which = $_POST["word"];
  $word  = $words[$which];
  $wrong = $_POST["wrong"];
  $lettersguessed = $_POST["lettersguessed"];
  $guess = $_POST["letter"];
  $letter = strtoupper($guess[0]);

  if(!strstr($word, $letter)) {
	$wrong++;
  }

  $lettersguessed = $lettersguessed . $letter;
  $guesstemplate = matchLetters($word, $lettersguessed);

//if all word matched
  if (!strstr($guesstemplate, "_")) {
   	congratulateWinner($word);
  }
  //if all tries finished 
  else if ($wrong >= 6) {
	killPlayer($word);
  } else {
	printPage($hang[$wrong], $guesstemplate, $which, $lettersguessed, $wrong);              //still more tries left
  }
}

//header("Content-type: text/plain");
loadWords();

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
  handleGuess();
} else {
  startGame();
}

?>