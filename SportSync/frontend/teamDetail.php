<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
<body style="background-color: whitesmoke;" class="hide-scrollbar">
    <?php
        include('../frontend/navbar.php');
        include('../config/config.php');
    ?>
    <div class="main light" >

        <div class="top">
            <p>Hello <b><?php echo $_SESSION['user'] ?></b></p>
            <p><?php echo date('j/M/Y');?></p>
        </div>

        <div class="mid">
            <div style="background-color: #000080;" class="mid-top w-full rounded-xl  portrait:h-[25vh] flex justify-center align-center relative py-5">
                <div class="team-edit absolute right-0 top-0 m-5">
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" data-modal-backdrop="static" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-center" type="button">
                       <span class="material-symbols-rounded ">edit</span>
                    </button>
                </div>
                <div class="team-container w-[90%]  m-auto ">
                    <?php
                    
                        $team = $_GET['id'];
                        $sql = mysqli_query($con, "SELECT * FROM players WHERE teamID ='$team' AND status='main'");
                        $cardCount = 0; // Initialize a counter
                        $id = 1;

                        if(mysqli_num_rows($sql) == 0){
                            echo '<div class="no-team ">';
                                    echo '<div class="no-team-inner flex bg-red-900">';
                                        echo '<p>Oops! No player yet—let’s add one........ <span class="inline"><img src="../media/sports_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" alt=""></span></p>';
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
                                    echo '<div class="row  w-full my-10 flex justify-evenly" id='.$id.'?>'; // Open a new card-container
                                    $id++;
                                }
                        ?>
                            <div class="player" >

                                <div class="player-num w-[70px] h-[70px] bg-white rounded-full  items-center justify-center flex">
                                    <p class=" w-full h-full flex items-center justify-center text-lg"><?php echo $row['number'] ?></p>
                                </div>

                                <div class="player-position text-center text-white mt-3">
                                    <p class="text-lg"><?php echo $row['position'] ?></p>
                                </div>

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
                </div>
            </div>
        </div>

        <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block mt-5 mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
            New Player <img class="inline w-7 h-7" src="../media/add.png" alt="">
        </button>

        <div class="relative overflow-y-auto shadow-md sm:rounded-lg max-h-[310px] custom-scrollbar">
            <table class="w-full bg-white text-sm text-left text-gray-500">
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-300 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-start">Player Name</th>
                        <th scope="col" class="px-5 py-3">Number</th>
                        <th scope="col" class="px-5 py-3">Position</th>
                        <th scope="col" class="px-5 py-3">Age</th>
                        <th scope="col" class="px-5 py-3">Status</th>
                        <th scope="col" class="px-3 py-3">Edit</th>
                        <th scope="col" class="px-3 py-3">Performance</th>
                        <th scope="col" class="px-3 py-3">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $team = $_GET['id'];
                        $sql = mysqli_query($con, "SELECT * FROM players WHERE teamID ='$team'");
                        while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr class="bg-white border-b border-gray-200 text-center">
                            <th scope="row" class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap text-start"><?php echo $row['name'] ?></th>
                            <td class="px-5 py-4"><?php echo $row['number'] ?></td>
                            <td class="px-5 py-4"><?php echo $row['position'] ?></td>
                            <td class="px-5 py-4"><?php echo $row['age'] ?></td>
                            <td class="px-5 py-4"><?php echo $row['status'] ?></td>
                            <td class="px-3 py-4">
                                <a href="../frontend/playerEdit.php?id=<?php echo $row['id'] ?>"><p class="text-blue-600 ">Edit</p></a>
                            </td>
                            <td class="px-3 py-4">
                                <a href="../"><button class="bg-blue-500 px-5 portrait:text-sm rounded-lg"><img class="w-[30px] h-[30px]" src="../media/more_horiz.png" alt=""></button></a>
                            </td>
                            <td class="px-3 py-4 justify-center flex items-center">
                               <button data-id="<?php echo $row['id'] ?>"data-modal-target="popup-modal"  data-modal-toggle="popup-modal" class="block text-white font-medium rounded-lg text-sm text-center " type="button"><img src="../media/delete.png" class="w-6 h-6" alt=""></button>
                            </td>
                        </tr>              
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="event-button flex">
            <button data-modal-target="event-modal" data-modal-toggle="event-modal" class="block mt-10 mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 portrait:px-2.5 py-2.5 text-center" type="button">
                New Event <img class="inline w-7 h-7" src="../media/add.png" alt="">
            </button>

            <button data-modal-target="history-modal" data-modal-toggle="history-modal" class="block ml-5 portrait:ml-3 mt-10 mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 portrait:px-2.5 py-2.5 text-center" type="button">
                Event History
            </button>
        </div>

        <div class="relative overflow-y-auto shadow-md sm:rounded-lg max-h-[240px] custom-scrollbar">
            <table class="w-full bg-white text-sm text-left text-gray-500">
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-300 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-start">Event</th>
                        <th scope="col" class="px-5 py-3">Date</th>
                        <th scope="col" class="px-5 py-3">Time</th>
                        <th scope="col" class="px-5 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $team = $_GET['id'];
                        $sql = mysqli_query($con, "SELECT * FROM event WHERE teamID ='$team' AND status='0'");
                        while ($entah = mysqli_fetch_array($sql)) {
                    ?>
                        <tr class="bg-white border-b border-gray-200 text-center">
                            <th scope="row" class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap text-start"><?php echo $entah['name'] ?></th>
                            <td class="px-5 py-4"><?php echo $entah['date'] ?></td>
                            <td class="px-5 py-4"><?php echo $entah['time'] ?></td>
                            <td class="px-3 py-4">
                                <a href="../backend/eventDone.php?id=<?php echo $entah['id']?>"><button class="bg-blue-500 px-5 py-2 hover:bg-green-500 portrait:text-sm rounded-lg">Done</button></a>
                            </td>
                        </tr>              
                    <?php } ?>
                </tbody>
            </table>
        </div>

    

    <!-- Team Edit modal -->
    
    <div id="authentication-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3/4 max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm pb-2 ">
                <!-- Modal header -->
                <div class="header relative p-4 md:p-5 border-b rounded-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Team
                        </h3>
                        <br>
                        <button type="button" class=" close end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only ">Close modal</span>
                        </button>
                    </div>
                    <p id="error" class="text-xs font-semibold landscape:absolute landscape:bottom-1 text-red-500"> hello</p>
                </div>
                <!-- Modal body -->
                <form action="../backend/teamEditBE.php?id=<?php echo $_GET['id']?>" method="post">
                    <div class="flex w-full portrait:block">
                        <div class="main-player w-1/2 p-3 border-r border-gray-200 portrait:w-full portrait:border-none portrait:mb-4">

                            <div class="header border-b border-gray-200 pb-2 mb-3 ">
                                <p class="text-lg font-bold text-gray-900 mb-1">Main Player</p>
                                <p class="text-sm text-gray-900 portrait:text-xs">Check to send player to substitute list</p>
                            </div>
                            
                            <div class="checkbox mt-2">
                                <?php

                                    $team = $_GET['id'];
                                    $sql = mysqli_query($con, "SELECT * FROM players WHERE teamId = $team AND status = 'main'");
                                    $cardCount = 0; // Initialize a counter
                                    $id = 1;
                                    
                                    while ($row = mysqli_fetch_array($sql)) {
                                        
                                    ?>
                                        <div class="flex items-center mb-2">
                                            <input id="default-checkbox" type="checkbox" name="swap_players[]" value="<?php echo $row['id'] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $row['name']."<b> ".$row['number']." </b> (". $row['position'].")" ?></label>
                                        </div>

                                    <?php
                                        
                                    }
                                            
                                ?>
                            </div>

                        </div>

                        <div class="bench-player w-1/2 p-3 border-r border-gray-200 portrait:w-full portrait:border-none">
                            
                            <div class="header border-b border-gray-200 pb-2 mb-3 ">
                                <p class="text-lg font-bold text-gray-900 mb-1">Substitute Player</p>
                                <p class="text-sm text-gray-900 portrait:text-xs">Check to send player to main list</p>
                            </div>
                            
                            <div class="checkbox mt-2">
                                <?php
                                    $team = $_GET['id'];
                                    $sql = mysqli_query($con, "SELECT * FROM players WHERE teamId = $team AND status = 'substitute'");
                                    $cardCount = 0; // Initialize a counter
                                    $id = 1;

                                    while ($row = mysqli_fetch_array($sql)) {
                                        
                                    ?>
                                        <div class="flex items-center mb-2">
                                            <input id="default-checkbox" name="swap_players[]" type="checkbox" value="<?php echo $row['id'] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo $row['name']."<b> ".$row['number']." </b> (". $row['position'].")" ?></label>
                                        </div>

                                    <?php
                                        
                                    }
                                            
                                ?>
                            </div>
                        </div>    
                    </div>
                    <button class="swap bg-blue-900 text-white block p-2 rounded-lg m-2 w-35">Swap</button>
                </form>
            </div>
        </div>
    </div>


    <!-- new player modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-3/4 portrait:w-full max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg py-5 shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        New Player
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <section>
                    <div class="py- px- mx-auto w-3/4 lg:py-13">
                        <form action="../backend/newPlayer.php?id=<?php echo $_GET['id']?>" method="post">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Player Name</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type player name" required="">
                                </div>
                                <div class="w-full">
                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Player Number</label>
                                    <input type="number" name="number" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type player number" required="">
                                </div>
                                <div class="w-full">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                                    <input type="number" name="age" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="18" required="">
                                </div>
                                <div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Position</label>
                                    <select id="category" name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <?php
                                            $id = $_GET['id'];
                                            $sql = mysqli_query($con, "SELECT * FROM players WHERE teamId='$id'");
                                            $row = mysqli_fetch_array($sql);
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
                            </div>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                                Add Player
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <!-- new event modal -->
    <div id="event-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-3/4  max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm py-5">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        New Player
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="event-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <section>
                    <div class="py- px- mx-auto w-3/4 lg:py-13">
                        <form action="../backend/newEvent.php?id=<?php echo $_GET['id']?>" method="post">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Event</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type player name" required="">
                                </div>
                                <div class="w-full">
                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                                    <input type="date" name="date" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type player number" required="">
                                </div>
                                <div class="w-full">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Time</label>
                                    <input type="time" name="time" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="18" required="">
                                </div>
                            </div>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                                Add Event
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <!-- event history modal -->
    <div id="history-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative  w-3/4 portrait:w-[95%] max-h-full">
            <!-- Modal content -->
            <div class="relative bg-gray-100 rounded-lg p-3 shadow-sm py-8">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-3 md:p-3 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Event History
                   </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="history-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <section class="p-7">
                    <div class=" px- mx-auto w-full lg:py-13">
                        <div class="relative overflow-y-auto shadow-md sm:rounded-lg  custom-scrollbar">
                            <table class="w-full bg-white text-sm text-left text-gray-500">
                                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-300 sticky top-0 z-10">
                                    <tr>
                                        <th scope="col" class="px-5 py-3 text-start">Event</th>
                                        <th scope="col" class="px-5 py-3">Date</th>
                                        <th scope="col" class="px-5 py-3">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $team = $_GET['id'];
                                        $sql = mysqli_query($con, "SELECT * FROM event WHERE teamID ='$team' AND status='1'");
                                        while ($entah = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr class="bg-white border-b border-gray-200 text-center">
                                            <th scope="row" class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap text-start"><?php echo $entah['name'] ?></th>
                                            <td class="px-5 py-4"><?php echo $entah['date'] ?></td>
                                            <td class="px-5 py-4"><?php echo $entah['time'] ?></td>
                                        </tr>              
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    
    <!-- delete waring -->
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this Player?</h3>
                    <p class="text-sm font-normal text-gray-500 mb-3">If your player is a main player, a random substitute will become the main player (you can edit it later)</p>
                    <button id="confirm-delete" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            let mainCheckboxes = document.querySelectorAll(".main-player input[type='checkbox']");
            let benchCheckboxes = document.querySelectorAll(".bench-player input[type='checkbox']");
            let swapButton = document.querySelector(".swap");
            let errorMessage = document.getElementById("error");
            let closeButton = document.querySelector(".close"); // Assuming the close button has class "close"

            function updateSwapButton() {
                let mainChecked = document.querySelectorAll(".main-player input[type='checkbox']:checked").length;
                let benchChecked = document.querySelectorAll(".bench-player input[type='checkbox']:checked").length;

                if (mainChecked === benchChecked && mainChecked > 0) {
                    swapButton.disabled = false;
                    swapButton.style.backgroundColor = "blue"; // Change to original color if needed
                    swapButton.style.color = "white";
                    errorMessage.textContent = "";
                } else {
                    swapButton.disabled = true;
                    swapButton.style.backgroundColor = "gray";
                    swapButton.style.color = "black";
                    errorMessage.textContent = (mainChecked !== benchChecked) ? "You must select an equal number of main and substitute players!" : "";
                }
            }

            document.querySelectorAll(".main-player input[type='checkbox'], .bench-player input[type='checkbox']").forEach(checkbox => {
                checkbox.addEventListener("change", updateSwapButton);
            });

            if (closeButton) {
                closeButton.addEventListener("click", function () {
                    mainCheckboxes.forEach(checkbox => checkbox.checked = false);
                    benchCheckboxes.forEach(checkbox => checkbox.checked = false);
                    updateSwapButton(); // Update button and error message
                });
            }

            updateSwapButton(); // Initial check
        });


        document.querySelectorAll('[data-modal-toggle="popup-modal"]').forEach(button => {
            button.addEventListener('click', function() {
                let userId = this.getAttribute('data-id'); // Get user ID
                document.getElementById('confirm-delete').setAttribute('data-id', userId); // Store in modal
            });
        });

        document.getElementById('confirm-delete').addEventListener('click', function() {
            let userId = this.getAttribute('data-id'); // Retrieve stored ID
            window.location.href = '../backend/playerDelete.php?id=' + userId; // Redirect with ID
             
        });
</script>



    </script>
</body>
</html>