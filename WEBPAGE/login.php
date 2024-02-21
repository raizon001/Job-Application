<?php
session_start(); // Start a session for user authentication

// Connect to your database
$servername = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if the user exists
$sql = "SELECT id, username, password FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, check the password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables and redirect to dashboard
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Incorrect password
        echo "Incorrect password";
    }
} else {
    // User not found
    echo "User not found";
}

// Close the database connection
$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css" />  
    <title>Login Form</title>
</head>
<body>
    <main>
    <header>

            <img src="lag.png" alt="logo"> 
    </header>
    
    <div class="Form-box">
        <form class="Login-form">
            <h1> Admin Login</h1>
            <div class="input-box">
                <input type="text" required>
                <label>Username:</label>
                <ion-icon name="mail-outline"></ion-icon>
            </div>
            <div class="input-box">
                <input type="password" required>
                <label>Password:</label>
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <div class="checkbox">
                <span>
                    <input type="checkbox" id="login-checkbox">
                    <label for="login-checkbox">Remember Me</label>
                </span>
                <h5>Forget password ?</h5>
            </div>

            <div class="submitt-buttons"> 
                <a href="admin.php" class="submit-button"> Submit</a></h5>
             </div>
            <div class="goback-buttons"> 
               <a href="index.php" class="goback-button">Go Back &#x2190</a></h5>
            </div>
            </h5>
        </form>
        
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</main>
</body>
</html>