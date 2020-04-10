<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    header("Refresh: 03");?>
        <title>WELCOME TO MWF Burger Joint</title>
        <link rel="stylesheet" href="./styles.css">
        <style>
        .buttonload {
  background-color: #4CAF50; /* Green background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 15px 24px; /* Some padding */
  font-size: 20px; /* Set a font-size */
}

/* Add a right margin to each icon */
.fa {
  margin-left: -12px;
  margin-right: 8px;
}
.button {
  background-color: #333333; /* #333333 */
  border: none;
  color: white;
  padding: 50px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 50px;
  margin: 4px 2px;
  cursor: pointer;
}
.button5 {border-radius: 50%;}

.disabled {width: 25%;}
.disabled{
  padding: 15px 32px; 
  font-size: 16px;
  margin: 4px 2px; 
}
.enabled {width: 25%;}
.enabled {
  background-color: #DC7633; /* DC7633 */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
    </head>
  <?php
        session_start();
        $idt=$_SESSION['tablesession'];
        
      
    ?>
    
    <body style="background-color: lightblue;">
        <div class="logo">MWF Burger Joint
            <center> <button class="button button5"><?php echo "$idt";?></button></center>
        </div>
        <div style=" border:1px solid red; align-content:centre; font-size: xx-large; margin: 30px; padding:50px;">
            <button type="hidden" id="demo1" onclick="typeWriter()"></button>
            
          <center><p id="demo"></p></center>
        <?php
        include ('../connect.php');


$sql="SELECT * FROM place where idt='$idt'";


$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {

        ?>
 
<center><button id=<?php echo $row['open']?> <?php
        session_start();
        $idt=$_SESSION['tablesession'];
        
      
    ?> onClick="window.location = 'http://mwfburgerjoint.epizy.com/Wajeb/customer/customer.php'" class="buttonload">
  <i class="fa fa-refresh fa-spin"></i>waiting </button></center>
<?php           
}?>
<script>

var i = 0;
var txt = 'WELCOME TO MWF Burger Join please Wait for Waitstaff';
var speed = 50;
document.getElementById("demo1").click();
function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
document.getElementById("enabled").click();
</script>
            <br/> <br/> <br/>
           
            
        </div>
        
    }
    </body>
</html>