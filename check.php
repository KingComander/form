<?php

session_start();

$email = $username = $password = $storedUsername = $storedPassword = "";
$errors = [];

$email = filter_var($_POST["username"], FILTER_SANITIZE_EMAIL);

$verifed = filter_var($email, FILTER_VALIDATE_EMAIL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($GLOBALS['email'] === $GLOBALS['verifed']){
        // User input
        $email = filter_var($_POST["username"], FILTER_SANITIZE_EMAIL);
        $password = ($_POST["password"]);
    
        // Stored values (from localStorage via hidden fields)
        $storedEmail = filter_var($_POST["stored_Email"], FILTER_SANITIZE_EMAIL);
        $storedPassword = trim($_POST["stored_Password"]);
    
        // Validate
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    
        if (empty($password)) {
            $errors[] = "Password is required.";
        }
    
        // Compare input with stored
        if (empty($errors)) {
            if ($email === $storedEmail && $password === $storedPassword) {
                $message = "✅ Login successful! Welcome, $email.";
            } elseif ($username === $storedUsername && $password !== $storedPassword) {
                $errors[] = "❌ Incorrect password.";
            } else {
                $errors[] = "❌ Incorrect email or password.";
            }
        }
        $storedUsername = trim($_POST["stored_Username"]);
        $_SESSION['user']= $storedUsername;
    }
    else{
    
        // User input
        $username = ($_POST["username"]);
        $password = ($_POST["password"]);
    
        // Stored values (from localStorage via hidden fields)
        $storedUsername = trim($_POST["stored_Username"]);
        $storedPassword = trim($_POST["stored_Password"]);
    
        if (empty($password)) {
            $errors[] = "Password is required.";
        }
    
        // Compare input with stored
        if (empty($errors)) {
            if ($username === $storedUsername && $password === $storedPassword) {
                $message = "✅ Login successful! Welcome, $username.";
            } elseif ($username === $storedUsername && $password !== $storedPassword) {
                $errors[] = "❌ Incorrect password.";
            } else {
                $errors[] = "❌ Incorrect username or password.";
            }
        }
    
        $_SESSION['user'] = $username;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Result</title>
</head>
<body>
    <h2>Login Result</h2>

    <?php
    if (!empty($errors)) {
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } elseif (!empty($message)) {
        echo "<p style='color: green;'>$message</p>";
        header("location:use_session.php");
    }
    ?>
</body>
</html>
