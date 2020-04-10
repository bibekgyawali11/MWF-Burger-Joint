<!DOCTYPE html>
<html>
     <div>
    <head>
<?php
header("Refresh: 03");
$servername="sql312.epizy.com";
$username="epiz_25250937";
$password="CREQt2I0CJ50";
$dbname="epiz_25250937_wajeb";
$conn = mysqli_connect($servername ,$username ,$password , $dbname);

  
?>

    <style>


body{
    background:#21618C ;
}
.button2 {
  background-color:#DCDCDC  ;
 border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;

}

.button2 {width: 100%;}
     .button3 {
  background-color: #009933; /* #cc6600 */
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
.disabled {width: 100%;}
.disabled{
  padding: 15px 32px; 
  font-size: 16px;
  margin: 4px 2px; 
}
.enabled {width: 100%;}
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

.button3 {width: 100%;} 
    


.button4 {
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

.button4 {width: 100%;}

.button5 {
  background-color: #4CAF50; /* Green */
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

.button5 {width: 50%;}

table, th, td {
  
}
.notification {
  background-color: #009933;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 20px;
}
.notification {width: 100%;} 
.notification:hover {
  background: #DC7633;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
        <ul>
        <title>M W F</title>
        <link rel="stylesheet" type="text/css" href="style.css" > 
        <?php
        session_start();
        $n1=$_SESSION['username'];
        echo $n1;

        ?>
        
        </ul>
     <button><a class="button1" href="../login.php">LOGOUT</a></button>
    </head>
    <body>
        
      <center>
    <h2>Waitstaff</h2>
   

<table>
  
    <th><button class="button4 button4">Table Name</button></th>
    <th><button class="button4 button4">Table Status</button></th>
    <th><button class="button4 button4">Help</button></th>
    <th><button class="button4 button4">Refill</button></th>
    <th><button class="button4 button4">set up</button></th>
  <?php
$sql="SELECT * FROM place WHERE separate='a' ";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) { 
        $count = $result-> num_rows;
        
        
          ?>
    
    <tr>
    
    <td><button class="button3 button3"><?php echo $row['namet']?></button></td>
    <form action="../function/waitupdate.php" method="GET">
     <input type="hidden" name="id" value="<?php echo $row['idt']?>">
    <input type="hidden" name="name" value="<?php echo $row['namet']?>">
    <input type="hidden" name="processing" value="done">
    <input type="hidden" name="orderdone" value="0">
    <input type="hidden" name="statust" value="ordered">
    <td><button  <a  class="notification">
        
        <span class="badge"><?php echo $row['orderdone']?></span>
     
          </a><?php echo $row['statust']?></button></td>
           </form>
     <form action="helpbutton.php" method="GET">
    <input class="button3 button3" type="hidden" name="namet" value="<?php echo $row['namet'] ?>">
     <td><button class=<?php echo $row['help']?> type="submit" <?php echo $row['help']?>>help</button></td>
    <input  class="buttont" type="hidden" type="submit"  name="help" value="disabled" >
    </form>
     <form action="refillbutton.php" method="GET">
        <input class="button3 button3" type="hidden" name="namet" value="<?php echo $row['namet'] ?>">
    

     <td><button class=<?php echo $row['refillstatus']?> type="submit" <?php echo $row['refillstatus']?>><?php echo $row['refill']?></button></td>
    <input  class="buttont" type="hidden" type="submit"  name="help" value="disabled" >
      </form></td> 
      <form action="setup.php" method="GET">
      <input class="button3 button3" type="hidden" name="namet" value="<?php echo $row['namet'] ?>">
    <td><button class=enabled type="submit" name="open" value="enabled" enabled>Open </button></td>
     </form>


    </tr>
    
    <?php 
   }?>
   
  
</table>
 <?php
$sql="SELECT * FROM kitchenhelp  ";
   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) { 
        $count = $result-> num_rows;
        
        
          ?>
    <button class="button3 button3">KITCHEN</button>   
    <button class=<?php echo $row['kitchenhelp']?> type="submit" name="open" value="enabled" <?php echo $row['kitchenhelp']?>>Help</button>     
    </center>

     <?php 
   }?>
     </div>
    </body>
</html>