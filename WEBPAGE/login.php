<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

// Hash the password before storing it in the database
$hashedPassword = password_hash('1234', PASSWORD_DEFAULT);

// Example registration query
$username = "admin";
$sql = "INSERT INTO login (username, password, usertype) VALUES ('$username', '$hashedPassword', 'admin')";
$result = mysqli_query($data, $sql);

if ($result === false) {
    echo "Registration failed: " . mysqli_error($data);
} else {
    echo "Registration successful!";
}

mysqli_close($data);
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
