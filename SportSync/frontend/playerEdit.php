<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=edit" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,200,0,0&icon_names=edit" />
    <link rel="stylesheet" href="../css/teamDetail.css">
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
        <div class="header w-3/4 mx-auto bg-gray-300 p-5 rounded-lg my-10">
            <p class="text-[1.7rem] font-bold">Edit Player</p>
        </div>
        <div class="w-3/4 mx-auto bg-gray-300 p-5 rounded-lg">
            <form class=" w-3/4 portrait:w-full ml-10 portrait:ml-0" action="../backend/playerEditBE.php?id=<?php $id = $_GET['id']; echo $id; ?>" method="post">
                <?php
                    $id = $_GET['id'];
                    $sql = mysqli_query($con, "SELECT * FROM players WHERE id='$id'");
                    $row = mysqli_fetch_array($sql)
                ?>
                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Player Name</label>
                    <input type="text" name="name" value="<?php echo $row['name'] ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="name@flowbite.com" required />
                </div>
                <div class="mb-3 w-3/4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Player Number</label>
                    <input type="number" name="number" value="<?php echo $row['number'] ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" value="16" required />
                </div>
                <div class="mb-3 w-3/4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Player Age</label>
                    <input type="number" name="age" value="<?php echo $row['age'] ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" value="16" required />
                </div>
                <div class="mb-5 w-1/2">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Position</label>
                    <select id="countries" name="position" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <?php
                        $sport = $row['sport'];
                        $position = mysqli_query($con, "SELECT * FROM position WHERE sport = '$sport'");

                        while ($option = mysqli_fetch_array($position)){
                        ?>
                            <option><?php echo $option['position']; ?></option>
                        <?php
                        }
                    ?>
                    </select>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
