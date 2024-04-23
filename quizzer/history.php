<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <!-- Styles are kept as it is -->
</head>
<body>
    <header>
        <div class="container">
            <p>Test Your Knowledge</p>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Add a Question</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Form inputs are kept as it is -->
            </form>
            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // PHP code for database connection and insertion
                // Database connection parameters
                $servername = "localhost"; // Change this to your database server name
                $username = "username"; // Change this to your database username
                $password = "password"; // Change this to your database password
                $dbname = "quiz"; // Change this to your database name

                // Create connection
                $conn = mysqli_connect('localhost', 'root', '', 'user_db');

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Prepare and bind the INSERT statement
                $stmt = $conn->prepare("INSERT INTO Options (QuestionID, OptionText, IsCorrect) VALUES (?, ?, ?)");
                $stmt->bind_param( $questionID, $optionText, $isCorrect);

                // Set parameters and execute the statement
                $questionID = $_POST["question_number"];
                $optionTexts = array($_POST["choice_1"], $_POST["choice_2"], $_POST["choice_3"], $_POST["choice_4"]);
                $correctOption = $_POST["correct_choice"];

                $success = true; // Variable to track if all insertions were successful

                foreach ($optionTexts as $key => $optionText) {
                    // Determine if the option is correct based on the correct_choice value
                    $isCorrect = ($key + 1 == $correctOption) ? 1 : 0;

                    // Insert the option into the database
                    if (!$stmt->execute()) {
                        $success = false;
                        break; // If insertion fails, exit loop
                    }
                }

                // Close the statement and database connection
                $stmt->close();
                $conn->close();

                // Display success or error message
                if ($success) {
                    echo "<p>Question added successfully!</p>";
                } else {
                    echo "<p>Error: Failed to add question. Please try again later.</p>";
                }
            }
            ?>
        </div>
    </main>
</body>
</html>
