<?php
include ('../connect.php');
session_start();
function kids_meal_and_free_drink_check(){ 
    $idt = $_SESSION['tablesession'];
//KIDS MEAL CHECK Sunday 4pm to 12 am
if (date('D')=='Sun' and date('H')>16 and date('H')<=23)
    {
        $sql = " SELECT price FROM order_food WHERE id='$idt' AND name LIKE '%kids%' LIMIT 1";           //getting kids meal query
        $result = $conn->query($sql);

        //if found
        while($row=$result->fetch_assoc()){
            $_SESSION['discount'] = $_SESSION['discount'] + $row['price'];
        }
    }

//FREE DRINK CHECK Monday 4pm to 12 am
elseif (date('D')=='Mon' and date('H')>16 and date('H')<=23)
    {
        $sql = "SELECT * FROM order_food WHERE id='$idt' AND Category='Drink' LIMIT 1";
        $result = $conn->query($sql);

        //if found
        while($row = $result->fetch_assoc()){
            $_SESSION['discount'] = $_SESSION['discount'] + $row['price'];
        }
    
    }
}

?>