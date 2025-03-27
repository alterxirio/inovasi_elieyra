<?php
include('../config/config.php');

    $id = $_GET['id'];
   
    $teamId = mysqli_query($con, "SELECT teamId FROM event WHERE id='$id'");
    $result = mysqli_fetch_array($teamId);
    // Update query
    $sql = "UPDATE event SET status='1' WHERE id='$id'";
    mysqli_query($con, $sql);
   
    header("Location: ../frontend/teamDetail.php?id=".$result['teamId']."");
   
?>