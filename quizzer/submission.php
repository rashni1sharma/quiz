<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the submitted quiz responses
    $responses = $_POST['submission'];

    // Connect to the database
    $servername = "localhost"; // Change this to your database server hostname
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "user_db"; 
    // Create connection
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    // Insert responses into the database
    foreach ($responses as $questionId => $selectedOption) {
        $sql = "INSERT INTO qno (question_id, selected_option) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $questionId, $selectedOption);
        $stmt->execute();
    }

    // Close connection
    $conn->close();

    // Redirect or display success message
    Header('Location: answer.php'); // Redirect to quiz result page
    echo "Quiz submitted successfully!";
} else {
    echo "Invalid request method!";
}
?>
