<?php

include('../config/config.php');
$id=$_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['swap_players'])) {
        foreach ($_POST['swap_players'] as $player_id) {
            $query = "SELECT status FROM players WHERE id = " . $player_id;
            $result = $con->query($query);
            
            while ($row = $result->fetch_assoc()) {
                $new_status = ($row['status'] == 'main') ? 'substitute' : 'main';
                $con->query("UPDATE players SET status = '$new_status' WHERE id = $player_id");
            }
        }
    }
    header("Location: ../frontend/teamDetail.php?id=".$id."");
}
?>