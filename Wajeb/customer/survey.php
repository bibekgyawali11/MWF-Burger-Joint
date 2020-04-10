<html>
<head>
	<link rel="stylesheet" href="./styles.css">
	
	<title>
		Menu
	</title>
</head>

<body style="background-color: lightblue;">
        <div class="logo">
	MWF Burger Joint    
        </div>
	
	<div class = "logo">
	CUSTOMER EXPERIENCE SURVEY<br><br><br>
    <form action="./submit_survey.php" method="get">
    <label for="food">Rate the food from(1-10): </label>
    <input type="text" name="food" id="food"><br>
    <label for="service">Rate the service(1-10): </label>
    <input type="text" name="service" id="service"><br>
    <label for="comment">Additional Comments: </label>
    <input type="text" name="comment" id="comment"><br>

    <br><br>
    <input type="submit" placeholder="submit"><br>
    </form>

</body>
	
</html>