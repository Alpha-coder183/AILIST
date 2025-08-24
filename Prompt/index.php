<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Page</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #DBFAFE; margin: 0; padding: 0; overflow: auto; scrollbar-width: none; -ms-overflow-style: none; }
        .header { background-color: #4169E1; padding: 20px; text-align:right; }
        .header button { background-color: #1E3A8A; color: white; border: none; padding: 10px 20px; margin: 10px; cursor: pointer; font-size: 18px; }
        .message { width: 100%; text-align: center; padding: 15px; color: white; font-size: 18px; display: none; }
        .message.success { background-color: green; display: block; }
        .message.error { background-color: red; display: block; }
        .container { width: 50%; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        .error-text { color: red; font-size: 14px; display: none; }
        button.submit { background-color: #3B82F6; color: white; border: none; padding: 10px; cursor: pointer; font-size: 16px; width: 100%; }
        button.submit:disabled { background-color: gray; cursor: not-allowed; }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='input.php'">Input</button>
        <button onclick="window.location.href='showall.php'">Show All</button>
    </div>
    <br>
    <div id="message" class="message"></div>
    <br>
    <div class="container">
        <form id="inputForm" action="backend.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" id="name" required>
            <span class="error-text" id="nameError">Field should not be empty</span>
            
            <label>Link:</label>
            <input type="text" name="link" id="link" required>
            <span class="error-text" id="linkError">Field should not be empty</span>
            
            <label>Tags:</label>
            <input type="text" name="tags" id="tags" required>
            <span class="error-text" id="tagsError">Field should not be empty</span>
            
            <label>Rating:</label>
            <input type="number" name="rating" id="rating" min="1" max="5" step="0.1" required>
            <span class="error-text" id="ratingError">Rating should be in 1-5</span>
            
            <label>Email:</label>
            <input type="email" name="email" id="email" required>
            <span class="error-text" id="emailError">Field should not be empty</span>
            
            <label>Username:</label>
            <input type="text" name="username" id="username" required>
            <span class="error-text" id="usernameError">Field should not be empty</span>
            
            <label>Password:</label>
            <input type="text" name="password" id="password" required>
            <span class="error-text" id="passwordError">Field should not be empty</span>
            
            <label>Usage:</label>
            <textarea name="usage" id="usage" required></textarea>
            <span class="error-text" id="usageError">Field should not be empty</span>
            
            <button type="submit" class="submit" id="submitBtn" disabled>Submit</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let inputStatus = localStorage.getItem("input");
            let messageDiv = document.getElementById("message");
            if (inputStatus == 1) {
                messageDiv.classList.add("success");
                messageDiv.innerText = "Input taken successfully";
            } else if (inputStatus == 2) {
                messageDiv.classList.add("error");
                messageDiv.innerText = "Some error occurred";
            }
            else if (inputStatus == 3) {
                messageDiv.classList.add("error");
                messageDiv.innerText = "AI exist in database";
            }
            localStorage.setItem("input", 0);
        });

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
