<?php
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "user_db"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$success = false; // Variable to track if question was successfully added

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Calculate user's score
    $score = 0;
    $correct_option = mysqli_real_escape_string($conn, $_POST['correct_option']);
    $selected_option = mysqli_real_escape_string($conn, $_POST['selected_option']);
    if ($correct_option == $selected_option) {
        $score = 1; // Increment score if the selected option is correct
    }

    // Insert or update user score in quiz_scores table
    $user_id = ""; // Replace this with the actual user ID or identifier
    $sql = "INSERT INTO quiz_scores (user_id, score) VALUES ('$user_id', '$score') ON DUPLICATE KEY UPDATE score = score + VALUES(score)";
    if (mysqli_query($conn, $sql)) {
        $success = true; // Score successfully recorded
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <!-- Add your CSS styles here -->
    <style>
table {
    border-collapse: collapse;
    width: 50%;
    margin: 20px auto;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Heading styles */
h2 {
    text-align: center;
}
</style>

</head>
<body>
    <!-- Your quiz HTML form goes here -->
    <h2>Quiz Leaderboard</h2>
    <table>
        <tr>
            <th>Rank</th>
            <th>User ID</th>
            <th>Score</th>
        </tr>
</table>
</body>
</html>
