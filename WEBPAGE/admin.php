<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your custom stylesheets here -->

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
            background-image: linear-gradient(to left, rgb(7, 116, 25), rgb(216, 233, 218));
        }

        h1{
    font-size: 30px;
    text-shadow: 2px 2px 5px rgb(65, 64, 64);
    margin-left: 44%;
    display: flex;
    padding: 3px;
    color: rgb(255, 255, 255);
    margin-top: 2%;
    margin-bottom: 5%;
}
        

        main {
            padding: 3px;
            animation: fadeInUp 1s ease-out;
        }

        form {
            margin-top: 3px;
            background-color: #fff;
            padding: 5px;
            font-weight: bold;
            width: 70%;
            margin-left: 15%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.2s ease-out;
            margin-bottom; 10%;
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
           margin-left: 45%;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            font-weight: bold;
        }

        button:hover {
            background-color:#1cda7b;
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




    .viewport-buttons {
        position: absolute;
        border: 1px solid #000000;
        top: 20px; /* Adjust the top position as needed */
        right: 20px; /* Adjust the right position as needed */
        z-index: 1; /* Ensure it appears above other elements */
    }

    .viewport-button {
        display: inline-block;
        padding: 10px 10px;
        font-size: 16px;
        text-decoration: none;
        background-color: transparent;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .viewport-button:hover {
        background-color: #1cda7b;
    }

        header img {
    margin-top: 15px;
    float: left;
    width: 340px;
    margin-left: 3%;
    margin-bottom: 1%;
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
        <img src="lag.png" alt="logo">
        
            <h1>Admin Portal</h1>
            <div class="viewport-buttons"> 
                <a href="view.php" class="viewport-button"> View Applicants</a>
                   </div>
               
        </div>
    </header>

    <main>
        <div class="container">
            <?php
            session_start();

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
                        <option value="add">Add Application</option>
                        <option value="edit">Edit Job</option>
                        <option value="delete">Delete Job</option>
                        
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

                   
                    <!-- Fields for editing a job -->
                    <div id="edit-job-fields">
                        <label for="edit_id">Job ID to Edit:</label>
                        <input type="text" id="edit_id" name="edit_id">

                        <label for="edit_position">New Position:</label>
                        <input type="text" id="edit_position" name="edit_position">

                        <label for="edit_description">New Description:</label>
                        <textarea id="edit_description" name="edit_description" rows="4"></textarea>
                    </div>
                     <!-- Fields for deleting a job -->
                     <div id="delete-job-fields">
                        <label for="delete_id">Job ID to Delete:</label>
                        <input type="text" id="delete_id" name="delete_id">
                    </div>


                    <button type="submit">Perform Operation</button>
                </form>
            </section>
        </div>
    </main>
    
</body>

</html>
   
