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
              <li class="breadcrumb-item active">Insert About</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <div class="container mt-5">
    <form action="about_us.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="ourMission">Our Mission</label>
        <input type="text" class="form-control" id="ourMission" name="ourMission">
      </div>
      <div class="form-group">
        <label for="missionImage">Mission Image</label>
        <input type="file" class="form-control-file" id="missionImage" name="missionImage">
      </div>
      <div class="form-group">
        <label for="ourVision">Our Vision</label>
        <input type="text" class="form-control" id="ourVision" name="ourVision">
      </div>
      <div class="form-group">
        <label for="visionImage">Vision Image</label>
        <input type="file" class="form-control-file" id="visionImage" name="visionImage">
      </div>
      <div class="form-group">
        <label for="chairmanMessage">Chairman's Message</label>
        <textarea class="form-control" id="chairmanMessage" name="chairmanMessage" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="chairmanImage">Chairman's Image</label>
        <input type="file" class="form-control-file" id="chairmanImage" name="chairmanImage">
      </div>
      <div class="form-group">
        <label for="correspondentMessage">Correspondent's Message</label>
        <textarea class="form-control" id="correspondentMessage" name="correspondentMessage" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="correspondentImage">Correspondent's Image</label>
        <input type="file" class="form-control-file" id="correspondentImage" name="correspondentImage">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</html>


<?php
include('./connections/dbconnect.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $ourMission = $_POST['ourMission'];
    $ourVision = $_POST['ourVision'];
    $chairmanMessage = $_POST['chairmanMessage'];
    $correspondentMessage = $_POST['correspondentMessage'];

    $missionImage = $_FILES['missionImage']['name'];
    $temp_image1 = $_FILES['missionImage']['tmp_name'];

    $visionImage = $_FILES['visionImage']['name'];
    $temp_image2 = $_FILES['visionImage']['tmp_name'];

    $chairmanImage = $_FILES['chairmanImage']['name'];
    $temp_image3 = $_FILES['chairmanImage']['tmp_name'];

    $correspondentImage = $_FILES['correspondentImage']['name'];
    $temp_image4 = $_FILES['correspondentImage']['tmp_name'];

    //move uploaded file
    move_uploaded_file($temp_image1,"../images/about/$missionImage");
    move_uploaded_file($temp_image2,"../images/about/$visionImage");
    move_uploaded_file($temp_image3,"../images/about/$chairmanImage");
    move_uploaded_file($temp_image4,"../images/about/$correspondentImage");

    //insert query 
    $insert_query = "insert into aboutus(`our_mission`, `mission_image`, `our_vision`, `vision_image`, `chairman_message`, `chairman_image`, `correspondent_message`, `correspondent_image`)
    values(?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($con,$insert_query);

    mysqli_stmt_bind_param($stmt,"ssssssss",$ourMission,$missionImage,$ourVision,$visionImage,$chairmanMessage,$chairmanImage,$correspondentMessage,$correspondentImage);
    $result = mysqli_stmt_execute($stmt);
    if($result){
        echo "<script>alert('inserted successfully.')</script>";
    }else{
        echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
    }


}
?>
<?php
include('includes/footer.php');

?>