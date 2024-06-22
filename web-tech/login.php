<?php
session_start();

// Define static username and password
define('USERNAME', 'admin');
define('PASSWORD', 'password123');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match the static credentials
    if ($username === USERNAME && $password === PASSWORD) {
        // Set the session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the welcome page
        header('Location: ./index.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/app.css">
</head>
<body>
<div class="container-fluid"  style=" display: flex;justify-content: center;
            align-items: center">
    <div class="login-container">
        <h2>Login Page</h2>
        <?php if (isset($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form class="login-form" method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
