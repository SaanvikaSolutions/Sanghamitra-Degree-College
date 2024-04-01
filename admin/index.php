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
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>course_title</th>
                    <th>program_title</th>
                    <th>Content</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>

                <?php

$select_query = "select * from courses";
$result_query = mysqli_query($con,$select_query);
if($result_query){
    $serial_number = 1;
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['id'];
        $course_title = $row['course_title'];
        $program_title = $row['program_title'];
        $content = $row['content'];
        $duration = $row['Duration'];
        $code = $row['code'];
        
        echo '<tr>
        <td>'. $serial_number .'</td>
        <td>'. $course_title .'</td>
        <td>'. $program_title .'</td>
        <td>'. $content .'</td>
        <td>
        <button class="btn btn-primary"><a href="update_courses.php?update_id='.$id.'" class="text-light">edit</a></button>
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
                document.location.href=`view_courses.php?delete_id=${id}`
            }
        }
    </script>
<?php

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    //Delete courses
    $delete_query = "delete from courses where id=$id";
    $result_query = mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Deleted successfully'); window.location.href = 'view_courses.php';</script>";
    }else{
        die(mysqli_error($con));
    }
}
?>
<?php
include('includes/footer.php');

?>