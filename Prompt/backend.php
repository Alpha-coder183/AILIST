<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiList";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "<script>localStorage.setItem('input', 2); window.location.href = 'input.php';</script>";
    exit();
}

// Get data from POST request
$name = $_POST['name'];
$link = $_POST['link'];
$tags = $_POST['tags'];
$rating = $_POST['rating'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$usage = $_POST['usage'];

$result = $conn->prepare("SELECT COUNT(*) FROM allAi WHERE name = ?");
$result->bind_param("s", $name);
$result->execute();
$result->bind_result($count);
$result->fetch();
$result->close();

if ($count > 0) {
    echo "<script>localStorage.setItem('input', 3); window.location.href = 'input.php';</script>";
}
// Prepare SQL query
$sql = "INSERT INTO allAi (name, link, tags, rating, email, username, password, `usage`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $name, $link, $tags, $rating, $email, $username, $password, $usage);

// Execute query
if ($stmt->execute()) {
    echo "<script>localStorage.setItem('input', 1); window.location.href = 'input.php';</script>";
} else {
    echo "<script>localStorage.setItem('input', 2); window.location.href = 'input.php';</script>";
}

// Close connection
$stmt->close();
$conn->close();
?>
