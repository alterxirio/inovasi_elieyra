<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            /* font-size: medium; */
            user-select: none;
        }
        .navbar{
            display: flex;
            justify-content: space-between;
            padding: 20px 10%;
            background-color:#000080  ;
        }
        a{
            color:#ffffff ;
            font-family: "Lexend Deca", serif;
            font-weight: bold;
            padding: 0px 0px;
        }
        .link{
            text-align: center;
            width: 60%;
            justify-content: space-between;
            display: flex;
            float: inline-end;
        }
        .right{
            width: 50%;
        }
        .left{
            width: 50%;
        }
        h3{
            font-size: larger;
        }
        .logo{
            width: fit-content;
        }
        hr{
            color: white;
        }

        .menu-btn {
            font-size: 30px;
            background: none;
            border: none;
            cursor: pointer;
            color: #ffffff;
            display: none; /* Hidden by default */
            float: inline-end;
        }

        .menu {
            display: none; /* Hide menu initially */
            background-color: #000080;
            position: absolute;
            width: 60%;
            font-family: "Lexend Deca", serif;
            height: 100vh;
            left: 0;
            padding-left: 5%;
            padding-top: 5%;
            padding-right: 5%;
        }

    
        .menu-right{
            color: #ffffff;
            font-size: medium;
            font-weight: bold;
            background-color: red;
        }

        .menu a {
            color: white;
            padding: 10px;
            text-decoration: none;
            display: block;
        }

        @media screen and (max-width: 768px) {


            .menu-btn {
                display: block;
            }
            
            .link{
                display: none;
            }

        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="left">
            <div class="logo">
                <h3><a href="">SportSync .</a></h3>
                <hr>
            </div>
        </div>  
        <div class="right">
            <div class="link">
                <a href="">New Team</a>
                <a href="">text</a>
                <a href="">Account</a>
            </div>
        </div>
        <div class="mobile">
            <button class="menu-btn" onclick="toggleMenu()">☰</button>
            <div class="menu">
                <div class="menu-left">
                    <a href="#">Home</a>
                    <hr>
                    <a href="#">About</a>
                    <hr>
                    <a href="#">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <p>Ba ba ba banana </p> -->
</body>
<script>
    function toggleMenu() {
        var menu = document.querySelector(".menu");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
        console.log("s")
    }

</script>
</html>
<!-- #007ba7 -->
<!-- #104271 -->
<!-- #ffffff -->
<!-- #000080 -->