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

// Initialize variables
$score = 0;
$totalQuestions = 0;
$correctAnswers = [];

// Retrieve submitted answers
$submittedAnswers = $_POST['answers'];

// Fetch correct answers from the database
$sql = "SELECT id, answer, question_text FROM question";
$result = mysqli_query($conn, $sql);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Grade the quiz
foreach ($questions as $question) {
    $questionId = $question['id'];
    $correctAnswer = $question['answer'];
    echo($questionId);
    echo($submittedAnswers[$questionId]);
    echo($correctAnswer);

   // if (isset($submittedAnswers[$questionId]) && $submittedAnswers[$questionId] == $correctAnswer)
   if($submittedAnswers[$questionId]===$correctAnswer) {
        $score++;
        echo($score);
        $correctAnswers[$questionId] = true;
    } else {
        $correctAnswers[$questionId] = false;
    }

    $totalQuestions++;
}

// Calculate the percentage score
$percentageScore = ($score / $totalQuestions) * 100;

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Results</title>
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Results container styles */
        .results-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 20px auto;
        }

        /* Result item styles */
        .result-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="results-container">
    <h2>Quiz Results</h2>
    <div class="result-item">
        <p>Total Questions: <?php echo $totalQuestions; ?></p>
    </div>
    <div class="result-item">
        <p>Correct Answers: <?php echo $score; ?></p>
    </div>
    <div class="result-item">
        <p>Percentage Score: <?php echo $percentageScore; ?>%</p>
    </div>
    <div class="result-item">
        <h3>Correct Answers:</h3>
        <ul>
            <?php foreach ($questions as $question): ?>
                <li>
                    <?php echo $question['question_text']; ?>
                    <br>
                    <?php echo $question['answer']; ?>
                    <?php if ($correctAnswers[$question['id']]): ?>
                        <strong> - Correct Answer: <?php echo $question['answer']; ?></strong>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>
