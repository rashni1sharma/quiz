<?php
// Database connection
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "quiz_database"; // Change this to your database name


// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'user_db');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Define the quiz questions
$quizData = [
    [
        'question' => 'What is the full form of SQL?',
        'options' => ['Structure Query Language', 'Simple Query Language', 'Structured Question Language', 'Structured Query Level'],
        'answer' => 'Structure Query Language'
    ],
    [
        'question' => 'What is the capital of France?',
        'options' => ['Paris', 'London', 'Berlin', 'Rome'],
        'answer' => 'Paris'
    ],
    [
        'question' => 'What is the largest mammal?',
        'options' => ['Elephant', 'Blue Whale', 'Giraffe', 'Hippopotamus'],
        'answer' => 'Blue Whale'
    ],
    [
        'question' => 'What is the chemical symbol for water?',
        'options' => ['O', 'W', 'H2O', 'H'],
        'answer' => 'H2O'
    ],
    [
        'question' => 'Who is the founder of Linux?',
        'options' => ['Linus Torvalds', 'Steve Jobs', 'Roshani Sharma', 'Linus Jobs'],
        'answer' => 'Linus Torvalds'
    ]
    [
        'question' => 'Who is the founder of facebook?',
            'options' => ['Linus Torvalds', 'Steve Jobs', 'Roshani Sharma', 'Mark zuckerberg'],
            'answer' => 'Mark zuckerber'
    ]
];

// Function to insert quiz questions into the database
function insertQuizQuestions($conn, $quizData) {
    foreach ($quizData as $question) {
        $questionText = $conn->real_escape_string($question['question']);
        $options = implode(',', array_map(array($conn, 'real_escape_string'), $question['options']));
        $answer = $conn->real_escape_string($question['answer']);
        $sql = "INSERT INTO questions (question, options, answer) VALUES ('$questionText', '$options', '$answer')";
        if (!$conn->query($sql)) {
            echo "Error inserting question: " . $conn->error;
        }
    }
}

// Call the function to insert quiz questions
insertQuizQuestions($conn, $quizData);

// Close connection
$conn->close();
?>
