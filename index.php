<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andromeda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="website logo.png" alt="Logo">
            <h1 class="website-name">Andromeda</h1>
        </div>
        <div class="header-center">
            <input type="text" placeholder="Search" class="search-bar">
        </div>
        <div class="header-right">
            <div class="userbutton" onclick=<?php 
                if (!isset($_SESSION['username'])) {
                    echo "loginPage()";
                }
                else {
                    echo "userPage()";
                }
            ?>>
                <img class="usericon" src="default_pfp.png">
                <h class="username">
                    <?php 
                    if (!isset($_SESSION['username'])) {
                        echo "Sign In";
                    }
                    else {
                        echo $_SESSION['username'];
                    }
                    ?>
                </h>
            </div>
        </div>
    </header>
    <script>
        function loginPage() {
            window.location.href = "login.php"
        }

        function userPage() {
            window.location.href = "userPage.php"
        }
    </script>
</body>
</html>