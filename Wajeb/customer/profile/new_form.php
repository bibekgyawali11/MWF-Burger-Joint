
<html>
<head>
</head>
<body>
<?php
include ('../../connect.php');

$name=$_GET['name'];
$e=$_GET['email'];
$date_temp = $_GET['dob'];
//echo "Received date was ".$date1."<br>";
$birth_date = date('Y-m-d',strtotime($date_temp));
$visit=0;

$sql = "INSERT INTO customer (name, email,dob,visit) VALUES ('$name', '$e', '$birth_date', '$visit')";

echo $name."----".$e."----".$birth_date."------".$visit."<br>";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<br><br>
<button> <a href="../customer.php">Ok</a></button>
</body>
</html>
