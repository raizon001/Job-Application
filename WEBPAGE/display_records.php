    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="display_records.css" />
        <style>
        
        </style>
        <title>Display Records</title>
    </head>

    <body>
        <main>
            <header>
                <h2>Recorded Data</h2>
                
            </header>
            <header>
            <a href="admin.php" class="goback-button">&#x2190; Go Back</a>
        </header>
            <div class="container">
                <div class="records box">
                    <?php
                    include('config.php');

                    $query = "SELECT * FROM form"; // Assuming your table is named 'form'
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>ID</th><th>Full Name</th><th>Email Address</th><th>Job Role</th><th>Phone Number</th><th>TOR File</th><th>Resume File</th></tr>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['full_name'] . "</td>";
                            echo "<td>" . $row['email_address'] . "</td>";
                            echo "<td>" . $row['job_role'] . "</td>";
                            echo "<td>" . $row['phone_number'] . "</td>";
                            echo "<td>" . $row['tor_file'] . "</td>";
                            echo "<td>" . $row['resume_file'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No records found";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </main>
    </body>

    </html>
