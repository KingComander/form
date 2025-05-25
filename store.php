<?php
$email = $password = $username = "";
$errors = [];
$store = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Sanitize inputs
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $username = $_POST["username"];

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    
    
   if (empty($errors)) {
        $safeEmail = htmlspecialchars($email, ENT_QUOTES);
        $safePassword = htmlspecialchars($password, ENT_QUOTES);
        $safeUsername = htmlspecialchars($username, ENT_QUOTES);

        $store = "<script>
            localStorage.setItem('email', '$safeEmail');
            localStorage.setItem('password', '$safePassword');
            localStorage.setItem('username', '$safeUsername');
            alert('Data saved to localStorage.');
        </script>";
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "GET"){
    // Sanitize inputs
    $email = filter_var($_GET["email"], FILTER_SANITIZE_EMAIL);
    $password = $_GET["password"];
    $username = $_GET["username"];

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    
    
   if (empty($errors)) {
        $safeEmail = htmlspecialchars($email, ENT_QUOTES);
        $safePassword = htmlspecialchars($password, ENT_QUOTES);
        $safeUsername = htmlspecialchars($username, ENT_QUOTES);

        $store = "<script>
            let users = JSON.parse(localStorage.getItem('users')) || [];
            users.push({
                email: '$safeEmail',
                password: '$safePassword',
                username: '$safeUsername'
            });
            localStorage.setItem('users', JSON.stringify(users));
            alert('User added to localStorage.');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Result</title>
</head>
<body>
    <h2>Form Submission Result</h2>

    <?php
    if (!empty($errors)) {
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color: green;'>Form submitted successfully.</p>";
    }

    // Output JavaScript for localStorage if no errors
    echo $store;
    ?>
</body>
</html>