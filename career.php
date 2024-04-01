<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="vdc-career.css">
    <title>Careers</title>
    <style>
        form {
            width: 100%;
            padding: 15px
        }
        .forminator {
            padding: 10px;
        }
    </style>
</head>

<body>

    <specia-header></specia-header>
    <!-- top section  -->
    <div class="top-bar-section">
        <img src="./images/Courses/background-courses.png" alt="No Image">
        <h1 class="top-bar-heading">
            Careers
        </h1>
    </div>

    <h1 class="vdc-career-header">Application Form</h1>

    <div class="form-careers">
        <div class="content-area">
            <main id="main" class="career-main" role="main">
                <article id="career-post" class="career-post-form">
                    <div class="entry-content single-entry-content">
                        <form class="forminator" action="" method="post" enctype="multipart/form-data">
                            <div class="forminator-row"><!------flex------>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">First Name<span class="forminator-required">*</span></label>
                                        <input type="text" class="forminator-input" name="firstname" value placeholder="E.g. John" required>
                                    </div>
                                </div>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Last Name<span class="forminator-required">*</span></label>
                                        <input type="text" class="forminator-input" name="lastname" value placeholder="Doe" required>
                                    </div>
                                </div>
                            </div>
                            <div class="forminator-row">
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Email Address<span class="forminator-required">*</span></label>
                                        <input type="email" class="forminator-input" name="Email" value placeholder="john@doe.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="forminator-row"><!------flex------>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Contact No:<span class="forminator-required">*</span></label>
                                        <input type="text" class="forminator-input" name="contactno" value placeholder="E.g. 9874563210" required>
                                    </div>
                                </div>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Alternate Contact no:</label>
                                        <input type="text" class="forminator-input" name="alternateno" value placeholder="E.g.9876543210">
                                    </div>
                                </div>
                            </div>
                            <div class="forminator-row"><!------flex------>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Category:<span class="forminator-required">*</span></label>
                                        <select id="Category" name="Category" class="forminator-field-options" data-required="1" data-hidden-behaviour="zero" data-placeholder="Others">
                                            <option value="others">Others</option>
                                            <option value="professor">Professor</option>
                                            <option value="senior-professor">Senior Professor</option>
                                            <option value="assistant-professor">Assistant Professor</option>
                                            <option value="assosiate-professor">Assosiate-professor</option>
                                            <option value="administrative-assist">Administrative Assistant</option>
                                            <option value="librarian">Librarian</option>
                                            <option value="library-assistant">Library Assistant</option>
                                            <option value="lab-technicians">Lab Technicians</option>
                                            <option value="accountants">Accountants</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="upload-1" class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Upload CV:<span class="forminator-required">*</span></label>
                                        <div class="forminator-upload-container"><!-- Container for file input and custom button -->
                                            <label for="fileInput" class="custom-file-upload-button">Choose File</label>
                                            <input type="file" class="custom-file-input forminator-upload" name="upload-1" accept=".pdf,.docx,.txt,.rtf" id="fileInput">
                                            <span class="custom-file-upload-span" data-empty-text="No file chosen">No file chosen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="forminator-row"><!------flex------>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <label for="forminator-field-name" class="forminator-label">Message/comments:</label>
                                        <textarea name="message" placeholder="Enter your message....!" id="forminator-field-textarea" class="forminator-textarea" rows="6" style="min-height: 140px;" maxlength="180"></textarea>

                                        <span id="forminator-field-textarea" class="forminator-text-description">
                                            <span data-limit="180" data-type="characters">0 / 180</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="forminator-row forminator-last-row"><!------flex------>
                                <div class="forminator-field">
                                    <div class="forminator-field-sub">
                                        <button class="forminator-button forminator-submit-button" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </article>
            </main>

        </div>
    </div>
    <special-footer></special-footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('fileInput');
            const fileUploadSpan = document.querySelector('.custom-file-upload-span');

            fileInput.addEventListener('change', function () {
                const fileName = this.value.split('\\').pop(); // Get the selected file name
                fileUploadSpan.textContent = fileName || fileUploadSpan.getAttribute('data-empty-text');
            });
        });
    </script>

    <script src="./headerFooterManager.js"></script>
    <script src="./js/app.js"></script>

</body>

</html>


<?php
include('./admin/connections/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['firstname'] ?? '';
    $lname = $_POST['lastname'] ?? '';
    $email = $_POST['Email'] ?? '';
    $contact_number = $_POST['contactno'] ?? '';
    $alt_number = $_POST['alternateno'] ?? '';
    $category = $_POST['Category'] ?? '';
    $message = $_POST['message'] ?? '';

    // File upload handling
    if (isset($_FILES['upload-1'])) {
        $cv = $_FILES['upload-1']['name'];
        $temp_cv = $_FILES['upload-1']['tmp_name'];

        // Move uploaded file
        $upload_dir = './admin/files/';
        $cv_path = $upload_dir . $cv;

        if (move_uploaded_file($temp_cv, $cv_path)) {
            // Query to insert data
            $insert_query = "INSERT INTO `careers` (first_name, last_name, email, contact_number, alternate_number, categories, cv, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $insert_query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $email, $contact_number, $alt_number, $category, $cv, $message);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "<script>alert('Inserted successfully.')</script>";
                } else {
                    echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
                }
            } else {
                echo "<script>alert('Error preparing statement.')</script>";
            }
        } else {
            echo "<script>alert('Error moving file.')</script>";
        }
    } else {
        echo "<script>alert('No file uploaded.')</script>";
    }
}
?>