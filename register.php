<?php
session_start();
include 'connect.php';
$account_created = FALSE;

if (isset($_POST['create_account'])) {
    $validFields = TRUE;

    if (strlen($_POST['username']) == 0 || strlen($_POST['password']) == 0) {
        $validFields = FALSE;
    }

    for ($i = 0; $i < strlen($_POST['username']); $i++) {
        if (!ctype_digit($_POST['username'][$i]) && $_POST['username'][$i] != ' ' && !ctype_alpha($_POST['username'][$i])) {
            $_SESSION['error_message'] = "Invalid username. Only a-z, A-Z, 0-9, and spaces are allowed.";
            header('Location: login.php');
            $validFields = FALSE;
        }
    }

    for ($i = 0; $i < strlen($_POST['password']); $i++) {
        if (!ctype_digit($_POST['password'][$i]) && !ctype_alpha($_POST['password'][$i])) {
            $_SESSION['error_message'] = "Invalid password. Only a-z, A-Z, and 0-9 are allowed.";
            header('Location: login.php');
            $validFields = FALSE;
        }
    }

    if ($validFields) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $checkUser = "SELECT * From users where username='$username'";
        $result = $connect->query($checkUser);

        if ($result->num_rows > 0) {                 
            $_SESSION['error_message'] = "Username already exists!";
            header('Location: login.php');
        }

        else {
            $insertQuery = "INSERT INTO users(username, password) VALUES ('$username', '$password')";

            if ($connect->query($insertQuery) == TRUE) {
                $account_created = TRUE;
            }
            else {
                echo "Error: ".$connect->error;
            }
        }
    }
}

if (isset($_POST['log_in']) or $account_created) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
        exit();
    }
    else {
        $_SESSION['error_message'] = "Bad username or password.";
        header('Location: login.php');
    }
}

?>