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
    <th>img</th>
    <th>Name</th>
    <th>price</th>
    
    
    
   </tr>
   <?php
   include ('connect.php');
   $n1=$_GET['n1'];
   $sql="SELECT * FROM menu WHERE 1";

   $result = $conn->query($sql);
   while($row = $result->fetch_assoc()) {
   ?>
   
   
    <td><?php echo $row['name'] ?></td>  
    
    <td><?php echo $row['price'] ?></td>
    
    
   
    
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