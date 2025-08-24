<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiList";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$aiName = isset($_GET['name']) ? $_GET['name'] : '';
if (!$aiName) {
    echo "<script>window.location.href = 'showall.php';</script>";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM allAi WHERE name = ?");
$stmt->bind_param("s", $aiName);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>window.location.href = 'showall.php';</script>";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #DBFAFE; margin: 0; padding: 0; }
        .header { background-color: #4169E1; padding: 20px; text-align: right; }
        .header button { background-color: #1E3A8A; color: white; border: none; padding: 10px 20px; margin: 10px; cursor: pointer; font-size: 18px; }
        .container { width: 60%; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        .detail-box { padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; }
        .edit-button { display: block; width: 100%; background-color: #3B82F6; color: white; border: none; padding: 10px; cursor: pointer; font-size: 16px; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='input.php'">Input</button>
        <button onclick="window.location.href='showall.php'">Show All</button>
    </div>
    <br><br>
    <div class="container">
        <h2>AI Details</h2>
        <div class='detail-box'><strong>Name:</strong> <?php echo htmlspecialchars($data['name']); ?></div>
        <div class='detail-box'><strong>Link:</strong> <a href='<?php echo htmlspecialchars($data['link']); ?>' target='_blank'><?php echo htmlspecialchars($data['link']); ?></a></div>
        <div class='detail-box'><strong>Tags:</strong> <?php echo htmlspecialchars($data['tags']); ?></div>
        <div class='detail-box'><strong>Rating:</strong> <?php echo htmlspecialchars($data['rating']); ?></div>
        <div class='detail-box'><strong>Email:</strong> <?php echo htmlspecialchars($data['email']); ?></div>
        <div class='detail-box'><strong>Username:</strong> <?php echo htmlspecialchars($data['username']); ?></div>
        <div class='detail-box'><strong>Password:</strong> <?php echo htmlspecialchars($data['password']); ?></div>
        <div class='detail-box'><strong>Usage:</strong> <?php echo nl2br(htmlspecialchars($data['usage'])); ?></div>
        <button class="edit-button" onclick="editEntry('<?php echo htmlspecialchars($data['name']); ?>')">Edit</button>
    </div>
    
    <script>
        function editEntry(name) {
            window.location.href = "edit.php?name=" + name;
        }
    </script>
</body>
</html>
