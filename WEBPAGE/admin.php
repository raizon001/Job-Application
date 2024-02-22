<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your custom stylesheets here -->
    <!-- Link to the Google Font 'Roboto' -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background-color 0.3s ease-in-out;
        }

        header {
            background-color: #008000;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            animation: fadeInDown 0.8s ease-out;
}


        main {
            padding: 20px;
            animation: fadeInUp 1s ease-out;
        }

        form {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.2s ease-out;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #008000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #008000;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            animation: fadeInUp 1s ease-out;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <h1>Admin Panel</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <section id="job-operations">
                <h2>Job Operations</h2>

                <?php
                // Include the PHP file with backend operations
                include 'job_operations.php';

                // Check if the form is submitted for adding, deleting, or editing a job vacancy
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // ... (same as in your code)
                }
                ?>

                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <label for="operation">Operation:</label>
                    <select id="operation" name="operation" required>
                        <option value="add">Quick Apply</option>
                        <option value="delete">Delete Job</option>
                        <option value="edit">Edit Job</option>
                    </select>

                    <div id="add-job-fields">
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position" required>

                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>

                        <label for="photo">Upload Photo:</label>
                        <input type="file" name="photo" id="photo">
                    </div>

                    <div id="delete-job-fields">
                        <label for="delete_id">Job ID to Delete:</label>
                        <input type="text" id="delete_id" name="delete_id" required>
                    </div>

                    <div id="edit-job-fields">
                        <label for="edit_id">Job ID to Edit:</label>
                        <input type="text" id="edit_id" name="edit_id" required>

                        <label for="edit_position">New Position:</label>
                        <input type="text" id="edit_position" name="edit_position">

                        <label for="edit_description">New Description:</label>
                        <textarea id="edit_description" name="edit_description" rows="4"></textarea>
                    </div>

                    <button type="submit">Perform Operation</button>
                </form>
            </section>
        </div>
    </main>

    
</body>

</html>
