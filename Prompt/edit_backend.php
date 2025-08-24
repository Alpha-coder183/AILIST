<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiList";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "<script>localStorage.setItem('input', 2); window.location.href = 'input.php';</script>";
    exit();
}

$name = $_POST['name'];
$link = $_POST['link'];
$tags = $_POST['tags'];
$rating = $_POST['rating'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$usage = $_POST['usage'];

$sql = "UPDATE allAi SET link = ?, tags = ?, rating = ?, email = ?, username = ?, password = ?, `usage` = ? WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $link, $tags, $rating, $email, $username, $password, $usage, $name);

if ($stmt->execute()) {
    echo "<script>localStorage.setItem('input', 1); window.location.href = 'input.php';</script>";
} else {
    echo "<script>localStorage.setItem('input', 2); window.location.href = 'input.php';</script>";
}

$stmt->close();
$conn->close();
?>
