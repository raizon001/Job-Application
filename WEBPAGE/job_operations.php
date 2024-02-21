<?php
// job_operations.php

// Database connection information
$hostname = "localhost";
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$dbname = "vacancies"; // Use the correct database name

// Create a new database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a new job vacancy
function addJobVacancy($position, $description, $photo) {
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

// Function to delete a job vacancy
function deleteJobVacancy($id) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM job_vacancies WHERE id = ?");

    // Bind the parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        return true; // If successful, return true
    } else {
        return "Error: " . $stmt->error; // If there's an error, return the error message
    }
}

// Function to edit a job vacancy
function editJobVacancy($id, $position, $description) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE job_vacancies SET position = ?, description = ? WHERE id = ?");

    // Bind the parameters
    $stmt->bind_param("ssi", $position, $description, $id);

    // Execute the statement
    if ($stmt->execute()) {
        return true; // If successful, return true
    } else {
        return "Error: " . $stmt->error; // If there's an error, return the error message
    }
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
}
?>
