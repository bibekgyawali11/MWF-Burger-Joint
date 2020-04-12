<!DOCTYPE html>
<html>
<head>
<title>kitchen</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}
img:hover{ cursor:pointer;}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

.info {
  border-color: #2196F3;
  color: dodgerblue
}

.info:hover {
  background: #2196F3;
  color: white;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>
<body>
 
  
<?php
	header("Refresh: 03");
	include ('../connect.php');
  		
		// Bikesh update start
		session_start();
        $n1=$_SESSION['username'];

		//get session id
		$session_id=session_id();
		
		//display session start time
		$_SESSION['str_time'] = time();
		if (isset($_SESSION['str_time']))
		{
			// get login time
			$start_time = $_SESSION['str_time'];
			//echo $start_time;
			
			// Query to update kitchenstaff_hours table 
			$sqlStartTime= "INSERT INTO kitchenstaff_hours (sessionID,StaffID, start_time) VALUES ('$session_id','$n1','$start_time')";
			$sqlInputStartTime = $conn->query($sqlStartTime);
		}
		
		// Convert login timestamp to datetime format
		$startDateTime = date('Y-m-d H:i:s', $start_time);
		
		// Query to update kitchenstaff_hours table by login date time 
		$sqlStartDateTimeFormat = "UPDATE kitchenstaff_hours SET start_date_time='$startDateTime' WHERE sessionId='$session_id'";
		$sqlUpdateStartDateTime = $conn->query($sqlStartDateTimeFormat);
		
        // Bikesh update end
		
		$sql="SELECT * FROM order_food where status='inkitchen'";
  
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
       
   ?>
   
    <div class="timeline">
     <div class="container left">
    <div class="content">

     
      <h2>Table Number:<?php echo $row['id']?></h2>
      <h2><?php echo $row['name']?> <?php echo $row['Quantity']?><input type="checkbox" name="food" value="ok"></h2><p><?php echo $row['details']?></p>
 <form action="../function/kitchenu.php" method="GET">
<form action="../function/kitchenupdate.php" method="GET">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<input type="hidden" name="name" value="<?php echo $row['name']?>">
<input type="hidden" name="processing" value="done">
<input type="hidden" name="orderdone" value="1">
<input type="hidden" name="statust" value="order ready">
      <button type="submit" class="btn info">Done</button>  

        </form>
        </form>
        
     </div>
     </div> 
  
  <div class="container right">
    <div class="content">
          <h2>Table Number:<?php echo $row['id']?></h2>
        <h1> <?php echo $row['togo']?></h1>
      <h2><?php echo $row['name']?> <?php echo $row['Quantity']?><input type="checkbox" name="food" value="ok"></h2><p><?php echo $row['details']?></p>
 <form action="../function/kitchenu.php" method="GET">
<form action="../function/kitchenupdate.php" method="GET">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<input type="hidden" name="name" value="<?php echo $row['name']?>">
<input type="hidden" name="processing" value="done">
<input type="hidden" name="orderdone" value="1">
<input type="hidden" name="orderid" value="1">
<input type="hidden" name="statust" value="order ready">
      <button type="submit" class="btn info">Done</button>  

        </form>
        </form>
      </div>
      </div>
      
      <?php
     } ?>
    </div>
   <div class="help" style="position: absolute; right: 0px; bottom: 0px;" ><form action="helpbutton.php" method="GET">
    <input  type="hidden" name="kitchenhelp" value="enabled" >

    <button><a href= "help.php"><img src="help.png"  width="150" height="100" type="submit"></a></button>

     </form>
		</div>
    <div class="logOut" style="position: absolute; left: 0px; bottom: 0px;" ><button><a href= "/Wajeb/logout.php"> <!-- Bikesh update -->
                <img src="logOut.png"  width="150" height="100" type="submit"></a></button>
    </div>
  </div>
  </div>
  </div>
 

</body>
</html>