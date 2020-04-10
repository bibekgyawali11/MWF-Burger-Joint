<?php
include ('../connect.php');
session_start();

//to clock in employee 
function clock_in($id){

// Status 1 is in and 0 is out
$time_now = date('Y-m-d');
$sql = "INSERT INTO employee_hours (username, start_time, status) VALUES('$id', '$time_now', 1)";
$conn->query($sql);
}

//to clock out
function clock_out($id){
    $time_now = date('Y-m-d');

    //get the start time of that employee
    $sql = "SELECT * FROM employee_hours WHERE username='$id' AND status=1 LIMIT 1 ";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $start_time = $row['start_time'];

    //calculating the number of hours worked
    $time_worked = (time()- strtotime($start_time)) /3600;

    //push the time worked query
    $sql = "UPDATE employee_hours SET end_time='$time_now', time_worked='$time_worked', status=0 WHERE username='$id' AND status=1";
    $conn->query($sql);

}
?>