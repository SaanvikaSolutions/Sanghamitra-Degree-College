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
              <li class="breadcrumb-item"><a href="./index.php">Gallery</a></li>
              <li class="breadcrumb-item active">Insert Gallery</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <div class="container mt-5">
    <h2>Create Gallery</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="galleryType">Select Gallery Type:</label>
        <select class="form-control" id="galleryType" name="galleryType">
          <option value="Events">Events</option>
          <option value="Workshops">Workshops</option>
          <option value="Annual day">Annual day</option>
        </select>
      </div>
      <div class="form-group">
        <label for="imageUpload">Upload Images:</label>
        <input type="file" class="form-control-file" id="imageUpload" name="imageUpload[]" multiple accept="image/*">
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
// include('./includes/connect.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Check if form fields are set
    if(isset($_POST['galleryType']) && isset($_FILES['imageUpload'])) {
        $galleryType = $_POST['galleryType'];
        $uploadSuccess = true; // Flag to track overall upload success

        // Loop through each uploaded image
        foreach($_FILES['imageUpload']['tmp_name'] as $key => $tmp_name) {
            $image_name = $_FILES['imageUpload']['name'][$key];
            $target_dir = "../images/gallery/"; // Adjust the target directory
            $target_file = $target_dir . basename($image_name);

            // Check if file is selected
            if (!empty($tmp_name)) {
                // Extract the file name
                $image_basename = basename($image_name);

                // Move uploaded file to the specified location
                if (move_uploaded_file($tmp_name, $target_file)) {
                    // Insert image name into the database
                    $insertImageSQL = "INSERT INTO gallery2 (gallery_type, imageNames) VALUES ('$galleryType', '$image_basename')";
                    $insertImageResult = mysqli_query($con, $insertImageSQL);

                    // Check if insertion was successful for each image
                    if (!$insertImageResult) {
                        $uploadSuccess = false;
                        echo "Error inserting image: " . mysqli_error($con) . "<br>";
                    }
                } else {
                    $uploadSuccess = false;
                    echo "Error uploading file: " . $target_file . "<br>";
                }
            }
        }

        // Display upload success or failure message
        if ($uploadSuccess) {
            echo "<script>alert('All images successfully uploaded.');</script>";
        } else {
            echo "<script>alert('Some images failed to upload. Please check error messages.');</script>";
        }
    } else {
        echo "Please fill in all the fields.";
    }
}
?>



<!-- view Images -->

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>serial_number</th>
        <th>Gallery Type</th>
        <th>image</th>
        <th>date</th>
        <th>operations</th>
      </tr>
    </thead>
    <tbody>
      <?php
            // include('./includes/connect.php');

            $select_query = "select * from gallery2";
            $result_query = mysqli_query($con,$select_query);
            if($result_query){
                $serial_number=1;
                while($row=mysqli_fetch_assoc($result_query)){
                    $id = $row['id'];
                    $galleryType = $row['gallery_type'];
                    $imageNames = $row['imageNames'];
                    $date = $row['date'];

                    echo '<tr>
                    <td>'. $serial_number .'</td>
                    <td>'. $galleryType .'</td>
                    <td><img src="../images/gallery/' . $imageNames . '" alt="Employee Image" width="50"></td>
                    <td>'. $date .'</td>
                    <td>
                    <button class="btn btn-primary"><a href="update_gallery2.php?update_id='.$id.'" class="text-light">Edit</a></button>
                    <button class="btn btn-danger"><a href="javascript:void()" onClick="chkalert('.$id.')" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
                    $serial_number++;
                }
            }
            ?>
    </tbody>
    <script type="text/javascript">
        function chkalert(id){
            sts = confirm('are you sure you want to delete it.');
            if(sts){
                document.location.href=`gallery.php?delete_id=${id}`
            }
        }
    </script>
  </table>
</div>


<!-- Delete Gallery  -->

<?php
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    // Select query to fetch the file name
    $select_query = "SELECT imageNames FROM gallery2 WHERE id=$id";
    $result_query = mysqli_query($con, $select_query);

    if($result_query){
        $row = mysqli_fetch_assoc($result_query);
        $imageNames = $row['imageNames'];

        $file_path = '../images/gallery/' . $imageNames;

        // Attempt to delete the file
        if(unlink($file_path)){
            // If the file is deleted successfully, proceed to delete from the database
            $delete_query = "DELETE FROM gallery2 WHERE id=$id";
            $result_query = mysqli_query($con, $delete_query);
            if($result_query){
                echo "<script>alert('Deleted successfully'); window.location.href = 'gallery2.php';</script>";
            } else {
                die(mysqli_error($con));
            }
        } else {
            // If the unlink operation fails, still proceed to delete the entry from the database
            $delete_query = "DELETE FROM gallery2 WHERE id=$id";
            $result_query = mysqli_query($con, $delete_query);
            if($result_query){
                echo "<script>alert('Deleted successfully'); window.location.href = 'gallery2.php';</script>";
            } else {
                die(mysqli_error($con));
            }
        }
    } else {
        die(mysqli_error($con));
    }
}
?>
<?php
include('includes/footer.php');

?>

