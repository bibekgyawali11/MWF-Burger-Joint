<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" >  
       <title> Login</title>
     <?php
     session_start();
     session_unset();
     session_destroy();
     ?>
    </head>
    <body>
        <div>
     <form action="function/logintest.php" method="get">
         <input type="usename" name="n1">
         <label> User name </label><br>
         <input type="password1" name="n2">
         <label>Password</label><br>
         <input type="submit" name="">
     </form>   
      
    </div>
    </body>
    </html>