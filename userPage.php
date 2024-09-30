<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>
        Welcome, <?php echo $_SESSION['username'];?>
    </h1>
    <form method="POST", action="logout.php">
        <button type="submit" class="Log Out">Log Out</button>
    </form>
    <p>
</body>
</html>