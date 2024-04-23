<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color:gray;
}

.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: black;
    padding-top: 20px;
}

.sidebar h2 {
    color: #fff;
    text-align: center;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    padding: 10px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.sidebar ul li a:hover {
    background-color: #555;
}

.content {
    margin-left: 250px;
    padding: 20px;
}
</style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
        <li><a href="add.php">Add question</a></li> 
        <li><a href="Delete.php">Delete a question</a></li>
        <li><a href="update.php">Update a question</a></li>
        <li><a href="leaderboard.php">leaderboard</a></li>
        <li><a href="logout.php">Logout</a></li>


        </ul>
    </div>
    <div class="content">
        <h1>Welcome, teacher!!</h1>
            <p> This is the teacher section where teacher can add , update and delete the quetion, and also manage the student result</p>
        <!-- Dashboard content goes here -->
    </div>
</body>
</html>
