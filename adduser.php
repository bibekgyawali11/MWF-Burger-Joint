<!DOCTYPE html>
<html>
<head>
    
 <title>Add worker</title>
 <link rel="stylesheet" type="text/css" href="style.css" > 
 
</head>

<body>
    <div>
    
<label class="head1">Add worker</label class="head1">

<form  action="function/adduser.php" method="GET">
    <input class="fi" type="text" name="firstname">
    <label< class="label1" > First name</label><br>
    <input class="fi" type="text" name="lastname">
    <label< class="label1" >Last name</label<><br>
    <input class="fi" type="text" name="usename">
    <label< class="label1" >User name </label<><br>
    <input class="fi" type="email" name="emailaddress">
    <label< class="label1" >E-mail</label<><br>
    <input class="fi" type="password" name="password1">
    <label>  Password   </label<><br>
    <input class="fi" type="password" name="repassword">
    <labe>  Re-password</label<><br>
    <select name="status1">
    <option value="">Occupation</option>
    <option value="manager">manager</option>
    <option value="waitress">waitress</option>
    <option value="cooker">cooker</option>
    </select><br>
    <input class="button2" type='submit' name="">
    
    </div>
</form>

</body>
</html>