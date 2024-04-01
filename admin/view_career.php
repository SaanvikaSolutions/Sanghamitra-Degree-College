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
              <li class="breadcrumb-item"><a href="./index.php">Career</a></li>
              <li class="breadcrumb-item active">View Career</li>
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
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>email</th>
                    <th>contact_number</th>
                    <th>alternate_number</th>
                    <th>category</th>
                    <th>view uploadede file</th>
                    <th>message</th>
                    <th>date</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
            // include('./includes/connect.php');

            $select_query = "select * from careers";
            $result_query = mysqli_query($con,$select_query);
            if($result_query){
                $serial_number=1;
                while($row=mysqli_fetch_assoc($result_query)){
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $email = $row['email'];
                    $contact_number = $row['contact_number'];
                    $alternate_number = $row['alternate_number'];
                    $category = $row['categories'];
                    $cv = $row['cv'];
                    $message = $row['message'];
                    $date = $row['date'];

                    echo '<tr>
                    <td>'. $serial_number .'</td>
                    <td>'. $id .'</td>
                    <td>'. $first_name .'</td>
                    <td>'. $last_name .'</td>
                    <td>'. $email .'</td>
                    <td>'. $contact_number .'</td>
                    <td>'. $alternate_number .'</td>
                    <td>'. $category .'</td>
                    <td><a href="./files/' . $cv . '" alt="cv" target="_blank">view cv</a></td>
                    <td>'. $message .'</td>
                    <td>'. $date .'</td>
                    <td>
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
                document.location.href=`view_career.php?delete_id=${id}`
            }
        }
    </script>


<?php
// session_start();

// // Check if user is not logged in
// if (!isset($_SESSION['username'])) {
//     // Redirect user to the login page
//     header("Location: login.php");
//     exit();
// }

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    // Select query to fetch the file name
    $select_query = "SELECT cv FROM careers WHERE id=$id";
    $result_query = mysqli_query($con, $select_query);

    if($result_query){
        $row = mysqli_fetch_assoc($result_query);
        $cv = $row['cv'];

        $file_path = './includes/files/' . $cv;

        // Check if the file exists before attempting to delete
        if(file_exists($file_path)){
            if(unlink($file_path)){
                // If the file is deleted successfully, proceed to delete from the database
                $delete_query = "DELETE FROM careers WHERE id=$id";
                $result_query = mysqli_query($con, $delete_query);

                if($result_query){
                    echo "<script>alert('Deleted successfully'); window.location.href = 'view_career.php';</script>";
                } else {
                    die(mysqli_error($con));
                }
            } else {
                echo "<script>alert('Error deleting file'); window.location.href = 'view_career.php';</script>";
            }
        } else {
            echo "<script>alert('File not found'); window.location.href = 'view_career.php';</script>";
        }
    } else {
        die(mysqli_error($con));
    }
}
?>
<?php
include('includes/footer.php');

?>