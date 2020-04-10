<!DOCTYPE html>
<html>
<head>
    
  <center>  
<img src="../img/6.png"  width="460" height="330">
<style>
body{
    background:#21618C ;
}
table, th, td {
  
}
</style>
<style>
.button {
  background-color: #E5E8E8; 
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}
.logout-button           
        {
            
            height: 25px;
            width: 100px;
            font-size: 20px;
            align-text: center;
            //border: 1px solid black;
            display:block;
            color: red;
            text-align:center;
            position: absolute;
            top: 10px;
            right: 10px;
        }
</style>
</head>
<button class="logout-button"><a href="../../index.php">Logout </a></button>
<table>
  <tr>
    <th><button> <a class="button button1" href="./Menu/view_menu.php">MENU</a></button></th>
    <th><button> <a class="button button1" href="manager.php">Employee</a></button></th>
  </tr>
  <tr>
    <td><button> <a class="button button1" href="status.php">Status</a></button></td>
    <td><button> <a class="button button1" href="./Inventory/view_inventory.php">Inventory</a></button></td>
  </tr>
  <tr>
    <td><button><a class="button button1" href="survey.php">Survey</a></button></td>
    <td><button><a class="button button1" href="Report/index.php">Report</a></button></td>
    
    
  </tr>
</table>
</center>
</html>