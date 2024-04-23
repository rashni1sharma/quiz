<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color:gray;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        text-align: center;
        color:black;
        font-size:35px;
    }
    h1 {
        margin-bottom: 20px;
    }
    button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color:red;
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color:black;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Welcome Student!</h1>
    <p> This is a student area where you can take quizzes, and the result will be sent to the teacher
area after you have submitted.</p>
    <button onclick="startQuiz()">Start Quiz</button>
</div>

<script>
    function startQuiz() {
        // Redirect to the quiz page
        window.location.href = "gain.php";
    }
</script>

</body>
</html>
