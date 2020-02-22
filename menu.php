<!DOCTYPE html>
<html>
     <div>
    <head>
        <ul>
        <title>M W F</title>
        <style>
table, th, td {
  border: non;
}
</style>
      

    <button><a href="menu.php"> <img src="img/help.jpg"  width="200" height="90"></a></button>
    <center>
    <h1>MENU</h1>
    </center>
 
 
    </head>
    <body>
         
         <table>
  <tr>
    <th><button><a href="menu.php"> <img src="img/burgers.jpg"  width="200" height="80"></a></button></th>
    <th><img src="img/fries.jpg"  width="200" height="80"></th>
    <th><img src="img/drinks.jpg"  width="200" height="80"></th>
    <th><img src="img/desserts.jpg"  width="200" height="80"></th>
  </tr>
  <tr>
    <td>
   
<table>
   <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last name</th>
    <th>User Name</th>
    <th>E-mail</th>
    <th>Status</th>
    <th>Delete</th>
    
    
   </tr>
   <?php
   include ('connect.php');
   $n1=$_GET['n1'];
   $sql="SELECT * FROM adduser WHERE usename like'%$n1%' or firstname like'%$n1%'";

   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
   ?>
   
   
    <td><?php echo $row['id'] ?></td>  
    <td><?php echo $row['firstname'] ?></td> 
    <td><?php echo $row['lastname'] ?></td>
    <td><?php echo $row['usename'] ?></td> 
    <td><?php echo $row['emailaddress'] ?></td> 
    <td><?php echo $row['status1'] ?></td>
    <td><a href="../function/delete.php?n1=<?php echo $row['id'] ?>">delete</a></td>
    
    <form action="../function/update.php" method="GET">
     
     <td><input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <select name="status1">
    
    <option value="<?php echo $row['status1'] ?>"><?php echo $row['status1'] ?></option>
    <option value="manager">manager</option>
    <option value="waitress">waitress</option>
    <option value="cooker">cooker</option>
    <td><input type="submit" name="" value="SAVE"></td>
    </select>
     </td>
     </form>
   </tr>  
   <?php
   }?>
</table>
</form>

        
     </div>
    </body>
</html>