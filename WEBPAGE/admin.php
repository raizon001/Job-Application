<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your custom stylesheets here -->
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
                    $operation = $_POST["operation"];

                    if ($operation == "add") {
                        $position = $_POST["position"];
                        $description = $_POST["description"];

                        // File upload logic
                        $photo = $_FILES["photo"]["name"];
                        $targetDirectory = "uploads/";

                        if (!file_exists($targetDirectory)) {
                            mkdir($targetDirectory, 0777, true);
                        }

                        $targetFile = $targetDirectory . basename($photo);

                        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }

                        // Call the function to add a new job vacancy
                        if (addJobVacancy($position, $description, $photo)) {
                            echo "Job added successfully!";
                        } else {
                            echo "Error adding job.";
                        }
                    } elseif ($operation == "delete") {
                        $deleteId = $_POST['delete_id'];

                        // Call the function to delete the selected job vacancy
                        if (deleteJobVacancy($deleteId)) {
                            echo "Job deleted successfully!";
                        } else {
                            echo "Error deleting job.";
                        }
                    } elseif ($operation == "edit") {
                        $editId = $_POST['edit_id'];
                        $editPosition = $_POST['edit_position'];
                        $editDescription = $_POST['edit_description'];

                        // Call the function to edit the selected job vacancy
                        if (editJobVacancy($editId, $editPosition, $editDescription)) {
                            echo "Job edited successfully!";
                        } else {
                            echo "Error editing job.";
                        }
                    }
                }
                ?>

                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <label for="operation">Operation:</label>
                    <select id="operation" name="operation" required>
                        <option value="add">Quick Apply</option>
                        <option value="delete">Delete Job</option>
                        <option value="edit">Edit Job</option>
                    </select>

                    <!-- Fields for adding a new job -->
                    <div id="add-job-fields">
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position">

                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4"></textarea>

                        <!-- Add the file input for the photo -->
                        <label for="photo">Upload Photo:</label>
                        <input type="file" name="photo" id="photo">
                    </div>

                    <!-- Fields for deleting a job -->
                    <div id="delete-job-fields">
                        <label for="delete_id">Job ID to Delete:</label>
                        <input type="text" id="delete_id" name="delete_id">
                    </div>

                    <!-- Fields for editing a job -->
                    <div id="edit-job-fields">
                        <label for="edit_id">Job ID to Edit:</label>
                        <input type="text" id="edit_id" name="edit_id">

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

    <footer>
        <div class="container">
            <p>&copy; footer.</p>
        </div>
    </footer>
</body>

</html>
