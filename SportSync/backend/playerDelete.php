<?php
include('../config/config.php');

$id = $_GET['id'];


$teamId = mysqli_query($con, "SELECT teamId FROM players WHERE id= '$id'");
$result = mysqli_fetch_array($teamId);

$status = mysqli_query($con, "SELECT status FROM players WHERE id= '$id'");
$statusResult = mysqli_fetch_array($status);

if($statusResult['status'] == 'main'){
    $randomStatus = mysqli_query($con, "SELECT id FROM players WHERE status = 'substitute'");
    $fetch = mysqli_fetch_array($randomStatus);
    $idRandom = $fetch['id'];
    echo $idRandom;

    mysqli_query($con, "UPDATE players SET status = 'main' WHERE id = '$idRandom'");

}


mysqli_query($con, "DELETE FROM players WHERE id = '$id'");

header("Location: ../frontend/teamDetail.php?id=".$result['teamId']."");
   
?>