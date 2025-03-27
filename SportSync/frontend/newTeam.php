<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/newTeam.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        include('../frontend/navbar.php');
        include('../config/config.php');
    ?>

    <div class="main">

        <div class="top">
            <p>Hello <b><?php echo $_SESSION['user'] ?></b></p>
            <p><?php echo date('j/M/Y');?></p>
        </div>

        <div class="mid">
            <div class="mid-top form bg-gray-200 px-3 rounded-md px-4 py-4">
                <p>Create Your New Team</p>
            </div>
            <div class="form bg-gray-200 px-3 rounded-md px-6 py-8" >
                <form class="max-w-full mx-auto" method="post" action="./newTeam.php">
                    <div class="relative z-0 w-full mb-8 group">
                        <input type="text" name="name" id="floating_password" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-500 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer portrait:w-full" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Team Name</label>
                    </div>

                    <div class="relative z-0 w-full mb-8 group">
                        <input type="text" name="slogan" id="floating_password" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-500 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer portrait:w-full" placeholder=" "  />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Team Slogan(Optional)</label>
                    </div>
                    
                    <!-- <div class="relative z-0 w-[250px] mb-8 group">
                        <input type="number" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 portrait:w-1/2 peer" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Player</label>
                    </div> -->

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Sport</label>
                        <select id="countries" name="sport" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[250px] p-2.5">

                            <option>Volleyball</option>
                            <option>Netball</option>
                            <option>Football</option>
                            <option>Rugby</option>
                            <option>Badminton</option>
                            <option>Softball</option>
                            <option>Sepak Takraw</option>
                            <option>Pétanque</option>

                        </select>
                    </div>

                    <div class="relative z-0 w-full mb-8 group">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Team Levels</label>
                        <select id="countries" name="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[250px] p-2.5">

                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Professional</option>

                        </select>
                    </div>

                    <button type="submit" class="text-white bg-cyan-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
<?php

if(isset($_POST['name'])){

    $coachId = $_SESSION['id'];
    $name = $_POST['name'];
    $sport = $_POST['sport'];
    $level = $_POST['level'];
    $slogan = $_POST['slogan'];

    echo $coachId;
    echo $name;
    echo $sport;
    echo $level;
    echo $slogan;

    mysqli_query($con, "INSERT INTO teams VALUES ('','$coachId','$name','','$level','$sport','$slogan')");
    echo "<script>window.location.href = 'main.php';</script>";
}
?>