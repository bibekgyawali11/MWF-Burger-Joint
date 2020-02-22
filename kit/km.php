
</html>
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
        <button><a class="button1" href="../login.php">LOGout</a></button>
            
</head>

<body>


<table>
   <tr>
    <th> Name</th>
    
   </tr>
   <?php
   include ('../connect.php');
   $namet=$_GET['namet'];
   $statust=$_GET['statust'];
   $sql="SELECT * FROM place WHERE namet like'%$namet%' and statust='busy' ";

   $result = $conn->query($sql);
  

   
   while($row = $result->fetch_assoc()) {
   ?>
   
   
    
    <form action="function/stable.php" method="GET" >
    <td><?php echo $row['namet']?></td> 
    <td><input type="hidden" name="idt" value="<?php echo $row['idt'] ?>">
    <td><input type="submit" name="" value="SELECT"></td>
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