<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ''; // Variable to store the pop-up message

if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];

    $jobRole = $_POST['jobRole'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];


    $insert_query = mysqli_query($conn, "INSERT INTO `list` (
        full_name, address, job_role, phone_number, email_address, date_of_birth, 
        school_attended, degree_earned, field_of_study, technical_skills, soft_skills, personal_statement
    ) VALUES (
        '$fullName', '$address', '$jobRole', '$phoneNumber', '$email', '$dateOfBirth', 
        '$schoolAttended', '$degreeEarned', '$fieldOfStudy', '$technicalSkills', '$softSkills', '$personalStatement'
    )");

    if ($insert_query) {
        $message = "Data inserted successfully";
    } else {
        $message = "There was an error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formstyle.css" />
    <title>Form</title>
</head>

<body>
    <main>
        <header>
            <img src="lag.png" alt="logo">
        </header>

        <div class="container">
            <div class="apply box">
                <h2>APPLICATION FORM</h2>
                <form method="post" action="form.php" class="application-form">


                <div class="column">
                        <h3>Personal information</h3>

                    <div class="form-control">
                        <label for="fullName">Full Name:</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                  
                    <div class="form-control">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-control">
                        <label for="jobRole">Job Role:</label>
                        <select name="jobRole" id="jobRole" required>
                            <option value="">Select Job role</option>
                            <option value="crim">Crim Faculty</option>
                            <option value="nur">NURSING FACULTY</option>
                            <option value="iclean">ICLEAN STAFF</option>
                            <option value="medtech">MEDICAL TECHNICIAN</option>
                            <option value="secu">SECURITY GUARD</option>
                            <option value="IT">IT FACULTY</option>
                            <option value="ceinstruc">CE INSTRUCTOR</option>
                            <option value="reg">REGISTRAR</option>
                            <option value="accountancy">ACCOUNTANT FACULTY</option>
                        </select>
                    </div>

                    <div class="form-control">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
                    </div>

                        <div class="form-control">
                            <label for="uploadTOR">Upload Your TOR:</label>
                            <input type="file" id="uploadTOR" name="In jpeg file">
                        </div>


                        <div class="form-control">
                            <label for="uploadTOR">Upload Your Resume:</label>
                            <input type="file" id="uploadTOR" name="In pdf file">
                        </div>
                    </div>

                    <button type="submit" name="submit" class="submit-btn">Submit</button>

                    <div class="goback-buttons">
                        <a href="jobvac.php" class="goback-button">&#x2190</a>
                    </div>
                </form>

                <?php if (!empty($message)) : ?>
                    <div class="message">
                        <p><?php echo $message; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

</html>
