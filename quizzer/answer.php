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

// Function to insert a new quiz response into the database
function insertQuizResponse($conn, $questionId, $selectedOption, $isCorrect) {
    $sql = "INSERT INTO responses (question_id, selected_option, is_correct) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $questionId, $selectedOption, $isCorrect);
    $stmt->execute();
    $stmt->close();
}

// Process the quiz data and insert responses into the database
foreach ($_POST['responses'] as $qn_Id => $selectedOption) {
    // Check if the selected option is correct
    $sql = "SELECT correct_answer FROM qno  WHERE qn_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $qn_Id);
    $stmt->execute();
    $stmt->bind_result($correctAnswer);
    $stmt->fetch();
    $stmt->close();

    $isCorrect = ($selectedOption == $correctAnswer) ? 1 : 0;

    // Insert the response into the database
    insertQuizResponse($conn, $qnId, $selectedOption, $isCorrect);
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Result</title>
</head>
<body>
  <h1>Quiz Result</h1>
  <?php
  // Display the result of the quiz
  $totalQuestions = count($_POST['responses']);
  $correctAnswers = 0;
  foreach ($_POST['responses'] as $qnId => $selectedOption) {
      // Check if the selected option is correct
      $sql = "SELECT correct_answer FROM qno WHERE question_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $questionId);
      $stmt->execute();
      $stmt->bind_result($correctAnswer);
      $stmt->fetch();
      $stmt->close();

      // Compare the selected option with the correct answer
      if ($selectedOption == $correctAnswer) {
          $correctAnswers++;
      }
  }

  $score = ($correctAnswers / $totalQuestions) * 100;
  ?>
  <p>Total Questions: <?php echo $totalQuestions; ?></p>
  <p>Correct Answers: <?php echo $correctAnswers; ?></p>
  <p>Score: <?php echo $score; ?>%</p>
</body>
</html>
