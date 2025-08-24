<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aiList";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = isset($_GET['name']) ? $_GET['name'] : '';
if (!$name) {
    echo "<script>window.location.href = 'showall.php';</script>";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM allAi WHERE name = ?");
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<script>window.location.href = 'output.php';</script>";
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
    <title>Edit Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #DBFAFE; margin: 0; padding: 0; }
        .header { background-color: #4169E1; padding: 20px; text-align: right; }
        .header button { background-color: #1E3A8A; color: white; border: none; padding: 10px 20px; margin: 10px; cursor: pointer; font-size: 18px; }
        .container { width: 50%; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        .error-text { color: red; font-size: 14px; display: none; }
        button.submit { background-color: #3B82F6; color: white; border: none; padding: 10px; cursor: pointer; font-size: 16px; width: 100%; }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='input.php'">Input</button>
        <button onclick="window.location.href='showall.php'">Show All</button>
    </div>
    <br><br>
    <div class="container">
        <form id="editForm" action="edit_backend.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>
            <span class="error-text" id="nameError">Field should not be empty</span>

            <label>Link:</label>
            <input type="text" name="link" value="<?php echo htmlspecialchars($data['link']); ?>" required>
            <span class="error-text" id="nameError">Field should not be empty</span>

            <label>Tags:</label>
            <input type="text" name="tags" value="<?php echo htmlspecialchars($data['tags']); ?>" required>
            <span class="error-text" id="nameError">Field should not be empty</span>

            <label>Rating:</label>
            <input type="number" name="rating" min="1" max="5" step="0.1" value="<?php echo htmlspecialchars($data['rating']); ?>" required>
            <span class="error-text" id="ratingError">Rating should be in 1-5</span>
            
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
            <span class="error-text" id="nameError">Field should not be empty</span>

            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
            <span class="error-text" id="nameError">Field should not be empty</span>

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($data['password']); ?>" required>
            <span class="error-text" id="nameError">Field should not be empty</span>

            <label>Usage:</label>
            <textarea name="usage" required><?php echo htmlspecialchars($data['usage']); ?></textarea>
            <span class="error-text" id="nameError">Field should not be empty</span>
            
            <button type="submit" class="submit">Edit</button>
        </form>
    </div>
    <script>
        const fields = document.querySelectorAll("input, textarea");
        const submitBtn = document.getElementById("submitBtn");
        
        fields.forEach(field => {
            field.addEventListener("input", function() {
                let errorSpan = document.getElementById(field.id + "Error");
                if (!field.value.trim()) {
                    errorSpan.style.display = "block";
                } else {
                    errorSpan.style.display = "none";
                }
                if (field.id === "rating" && (field.value < 1 || field.value > 5)) {
                    errorSpan.style.display = "block";
                }
                checkFormValidity();
            });
        });
        
        function checkFormValidity() {
            let isValid = true;
            fields.forEach(field => {
                let errorSpan = document.getElementById(field.id + "Error");
                if (errorSpan.style.display === "block" || !field.value.trim()) {
                    isValid = false;
                }
            });
            submitBtn.disabled = !isValid;
        }
    </script>
</body>
</html>