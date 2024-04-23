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
$delete_success = false; // Variable to track if question was successfully deleted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete question if delete request is received
    if (isset($_POST['delete_question_id'])) {
        $question_id = $_POST['delete_question_id'];
        $sql = "DELETE FROM question WHERE id = $question_id";
        if (mysqli_query($conn, $sql)) {
            $delete_success = true; // Question successfully deleted
        } else {
            echo "Error deleting question: " . mysqli_error($conn);
        }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Question</title>
    <style>
        /* Styles unchanged */
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
    width: calc(100% - 22px); /* Adjusted width to accommodate padding */
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
    width: calc(100% - 22px); /* Adjusted width to accommodate padding */
}

/* Submit button hover effect */
input[type="submit"]:hover {
    background-color: #45a049;
}

/* Delete button styles */
input[type="submit"][value="Delete"] {
    background-color: #ff3333;
}

/* Delete button hover effect */
input[type="submit"][value="Delete"]:hover {
    background-color: #cc0000;
}

/* Question container styles */
div {
    background-color: #ffffff;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

    </style>
</head>
<body>
<h2>Delete Question</h2>
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

<?php if($delete_success): ?>
    <script>
        alert("Question successfully deleted!");
    </script>
<?php endif; ?>

<?php
// Retrieve questions from the database and display them with delete buttons
$sql = "SELECT * FROM question";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<p>" . $row['question_text'] . "</p>";
        echo "<input type='hidden' name='delete_question_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "</div>";
    }
}
?>

</body>
</html>
