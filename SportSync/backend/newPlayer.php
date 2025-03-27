<?php
include('../config/config.php');
    if(isset($_POST['name'])){

        $teamId = $_GET['id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $age = $_POST['age'];
        $position = $_POST['position'];
        $sport = $row['sport'];


        $query = "SELECT COUNT(*) AS count_main FROM players WHERE teamId = $teamId AND status = 'main'";
        $result = mysqli_query($con, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row['count_main'] < 6) {
                    mysqli_query($con, "INSERT INTO players VALUES ('','$teamId','$name','$age','$position','$sport','$number','main')");
                }
                else{
                    mysqli_query($con, "INSERT INTO players VALUES ('','$teamId','$name','$age','$position','$sport','$number','substitute')");
                }
            }
    }
    
    $idTeam = mysqli_query($con, "SELECT teamId FROM players WHERE teamId='$teamId'");
    $result = mysqli_fetch_array($idTeam);

    
    header("Location: ../frontend/teamDetail.php?id=".$result['teamId']."");
?>