<?php
include('../config/config.php');
    if(isset($_POST['name'])){

        $id = $_GET['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        mysqli_query($con, "INSERT INTO event VALUES ('','$id','$name','$date','$time','0')");
    }
    // $idTeam = mysqli_query($con, "SELECT teamId FROM players WHERE teamId='$teamId'");
    // $result = mysqli_fetch_array($idTeam);

    
    header("Location: ../frontend/teamDetail.php?id=".$id."");
?>