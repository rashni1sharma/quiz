<?php
session_start();

// Check if admin is already logged in, redirect to dashboard if true
if(isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check username and password (dummy values for demonstration)
    $username = "admin";
    $password = "admin123";

    if($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["username"] = $username;
        header("Location: dashbord.php");
        exit;
    } else {
        $loginError = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <br><br>
            <input type="password" name="password" placeholder="Password" required>
            <br><br>
            <button type="submit">Login</button>
            <?php if(isset($loginError)) { echo "<p class='error'>$loginError</p>"; } ?>
        </form>
    </div>
</body>
</html>
