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
            <button id="leftBtn" class="scroll-btn">&lt;</button>
            <div class="mid">
                <?php
                    $coach = $_SESSION['id'];
                    $sql = mysqli_query($con,"SELECT * FROM teams WHERE coach_id ='7'");
                    while($row = mysqli_fetch_array($sql)){
                ?>
                    <div class="card">
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
                    }
                ?>
            </div>

            <button id="rightBtn" class="scroll-btn">&gt;</button>

        </div>

    </div>
    
</body>
    <script>
        var mid = document.querySelector(".mid");
        document.getElementById("leftBtn").onclick = function () {
            mid.scrollBy({ left: -300, behavior: 'smooth' });
            animateCards();
        };
        document.getElementById("rightBtn").onclick = function () {
            mid.scrollBy({ left: 300, behavior: 'smooth' });
            animateCards();
        };

        function animateCards() {
            let cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.animation = "fadeIn 0.5s ease-in-out";
                setTimeout(() => {
                    card.style.animation = "";
                }, 500);
            });
        }
    </script>
</html>

