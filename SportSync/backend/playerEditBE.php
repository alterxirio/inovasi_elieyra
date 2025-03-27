<?php
include('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $position = $_POST['position'];
    
    $teamId = mysqli_query($con, "SELECT teamId FROM players WHERE id= '$id'");
    $result = mysqli_fetch_array($teamId);
    // Update query
    $sql = "UPDATE players SET name='$name',number='$number',age='$age', position='$position'WHERE id='$id'";
    mysqli_query($con, $sql);
   
    header("Location: ../frontend/teamDetail.php?id=".$result['teamId']."");
   
}
?>