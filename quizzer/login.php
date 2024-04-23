<?php

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define variables to store user input for login
$logEmail = $logPassword = "";

// Define variables to store error messages for login
$logPasswordErr = "";

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $logEmail = test_input($_POST["logEmail"]);
    $logPassword = test_input($_POST["logPassword"]);

    // Retrieve hashed password from the database based on the entered Email
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $logEmail);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the entered password against the hashed password
        if (password_verify($logPassword, $hashedPassword)) {
            // Password is correct, redirect to the home page or perform other actions
            session_start();
            $_SESSION["username"] = $logEmail; // Assuming you want to store email as username
            header("Location: user.php");
            exit();
        } else {
            // Password is incorrect
            $logPasswordErr = "Incorrect password";
        }
    } else {
        // No user found with the entered email
        $logPasswordErr = "Wrong email or password";
    }
    $stmt->close();
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url("shadow.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 100%;
            padding: 20px;
            border-radius: 2px;
        }

        form {
            backdrop-filter: blur(100px);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 22vw;
            margin: auto;
        }

        .input-group {
            margin-bottom: 15px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 2px;
            border: 1px solid #ccc;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .button {
            text-align: center;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>User Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Login form fields go here -->
        <div class="input-group">
            <label for="logEmail">Email:</label>
            <input type="text" name="logEmail" id="logEmail" value="<?php echo $logEmail; ?>">
        </div>
        <span class="error"><?php echo $logPasswordErr; ?></span>
        <br>

        <div class="input-group">
            <label for="logPassword">Password:</label>
            <input type="password" name="logPassword" id="logPassword">
        </div>
        <span class="error"><?php echo $logPasswordErr; ?></span>
        <br>

        <div class="button">
            <input class="btn" type="submit" name="login" value="Login">
        </div>

        <p>Don't have an account? <a class="toggle-button" href="registration.php">Click here</a> to signup.</p>

    </form>
</div>
</body>
</html>
