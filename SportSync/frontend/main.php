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

        <div class="mid-container">
            <button onclick="prevSlide()" id="leftBtn" class="scroll-btn">&lt;</button>
            <div class="mid">
                <?php
                    $coach = $_SESSION['id'];
                    $sql = mysqli_query($con, "SELECT * FROM teams WHERE coach_id ='7'");
                    $cardCount = 0; // Initialize a counter
                    $id = 1;

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
                                    <p>30</p>
                                </div>
                                <div class="card-mid-detail">
                                    <p>Level :</p>
                                    <p>Beginner</p>
                                </div>
                                <div class="card-mid-detail">
                                    <p>Sport :</p>
                                    <p>Rugby</p>
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
                    
                ?>
            </div>
            <button onclick="nextSlide()" id="rightBtn" class="scroll-btn">&gt;</button>
        </div>

    </div>
    
</body>
    <script>

        var slides = document.querySelectorAll(".card-container");
        var mid = document.querySelector(".mid");
        var currentSlide = 0;
        slides[currentSlide].classList.add("active");
        

        // document.getElementById("leftBtn").onclick = function () {
        //     mid.scrollBy({ left: -300, behavior: 'smooth' });
        //     animateCards();
        // };
        // document.getElementById("rightBtn").onclick = function () {
        //     mid.scrollBy({ left: 300, behavior: 'smooth' });
        //     animateCards();
        // };

        // function animateCards() {
        //     let cards = document.querySelectorAll('.card');
        //     cards.forEach(card => {
        //         card.style.animation = "fadeIn 0.5s ease-in-out";
        //         setTimeout(() => {
        //             card.style.animation = "";
        //         }, 500);
        //     });
        // }

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

