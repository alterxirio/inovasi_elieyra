<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
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

    <div class="main">
    
        <div class="top">
            <p>Hello <b><?php echo $_SESSION['user'] ?></b></p>
            <p><?php echo date('j/M/Y');?></p>
        </div>
    
        <div class="desktop">
            <div class="mid-container">
                
                <div class="mid">

                    <div class="previous">
                        <button onclick="prevSlide()" id="leftBtn" class="scroll-btn">&lt;</button>
                    </div>

                    <?php
                        $coach = $_SESSION['id'];
                        $sql = mysqli_query($con, "SELECT * FROM teams WHERE coach_id ='$coach'");
                        $cardCount = 0; // Initialize a counter
                        $id = 1;

                        if(mysqli_num_rows($sql) == 0){
                            echo '<div class="no-team">';
                                    echo '<div class="no-team-inner">';
                                        echo '<p>Oops! No team yet—let’s create one........ <span><img src="../media/sports_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" alt=""></span></p>';
                                    echo '</div>';
                            echo '</div>';
                        }
                        else{

                            while ($row = mysqli_fetch_array($sql)) {
                                // Start a new card-container every 3 cards
                                if ($cardCount % 3 == 0) {
                                    if ($cardCount > 0) {
                                        echo '</div>'; // Close the previous card-container
                                    }
                                    echo '<div class="card-container" id='.$id.'?>'; // Open a new card-container
                                    $id++;
                                }
                        ?>
                            <div class="card" >
                                <div class="card-top">
                                    <b><?php echo $row['name']; ?></b>
                                </div>
                                <div class="card-mid">
                                    <div class="card-mid-detail">
                                        <p>Total Player :</p>
                                        <p><?php echo $row['totalPlayer']; ?></p>
                                    </div>
                                    <div class="card-mid-detail">
                                        <p>Level :</p>
                                        <p><?php echo $row['level']; ?></p>
                                    </div>
                                    <div class="card-mid-detail">
                                        <p>Sport :</p>
                                        <p><?php echo $row['sport']; ?></p>
                                    </div>
                                </div>
                                <center>
                                    <div class="mid-bottom">
                                        <button>More</button>
                                    </div>
                                </center>
                            </div>
                        <?php
                                $cardCount++; // Increment the counter
                            }
                            // Close the last card-container if it was opened
                            if ($cardCount > 0) {
                                echo '</div>'; // Close the last card-container
                            }
                        }
                            
                        ?> 
                        
                    
                    <div class="next">
                        <button onclick="nextSlide()" id="rightBtn" class="scroll-btn">&gt;</button>
                    </div>

                </div>
                
            </div>

        </div>

        <div class="mobile">
            <div class="mid-mobile">
                <?php
                    $coach = $_SESSION['id'];
                    $sql = mysqli_query($con, "SELECT * FROM teams WHERE coach_id ='$coach'");
                    $cardCount = 0; // Initialize a counter
                    $id = 1;

                    if(mysqli_num_rows($sql) == 0){
                        echo '<div class="no-team">';
                                echo '<div class="no-team-inner">';
                                    echo '<p>Oops! No team yet—let’s create one........ <span><img src="../media/sports_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" alt=""></span></p>';
                                echo '</div>';
                        echo '</div>';
                    }
                    else{

                        while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <div class="card" >
                            <div class="card-top">
                                <b><?php echo $row['name']; ?></b>
                            </div>
                            <div class="card-mid">
                                <div class="card-mid-detail">
                                    <p>Total Player :</p>
                                    <p><?php echo $row['totalPlayer']; ?></p>
                                </div>
                                <div class="card-mid-detail">
                                    <p>Level :</p>
                                    <p><?php echo $row['level']; ?></p>
                                </div>
                                <div class="card-mid-detail">
                                    <p>Sport :</p>
                                    <p><?php echo $row['sport']; ?></p>
                                </div>
                            </div>
                            <center>
                                <div class="mid-bottom">
                                    <button>More</button>
                                </div>
                            </center>
                        </div>
                    <?php
                        }
                    }
                        
                ?> 
            </div>
        </div>

    </div>
    
</body>
    <script>

        var slides = document.querySelectorAll(".card-container");
        var mid = document.querySelector(".mid");
        var currentSlide = 0;
        slides[currentSlide].classList.add("active");

        slides.forEach(slide => slide.style.display = "none"); // Hide all slides initially
        slides[currentSlide].style.display = "flex"; // Show the first slide

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.style.display = "flex"; // Show the selected slide
                    setTimeout(() => {
                        slide.classList.add("active"); // Trigger animation
                    }, 10); // Small delay to ensure transition runs
                } else {
                    slide.classList.remove("active"); // Remove animation
                    setTimeout(() => {
                        slide.style.display = "none"; // Hide after transition
                    }, 350); // Match the transition time in CSS
                }
            });
        }

        function nextSlide() {
            if (currentSlide < slides.length - 1) {
                currentSlide++;
                showSlide(currentSlide);
            }
        }

        function prevSlide() {
            if (currentSlide > 0) {
                currentSlide--;
                showSlide(currentSlide);
            }
        }

    </script>
</html>

