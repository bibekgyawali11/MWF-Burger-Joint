
<!DOCTYPE html>
<html>
<head>
<?php
        session_start();
        $idt=$_SESSION['tablesession'];
    
    ?>
  <center>  
<img src="../img/6.png"  width="460" height="330">
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

    
<table>
  <tr>
    <th><button><a href="../waitstaff/menu.php"> <img src="./img/menu.png"  width="160" height="145"></a></button></th>

    <th><button><a href= "./pay.php"><img src="./img/pay.png"  width="160" height="145"></a></button></th>
  </tr>
  <tr>
   <form action="helpbutton.php" method="GET">
    <input  type="hidden" name="idt" value="<?php echo $idt  ?>">
    <input  type="hidden" name="help" value="enabled" >

     <td><button><a href= "help.php"><img src="./img/help.png"  width="160" height="145" type="submit"></a></button></td>

    
    
     
     </form>
    <td><button><a href="./refill.php"><img src="./img/refill.JPG" width="160" height="145"></a></button></td>
  
  <tr>
    <td><button><a href="./kids_mode.php"><img src="./img/kids_mode.png" width="160" height="145"></a></button></td>
  </tr>

</table>

</center>
<button style="right:0px; bottom:0px" >
  <a href="../../index.php"> Logout </a>
</button>
</body>
</html>