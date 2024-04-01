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
              <li class="breadcrumb-item active">View Gallery</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>serial_number</th>
                    <th>id</th>
                    <th>name</th>
                    <th>image</th>
                    <th>date</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
            <?php

            $select_query = "select * from gallery";
            $result_query = mysqli_query($con,$select_query);
            if($result_query){
                $serial_number=1;
                while($row=mysqli_fetch_assoc($result_query)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $date = $row['date'];

                    echo '<tr>
                    <td>'. $serial_number .'</td>
                    <td>'. $id .'</td>
                    <td>'. $name .'</td>
                    <td><img src="../images/gallery/' . $image . '" alt="Employee Image" width="50"></td>
                    <td>'. $date .'</td>
                    <td>
                    <button class="btn btn-primary"><a href="update_gallery.php?update_id='.$id.'" class="text-light">Edit</a></button>
                    <button class="btn btn-danger"><a href="javascript:void()" onClick="chkalert('.$id.')" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
                    $serial_number++;
                }
            }
            ?>
            </tbody>

        </table>
    </div>

    <script type="text/javascript">
        function chkalert(id){
            sts = confirm('are you sure you want to delete it.');
            if(sts){
                document.location.href=`view_gallery.php?delete_id=${id}`
            }
        }
    </script>


<?php
// include('./includes/connect.php');

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    // Select query to fetch the file name
    $select_query = "SELECT image FROM gallery WHERE id=$id";
    $result_query = mysqli_query($con, $select_query);

    if($result_query){
        $row = mysqli_fetch_assoc($result_query);
        $image = $row['image'];

        $file_path = '../images/gallery/' . $image;

        // Check if the file exists before attempting to delete
        if(file_exists($file_path)){
            if(unlink($file_path)){
                // If the file is deleted successfully, proceed to delete from the database
                $delete_query = "DELETE FROM gallery WHERE id=$id";
                $result_query = mysqli_query($con, $delete_query);
                if($result_query){
                    echo "<script>alert('Deleted successfully'); window.location.href = 'view_gallery.php';</script>";
                } else {
                    die(mysqli_error($con));
                }
            } else {
                echo "<script>alert('Error deleting file'); window.location.href = 'view_gallery.php';</script>";
            }
        } else {
            echo "<script>alert('File not found'); window.location.href = 'view_gallery.php';</script>";
        }
    } else {
        die(mysqli_error($con));
    }
}
?>

<?php
include('includes/footer.php');

?>