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
              <li class="breadcrumb-item"><a href="./index.php">Courses</a></li>
              <li class="breadcrumb-item active">Insert Courses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php
// session_start();

// // Check if user is not logged in
// if (!isset($_SESSION['username'])) {
//     // Redirect user to the login page
//     header("Location: login.php");
//     exit();
// }
include('./connections/dbconnect.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $course_title = $_POST['course_title'];
    $program_title = $_POST['program_title'];
    $content = $_POST['content'];
    $duration = $_POST['duration'];
    $code = $_POST['code'];

    if($course_title=='' || $program_title=='' || $content=='' || $duration=='' || $code==''){
        echo "<script>alert('please fill the details correctly')</script>";
    }else{

        //insert query
        $insert_query = "insert into courses(course_title,program_title,content,Duration,code)
        values(?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con,$insert_query);

        mysqli_stmt_bind_param($stmt,"sssss", $course_title,$program_title,$content,$duration,$code);
        $result_query = mysqli_stmt_execute($stmt);
        if($result_query){
            echo "<script>alert('inserted successfully.')</script>";
        }else{
            echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
        }
    }
    

}
?>


<div class="container mt-5">
    <form action="courses.php" enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <label for="course_title">Course Title:</label>
            <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Enter page title" suggestions="off">
        </div>

        <div class="form-group">
            <label for="program_title">Program Title:</label>
            <input type="text" class="form-control" id="program_title" name="program_title" placeholder="Enter page title">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" rows="5" name="content" placeholder="Enter content"></textarea>
        </div>
        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration">
        </div>

        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Enter code">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<!-- CKEditor Script -->
<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedlist', 'outdent', 'indent', 'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo']
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?php
include('includes/footer.php');

?>