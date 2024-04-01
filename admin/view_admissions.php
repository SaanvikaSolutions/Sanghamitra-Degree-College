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
              <li class="breadcrumb-item"><a href="./index.php">Admissions</a></li>
              <li class="breadcrumb-item active">View Admissions</li>
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
                    <th>id</th>
                    <th>student name</th>
                    <th>father name</th>
                    <th>gender</th>
                    <th>phone_number</th>
                    <th>nationality</th>
                    <th>email</th>
                    <th>course name</th>
                    <th>payment type</th>
                    <th>created date</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
            
            $select_query = "select * from admissions";
            $result_query = mysqli_query($con,$select_query);
            if($result_query){
                $serial_number=1;
                while($row=mysqli_fetch_assoc($result_query)){
                    $id = $row['id'];
                    $student_name = $row['student_name'];
                    $father_name = $row['father_name'];
                    $gender = $row['gender'];
                    $phone_number = $row['phone_number'];
                    $nationality = $row['nationality'];
                    $email = $row['email'];
                    $course_name = $row['course_name'];
                    $payment_type = $row['payment_type'];
                    $created_date = $row['created_date'];

                    echo '<tr>
                    <td>'. $serial_number .'</td>
                    <td>'. $id .'</td>
                    <td>'. $student_name .'</td>
                    <td>'. $father_name .'</td>
                    <td>'. $gender .'</td>
                    <td>'. $phone_number .'</td>
                    <td>'. $nationality .'</td>
                    <td>'. $email .'</td>
                    <td>'. $course_name .'</td>
                    <td>'. $payment_type .'</td>
                    <td>'. $created_date .'</td>
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
                document.location.href=`view_admissions.php?delete_id=${id}`
            }
        }
    </script>
</body>

</html>


<?php
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];

    //delete query 
    $delete_query = "delete from admissions where id=$id";
    $result_query = mysqli_query($con,$delete_query);

    if($result_query){
        echo "<script>alert('Deleted successfully'); window.location.href = 'view_admissions.php';</script>";
        exit();
    }else{
        echo "<script>alert('Error Deleting file.Please try again.'); window.location.href = 'view_admissions.php';</script>";
    }
}
?>
<?php
include('includes/footer.php');

?>