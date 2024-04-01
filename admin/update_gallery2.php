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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php

$id = $_GET['update_id'];
$fetch = "SELECT * FROM gallery2 WHERE id=$id";
$result = mysqli_query($con, $fetch);
$row = mysqli_fetch_assoc($result);
$gallery_type = $row['gallery_type'];
$existingImage = $row['imageNames'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $new_gallery_type = $_POST['galleryType'];
    $newImage = $_FILES['imageUpload']['name'];
    $tempImage = $_FILES['imageUpload']['tmp_name'];

    // Check if changes have been made
    if ($gallery_type != $new_gallery_type || !empty($newImage)) {
        // Move the uploaded image
        if (!empty($newImage)) {
            move_uploaded_file($tempImage, "../images/gallery/$newImage");
        }

        // Delete the existing image
        if ($existingImage && file_exists("../images/gallery/$existingImage")) {
            unlink("../images/gallery/$existingImage");
        }

        // Update the database with new values
        $update_query = "UPDATE gallery2 SET gallery_type='$new_gallery_type', imageNames='$newImage' WHERE id=$id";
        $result = mysqli_query($con, $update_query);

        if ($result) {
            echo "<script>alert('Updated successfully.'); window.location.href='gallery2.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
        }
    } else {
        echo "<script>alert('No changes have been made.'); window.location.href='gallery2.php';</script>";
    }
}
?>

  <div class="container mt-5">
    <h2>Create Gallery</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="galleryType">Select Gallery Type:</label>
        <select class="form-control" id="galleryType" name="galleryType">
          <option value="Events" <?php if ($gallery_type == 'Events') echo 'selected' ; ?>>Events</option>
          <option value="Workshops" <?php if ($gallery_type == 'Workshops') echo 'selected' ; ?>>Workshops</option>
          <option value="Annual day" <?php if ($gallery_type == 'Annual day') echo 'selected' ; ?>>Annual day</option>
        </select>
      </div>
      <div class="form-group">
        <label for="imageUpload">Upload Images:</label>
        <input type="file" class="form-control-file" id="imageUpload" name="imageUpload" multiple accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br><br><br>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
include('includes/footer.php');

?>