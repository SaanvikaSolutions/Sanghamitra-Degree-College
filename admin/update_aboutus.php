<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect user to the login page
    header("Location: login.php");
    exit();
}

include('./connections/dbconnect.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
              <li class="breadcrumb-item active">Update About Us</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



<?php

$id = $_GET['update_id'];
$fetch = "SELECT * FROM aboutus WHERE id=?";
$stmt = mysqli_prepare($con, $fetch);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$our_mission = $row['our_mission'];
$existingImage1 = $row['mission_image'];
$our_vision = $row['our_vision'];
$existingImage2 = $row['vision_image'];
$chairman_message = $row['chairman_message'];
$existingImage3 = $row['chairman_image'];
$correspondent_message = $row['correspondent_message'];
$existingImage4 = $row['correspondent_image'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ourMission = $_POST['ourMission'];
    $ourVision = $_POST['ourVision'];
    $chairmanMessage = $_POST['chairmanMessage'];
    $correspondentMessage = $_POST['correspondentMessage'];

    // Handle image uploads
    $newImage1 = handleFileUpload('missionImage', $existingImage1);
    $newImage2 = handleFileUpload('visionImage', $existingImage2);
    $newImage3 = handleFileUpload('chairmanImage', $existingImage3);
    $newImage4 = handleFileUpload('correspondentImage', $existingImage4);

    // Update database with new image filenames
    $update_query = "UPDATE aboutus SET our_mission=?, mission_image=?, our_vision=?, vision_image=?, chairman_message=?, chairman_image=?, correspondent_message=?, correspondent_image=? WHERE id=?";
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssssssi", $ourMission, $newImage1, $ourVision, $newImage2, $chairmanMessage, $newImage3, $correspondentMessage, $newImage4, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Updated successfully.'); window.location.href='view_aboutus.php';</script>";
    } else {
        echo "<script>alert('Error: Failed to update data.');</script>";
    }
}

// Function to handle file upload
function handleFileUpload($fieldName, $existingImage) {
    if (!empty($_FILES[$fieldName]['name'])) {
        $newImage = $_FILES[$fieldName]['name'];
        $tempImage = $_FILES[$fieldName]['tmp_name'];

        // Move the uploaded image
        move_uploaded_file($tempImage, "./includes/images/about_us_images/$newImage");

        // Delete the existing image
        if ($existingImage && file_exists("./includes/images/about_us_images/$existingImage")) {
            unlink("./includes/images/about_us_images/$existingImage");
        }
        return $newImage;
    } else {
        // If no new image uploaded, retain the existing image
        return $existingImage;
    }
}
?>


    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ourMission">Our Mission</label>
                <input type="text" class="form-control" id="ourMission" name="ourMission"
                    value="<?php echo $our_mission; ?>">
            </div>
            <div class="form-group">
                <label for="missionImage">Mission Image</label>
                <input type="file" class="form-control-file" id="missionImage" name="missionImage">
            </div>
            <div class="form-group">
                <label for="ourVision">Our Vision</label>
                <input type="text" class="form-control" id="ourVision" name="ourVision"
                    value="<?php echo $our_vision; ?>">
            </div>
            <div class="form-group">
                <label for="visionImage">Vision Image</label>
                <input type="file" class="form-control-file" id="visionImage" name="visionImage">
            </div>
            <div class="form-group">
                <label for="chairmanMessage">Chairman's Message</label>
                <textarea class="form-control" id="chairmanMessage" name="chairmanMessage"
                    rows="3"><?php echo $chairman_message; ?></textarea>
            </div>
            <div class="form-group">
                <label for="chairmanImage">Chairman's Image</label>
                <input type="file" class="form-control-file" id="chairmanImage" name="chairmanImage">
            </div>
            <div class="form-group">
                <label for="correspondentMessage">Correspondent's Message</label>
                <textarea class="form-control" id="correspondentMessage" name="correspondentMessage"
                    rows="3"><?php echo $correspondent_message; ?></textarea>
            </div>
            <div class="form-group">
                <label for="correspondentImage">Correspondent's Image</label>
                <input type="file" class="form-control-file" id="correspondentImage" name="correspondentImage">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
include('includes/footer.php');

?>