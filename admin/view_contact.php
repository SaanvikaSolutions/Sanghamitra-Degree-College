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
              <li class="breadcrumb-item"><a href="./index.php">Contact</a></li>
              <li class="breadcrumb-item active">View Contact</li>
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
                    <th>email</th>
                    <th>subject</th>
                    <th>message</th>
                    <th>date</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
            // include('./includes/connect.php');
            // session_start();

// Check if user is not logged in
// if (!isset($_SESSION['username'])) {
//     // Redirect user to the login page
//     header("Location: login.php");
//     exit();
// }

            $select_query = "select * from contact";
            $result_query = mysqli_query($con,$select_query);
            if($result_query){
                $serial_number=1;
                while($row=mysqli_fetch_assoc($result_query)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $subject = $row['subject'];
                    $message = $row['message'];
                    $date = $row['date'];

                    echo '<tr>
                    <td>'. $serial_number .'</td>
                    <td>'. $id .'</td>
                    <td>'. $name .'</td>
                    <td>'. $email .'</td>
                    <td>'. $subject .'</td>
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
                document.location.href=`view_contact.php?delete_id=${id}`
            }
        }
    </script>

<?php


// Deleting the product
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "delete from contact where id=$id";
    $result_query = mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('sucessfully deleted');window.location.href='view_contact.php';</script>";
    }else{
        die(mysqli_error($con));
    }
}
?>
<?php
include('includes/footer.php');

?>