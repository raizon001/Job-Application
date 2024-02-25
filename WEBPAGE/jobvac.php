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

        /* Added styles for the Sign In button */
        .sign-in-button {
            background-color: green;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            margin-left: -40%;
            text-decoration: none;
            font-size: 16px;
            margin: -10px 1px;
            cursor: pointer;
            border-radius: 8px; /* Added border-radius */
        }
    </style>
</head>

<body>
    <header>
        <div class="main">
        <div class="search"> 
        <h3> <input class="srch" type="search" name="" placeholder=" Type here"></h3>
     </h3><a href="#"> <button class="btn" > Search </button></a></h3>
         </div>

            <img src="logo.jpg" alt="logo" />
            <h2 class="page-title">PHINMA COC SCHOOL JOB LISTINGS</h2>
            <div class="menu">
                <ul>
                    <li><a href="index.html" class="active">HOME</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <li><a href="jobvac.php">JOB VACANCIES</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
                    <li><a href="login.php" class="sign-in-button"> <i class="fas fa-user"></i></a></li>
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
                    '<p>' . $job['description'] . '</p>';

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

        </section>
    </main>
</body>

</html>
