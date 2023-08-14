<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin menu' && $password == '456789') {
        // Set a session for the username
        $_SESSION['username'] = $username;

        // Redirect to the index page
        header('Location: ../admin/index.php');
    } else {
        // The username and password are incorrect
        echo 'The username and password are incorrect.';
        echo 'Click Back';
    }
}
