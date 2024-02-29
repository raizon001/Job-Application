<?php
// job_operations.php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$databaseName = "list";
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($createDatabaseQuery) === TRUE) {
    echo "Database created successfully or already exists.";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the created/available database
$conn->select_db($databaseName);

// Create the job_vacancies table if not exists
$createTableQuery = "CREATE TABLE IF NOT EXISTS job_vacancies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(255) NOT NULL,
    description TEXT,
    photo VARCHAR(255)
)";

if ($conn->query($createTableQuery) === TRUE) {
    echo "Table created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to get all job vacancies
function getJobVacancies() {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM job_vacancies");

    // Execute the statement
    if ($stmt->execute()) {
        // Get result set
        $result = $stmt->get_result();

        // Fetch data
        $jobVacancies = $result->fetch_all(MYSQLI_ASSOC);

        return $jobVacancies;
    } else {
        return "Error: " . $stmt->error; // If there's an error, return the error message
    }
}

// Function to add a new job vacancy with file upload
function addJobVacancyWithFile($position, $description, $photo) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO job_vacancies (position, description, photo) VALUES (?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("sss", $position, $description, $photo);

    // Execute the statement
    if ($stmt->execute()) {
        return true; // If successful, return true
    } else {
        return "Error: " . $stmt->error; // If there's an error, return the error message
    }
}
?>
