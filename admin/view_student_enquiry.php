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
              <li class="breadcrumb-item"><a href="./index.php">Student Enquiry</a></li>
              <li class="breadcrumb-item active">View Student Enquiry</li>
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
                    <th>S.No</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>

                <?php

$select_query = "select * from student_enquiry";
$result_query = mysqli_query($con,$select_query);
if($result_query){
    $serial_number = 1;
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['id'];
        $fname = $row['firstname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $courses = $row['courses'];
        $date = $row['date'];
        
        echo '<tr>
        <td>'. $serial_number .'</td>
        <td>'. $fname .'</td>
        <td>'. $email .'</td>
        <td>'. $phone .'</td>
        <td>'. $courses .'</td>
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
                document.location.href=`view_student_enquiry.php?delete_id=${id}`
            }
        }
    </script>
    <?php
include('includes/footer.php');

?>


<?php
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    //Delete courses
    $delete_query = "delete from student_enquiry where id=$id";
    $result_query = mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Deleted successfully'); window.location.href = './view_student_enquiry.php';</script>";
    }else{
        die(mysqli_error($con));
    }
}
?>