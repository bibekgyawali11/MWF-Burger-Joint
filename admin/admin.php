<!DOCTYPE html>
<html>
<head>
    
 <title>Add worker</title>
 <style type="text/css">
   table , tr , th , td {
       border: 1px solid black ;
   } 
   </style>
 <?php
        session_start();
        $n1=$_SESSION['username'];
        echo $n1;

        ?>
</head>

<body>
<button><a class="button1" href="../login.php">LOGout</a></button>
<form action="function/logintest.php" method="get">
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
   include ('../connect.php');
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

</body>
</html>