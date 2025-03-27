<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>
    <link rel="stylesheet" href="../css/introduction.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        include('../frontend/navbar.php');
        include('../config/config.php');
        session_start();
    ?>

    <div class="banner">
    <img src="..\media\Ball animation.gif" alt="SportSync">
    </div>

    <div class="about-section">
    <img src="..\media\Coach and Athlete.png" alt="Coach and Athlete">
    <div class="about-text">
        <h2>About SportSync</h2>
        <p>SportSync is a sports management system that helps coaches and athletes manage schedules, update team info, and communicate efficiently. It ensures organized, fast, and systematic team management.</p>
    </div>
</div>
<div class="mobile-section">
    <div class="mobile-text">
        <h2>Mobile Compatible</h2>
        <p>Our website is fully optimized for mobile devices, providing a seamless, responsive experience. Access coaching resources, training schedules, expert guidance, and interactive features anytime, anywhere on your phone.</p>
    </div>
    <div class="mobile-image">
        <img src="..\media\mobile.png" alt="Mobile App">
    </div>
</div>


</body>
</html>
