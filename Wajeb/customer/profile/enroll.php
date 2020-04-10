    <?php 
    session_start();
    include ('../../connect.php');
    if (isset($_POST['submit']))
    {
        //Get the values from the form
        $name=$_POST['name'];
        $e=$_POST['email'];
        $date_temp = $_POST['dob'];


        //Check first if the email already exists on the system
        $sql = "SELECT * FROM customer WHERE email='$e' ";

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
                $count = $result->num_rows;
            }
    //if the record is found
    if ($count >0)
        {
            echo "<script>
                alert('The entered email already has an account! Try signing in')
                window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/pay.php');
                </script>";
        }
    else
        {
        //echo "Received date was ".$date1."<br>";
        $birth_date = date('Y-m-d',strtotime($date_temp));              //change the birth date format
        $visit=0;
        
        $sql = "INSERT INTO customer (name, email,dob,visit) VALUES ('$name', '$e', '$birth_date', '$visit')";      //make a sql query
        // echo $name."----".$e."----".$birth_date."------".$visit."<br>";
                echo "<script>
                    alert('Sucessfully created an account')
                     window.location.replace('http://mwfburgerjoint.epizy.com/Wajeb/customer/pay.php');
                    </script>";
        }
    }
    
?>
<html>
<head>
	<link rel="stylesheet" href="../styles.css">

	
<title>
		New Customer Join in
</title>

</head>

<body style="background-color: lightblue;">
        <div class="logo">

	MWF Burger Joint    
        </div>
	<div class = "logo">
	NEW CUSTOMER ENROLLMENT<br><br><br>
    <form action="#" method="post">
    <label for="name">Name: </label>
    <input type="text" name="name" id="name"><br>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email"><br>
    <label for="dob">Date of Birth: </label>
    <input type="date" name="dob" id="dob" placeholder="DD-MM-YYYY"><br>

    <br><br>
    <input type="submit" placeholder="submit" name="submit"><br>
    </form>

</body>
	
</html>