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
              <li class="breadcrumb-item active">Update Courses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php

$id = $_GET['update_id'];
$fetch = "select * from courses where id=$id";
$result = mysqli_query($con,$fetch);
$row = mysqli_fetch_assoc($result);
$course_title = $row['course_title'];
$program_title = $row['program_title'];
$content = $row['content'];
$duration = $row['Duration'];
$code = $row['code'];


//updating data into database
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $new_course_title = $_POST['course_title'];
    $new_program_title = $_POST['program_title'];
    $new_content = $_POST['content'];
    $new_duration = $_POST['duration'];
    $new_code = $_POST['code'];


    if($course_title!=$new_course_title || $program_title!=$new_program_title || $content!=$new_content || $duration!=$new_duration || $code!=$new_code){

        //update the new image
        $update_query = "update courses set course_title=?, program_title=?, content=?, Duration=?, code=? where id=?";
        $smt_update = mysqli_prepare($con,$update_query);
        mysqli_stmt_bind_param($smt_update,"sssssi", $new_course_title, $new_program_title, $new_content, $new_duration, $new_code, $id);
        //execute the statement
        $result = mysqli_stmt_execute($smt_update);
    
        if($result){
            echo "<script>alert('Updated successfully.'); window.location.href='view_courses.php';</script>";
        }else{
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    }else{
        echo "<script>alert('No values are updated'); window.location.href='view_courses.php';</script>";
    }


}

?>

<div class="container mt-5">
    <form action="" enctype="multipart/form-data" method="POST">
        <div class="form-group">
            <label for="course_title">Course Title:</label>
            <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Enter page title" suggestions="off" value = "<?php echo $course_title; ?>">
        </div>

        <div class="form-group">
            <label for="program_title">Program Title:</label>
            <input type="text" class="form-control" id="program_title" name="program_title" placeholder="Enter page title" value = "<?php echo $program_title; ?>">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" rows="5" name="content" placeholder="Enter content"><?php echo $content; ?></textarea>
        </div>
        <div class="form-group">
            <label for="duration">Duration:</label>
            <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration" value = "<?php echo $duration; ?>">
        </div>

        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Enter code" value = "<?php echo $code; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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