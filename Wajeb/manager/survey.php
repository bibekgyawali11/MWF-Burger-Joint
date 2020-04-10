<!DOCTYPE html>

<!-- This file displays the survey result to the manager -->
<html>
<head>

 <title>View Survey's</title>
 <!-- Custom CSS for the table and file -->
 <style type="text/css">
   table , tr , th , td {
       border: 1px solid black ;
   } 
   td,th{
       width:500px;
       text-align: center;
       height:50px;
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
<!-- Start the session -->
 <?php
        session_start();
        $n1=$_SESSION['username'];
        echo $n1;
        ?>
</head>

<body style="background-color:lightblue; ">
<button><a class="button1" href="../login.php">LOGout</a></button>
<br>
<div class="logout-button"><button> <a href="./index.php">Exit</a></button></div>
<form action="function/logintest.php" method="get">
<center>

<!-- Custom css for the Title -->
<div style="margin: 5px; font-family: cursive;font-size: xx-large; text-align: center; justify-content: center;">
MWF Burger Joint<br>
Surveys
</div>
<table>
<!-- Header for the Table -->
   <tr>
   <th>S.N</th>
    <th>Food Rating(1-10)</th>
    <th>Service Rating(1-10)</th>
    <th>Comments</th>
    <th>Date of Service</th>
   </tr>

<!-- Connect the database -->
     <?php
   //connect to the database
   include ('../connect.php');
    $count=0;
  // $n1=$_GET['n1'];
   $sql="SELECT * FROM survey";
   $result = $conn->query($sql);

   //get all the rows
   while($row = $result->fetch_assoc()) {
   ?>

<!-- Print the results every column in a row -->
  <td><?php echo $count; ?></td>
  <td><?php echo $row['food'] ?></td>
  <td><?php echo $row['service'] ?></td>
  <td><?php echo $row['comments'] ?></td>
  <td><?php echo $row['date'] ?></td>
  <?php $count = $count +1; ?>                  <!-- increase the S.N each time -->
  </tr>
  <?php } ?>
</table>
</center>
</body>
</html>