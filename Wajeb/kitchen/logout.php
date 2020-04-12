<?php
/*
session_start();
if(isset($_SESSION['username']))
{
    session_destroy();
    echo "<script>location.href='login.php'</script>">;
}
else
{
    echo "<script>location.href='login.php'</script>">;
}
*/
?>
<?php
// Bikesh update
        
		//connect the database
		include ('../connect.php');
		
		//start the session again
		session_start();
		
        //get session id
		$session_id=session_id();		
		
		//get login time
		$start_time = $_SESSION['str_time'];
		
        //get logout time
		$_SESSION['end_time'] = time(); 
		$end_time=$_SESSION['end_time'];
		
        // calculate total seconds logged in
		$total_time = $end_time - $start_time;

        // calculate total mins logged in
		$total_mins = $total_time / 60;
		
		// Query to update kitchenstaff_hours table 
		$sqlEndTime= "UPDATE kitchenstaff_hours SET end_time='$end_time', total_secs_session='$total_time', total_mins='$total_mins' WHERE sessionId='$session_id'";
		$sqlInputEndTime = $conn->query($sqlEndTime);
		
		// Convert logout timestamp to datetime format
		$endDateTime = date('Y-m-d H:i:s', $end_time);
		
		// Query to update kitchenstaff_hours table by logout date time
		$sqlEndDateTimeFormat = "UPDATE kitchenstaff_hours SET end_date_time='$endDateTime' WHERE sessionId='$session_id'";
		$sqlUpdateEndDateTime = $conn->query($sqlEndDateTimeFormat);
		
		?>
		<?php

		session_unset();
		
		// Kill the session and destroy session data
		if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,$params["path"], $params["domain"],$params["secure"], $params["httponly"]);
		}
		
		session_destroy();
		
		
		?>
		<?php
		header('Location: ../login.php');
		?>