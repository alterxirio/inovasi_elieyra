<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
     <center>
        <div class="main">

            <div class="left">

                <div class="left-top">

                    <h3>Hello!</h3>
                    <p>Create New Account</p>

                </div>
                <div class="left-bottom">

                    <form action="./backend/registerBE.php" method="post" >

                    <label for="">Name</label>
                        <br>
                        <input type="text" name="name" placeholder="" >

                        <br>

                        <label for="">Username</label>
                        <br>
                        <input type="text" name="username" placeholder="" >

                        <br>

                        <label for="">Password</label>
                        <br>
                        <input type="password" name="password" placeholder="" >

                        <br>

                        <center>
                            <button type="submit">Submit</button>
                        </center>
            
                    </form>

                </div>
            </div>

            <div class="right">
                
            </div>
        </div>
    </center>

</body>
</html>