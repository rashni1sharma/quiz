<?php
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "user_db"; // Change this to your database name

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$success = false; // Variable to track if question was successfully added

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $question_text = mysqli_real_escape_string($conn, $_POST['question_text']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
    $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
    $correct_option = mysqli_real_escape_string($conn, $_POST['correct_option']);
    if ($correct_option == 1)
        $answer = $option1;
    elseif ($correct_option == 2)
        $answer = $option2;
    elseif ($correct_option == 3)
        $answer = $option3;
    else
        $answer = $option4;

    // Insert question into questions table
    $sql = "INSERT INTO question ( question_text, option_a,option_b,option_c,option_d,answer ) VALUES ('$question_text' , '$option1','$option2','$option3','$option4','$answer')";
    if (mysqli_query($conn, $sql)) {
        $success = true; // Question successfully added
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Form container styles */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 20px auto;
        }

        /* Heading styles */
        h2 {
            text-align: center;
        }

        /* Label styles */
        label {
            font-weight: bold;
        }

        /* Textarea styles */
        textarea, input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Submit button styles */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        /* Submit button hover effect */
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Add Question</h2>
<form action="add.php" method="POST">
    <label for="question_text">Question:</label><br>
    <textarea id="question_text" name="question_text" rows="4" cols="50" required></textarea><br>
    <label for="correct_option">Correct Option:</label><br>
    <input type="number" id="correct_option" name="correct_option" min="1" max="4" required><br>
    <label for="option1">Option 1:</label><br>
    <input type="text" id="option1" name="option1" required><br>
    <label for="option2">Option 2:</label><br>
    <input type="text" id="option2" name="option2" required><br>
    <label for="option3">Option 3:</label><br>
    <input type="text" id="option3" name="option3" required><br>
    <label for="option4">Option 4:</label><br>
    <input type="text" id="option4" name="option4" required><br>
    <input type="submit" value="Submit">
</form>

<script>
    // PHP variable to check if question was successfully added
    <?php if($success): ?>
        alert("Question successfully added!"); // Show popup alert if question was successfully added
    <?php endif; ?>
</script>
</body>
</html>
