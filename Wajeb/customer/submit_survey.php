
<html>
<head>
</head>
<body>
HEY <br>
<?php
include ('../connect.php');

$food=$_GET['food'];
$service=$_GET['service'];
$comment=$_GET['comment'];
$current_date= date("Y-m-d");
echo $food."<br>";
echo $service."<br>";
echo $comment."<br>";

$sql = "INSERT INTO survey (food,service,comments,date) VALUES ('$food', '$service', '$comment', '$current_date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location:http://mwfburgerjoint.epizy.com/Wajeb/customer/game_decision.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
</body>
</html>
