<?php
include('config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ''; // Variable to store the pop-up message

if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $jobRole = $_POST['jobRole'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $schoolAttended = $_POST['schoolAttended'];
    $degreeEarned = $_POST['degreeEarned'];
    $fieldOfStudy = $_POST['fieldOfStudy'];
    $technicalSkills = $_POST['technicalSkills'];
    $softSkills = $_POST['softSkills'];
    $personalStatement = $_POST['personalStatement'];

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


                    <div class="form-control">
                        <label for="fullName">Full Name:</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-control">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" required>
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
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-control">
                        <label for="dateOfBirth">Date of Birth:</label>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                    </div>

                    <div class="column">
                        <h3>Educational Background</h3>

                        <div class="form-control">
                            <label for="schoolAttended">School Attended:</label>
                            <input type="text" id="schoolAttended" name="schoolAttended" placeholder="Enter school name" required>
                        </div>

                        <div class="form-control">
                            <label for="degreeEarned">Degree Earned:</label>
                            <input type="text" id="degreeEarned" name="degreeEarned" placeholder="Enter degree" required>
                        </div>

                        <div class="form-control">
                            <label for="fieldOfStudy">Field of Study:</label>
                            <input type="text" id="fieldOfStudy" name="fieldOfStudy" placeholder="Enter major or field of study" required>
                        </div>

                        <div class="form-control">
                            <label for="uploadTOR">Upload Your TOR:</label>
                            <input type="file" id="uploadTOR" name="uploadTOR">
                        </div>
                    </div>

                    <div class="column">
                        <h3>Work Experience</h3>

                        <div class="form-control">
                            <label for="previousEmployee">Previous Employee:</label>
                            <input type="text" id="previousEmployee" name="previousEmployee" placeholder="Enter previous employer" required>
                        </div>

                        <div class="form-control">
                            <label for="jobTitles">Job Titles:</label>
                            <textarea id="jobTitles" name="jobTitles" placeholder="Enter job titles" required></textarea>
                        </div>

                        <div class="form-control">
                            <label for="jobResponsibilities">Job Responsibilities:</label>
                            <textarea id="jobResponsibilities" name="jobResponsibilities" placeholder="Enter job responsibilities" required></textarea>
                        </div>
                    </div>

                    <div class="column">
                        <h3>Skills and Qualifications</h3>

                        <div class="form-control">
                            <label for="technicalSkills">Technical Skills:</label>
                            <textarea id="technicalSkills" name="technicalSkills" placeholder="Enter technical skills" required></textarea>
                        </div>

                        <div class="form-control">
                            <label for="softSkills">Soft Skills:</label>
                            <textarea id="softSkills" name="softSkills" placeholder="Enter soft skills" required></textarea>
                        </div>
                    </div>

                    <div class="form-control">
                        <h3>Objective or Personal Statement</h3>

                        <div class="form-control">
                            <label for="personalStatement">Brief statement about career goals and skills:</label>
                            <textarea id="personalStatement" name="personalStatement" placeholder="Enter personal statement" required></textarea>
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