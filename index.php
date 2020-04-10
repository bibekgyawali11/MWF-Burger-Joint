<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Wajeb/style.css" >  
       <title> Login</title>
     <?php
     session_start();
     session_unset();
     session_destroy();
     ?>
     <center>
     <img src="Wajeb/img/6.png"  width="460" height="330">
    </head>
    <body>
     <form action="Wajeb/function/logintest.php"  method="get">
         <input type="usename" name="n1"  placeholder="User name"><br>
         
         <input type="password" name="n2" placeholder="Password" ><br>
         
         <button type="submit">Login>>></button>
         
     </form>   
    </center>
    </body>
    </html>