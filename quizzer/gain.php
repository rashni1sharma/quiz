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

// Fetch questions from database
$sql = "SELECT * FROM question";
$result = mysqli_query($conn, $sql);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Multiple Choice Question</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color:gray;
    margin: 0;
    padding: 0;
}

.quiz-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color:white;
    border: 1px solid white;
    border-radius: 5px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color:black;
}

.question {
    margin-bottom: 20px;
}

.options {
    margin-top: 10px;
}

input[type="radio"] {
    margin-right: 10px;
}

label {
    cursor: pointer;
}

input[type="submit"] {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    background-color:red;
    color: white;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color:black;
}
</style>
</head>

<body>
<div class="quiz-container">
    <h1>Multiple Choice Question</h1>
    <form action="grade.php" method="POST">
        <?php foreach ($questions as $question): ?>
            <div class="question">
                <p><?php echo $question['question_text']; ?></p>
                <div class="options">
                    <input type="radio" id="option1" name="answers[<?php echo $question['id']; ?>]" value="<?php echo $question['option_a']; ?> ">
                    <label for="option1"><?php echo $question['option_a']; ?></label><br>
                    <input type="radio" id="option2" name="answers[<?php echo $question['id']; ?>]" value="<?php echo $question['option_b']; ?>">
                    <label for="option2"><?php echo $question['option_b']; ?></label><br>
                    <input type="radio" id="option3" name="answers[<?php echo $question['id']; ?>]" value="<?php echo $question['option_c']; ?>">
                    <label for="option3"><?php echo $question['option_c']; ?></label><br>
                    <input type="radio" id="option4" name="answers[<?php echo $question['id']; ?>]" value="<?php echo $question['option_d']; ?>">
                    <label for="option4"><?php echo $question['option_d']; ?></label><br>
                </div>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
