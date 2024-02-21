<!DOCTYPE html>
<html lang="en">

<head>
    <title>CAGAYAN DE ORO COLLEGE - PHINMA EDUCATION</title>
    <link rel="stylesheet" href="jobvac.css" />
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add some custom styles for the icon button*/

        .job-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="main">
            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type to text" />
                <button class="btn">Search</button>
            </div>
            <img src="logo.jpg" alt="logo" />
            <h2 class="page-title">PHINMA COC SCHOOL JOB LISTINGS</h2>
            <div class="menu">
                <ul>
                    <li><a href="/" class="active">HOME</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <li><a href="jobvac.php">JOB VACANCIES</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <div class="job">Job Openings</div>
        <div class="green-background"></div>
        <section class="section">

            <?php
            // Include the PHP file with backend operations
            include 'job_operations.php';

            // Fetch and display job vacancies
            $jobVacancies = getJobVacancies();

            foreach ($jobVacancies as $job) {
                echo '<div class="vaclist">' .
                    '<h2>' . $job['position'] . '</h2>' .
                    '<p>Description:</p>' .
                    '<p>' . $job['description'] . '</p>';

                // Check if a photo exists for the job
                  // Check if a photo exists for the job
                  if (!empty($job['photo'])) {
                    echo '<img src="uploads/' . $job['photo'] . '" alt="Job Photo" class="job-image">';
                }

                // Connect the Quick Apply button to form.php
                echo '<a href="form.php" class="vac-listing-buttons">Quick Apply</a>' .
                    '</div>';
            }
            ?>

            <!-- Additional job listings -->
            <div class="vaclist">
                <h2>NURSING FACULTY</h2>
                <p>Description:</p>
                <p>• Bachelor's degree in Nursing</p>
                <p>• Licensed is a must </p>
                <p>• Experience in the academe is an advantage</p>
                <p>• Excellent in teaching, interpersonal relations and communication</p>
                <p>• Dynamic and Flexible</p>
                <a href="form.php" class="vac-listing-buttons">Quick Apply</a>
            </div>

            <div class="vaclist">
                <h2>MEDICAL TECHNICIAN FACULTY</h2>
                <p>Description:</p>
                <p>• Bachelor's degree in Medical Technician or Medical Science </p>
                <p>• Licensed is a must </p>
                <p>• Experience in the academe is an advantage</p>
                <p>• Dynamic and Flexible</p>
                <p>• For Full Time</p>
                <a href="form.php" class="vac-listing-buttons">Quick Apply</a>
            </div>

            <div class="vaclist">
                <h2>IT FACULTY</h2>
                <p>Description:</p>
                <p>• Bachelor degree in IT or other related course</p>
                <p>• With a vertically aligned Masters "Full-fledged" or CAR is an advantage</p>
                <p>• Experience in the academe is an advantage </p>
                <p>• Excellent in teaching, interpersonal relations and communication </p>
                <p>• Dynamic and Flexible</p>
                <a href="form.php" class="vac-listing-buttons">Quick Apply</a>
            </div>

        </section>
    </main>
</body>

</html>
