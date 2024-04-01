<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View_aboutus</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body> -->
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
              <li class="breadcrumb-item"><a href="./index.php">About</a></li>
              <li class="breadcrumb-item active">View About</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <div class="table-responsive">
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Id</th>
                    <th>our mission</th>
                    <th>mission image</th>
                    <th>our vision</th>
                    <th>vision image</th>
                    <th>chairman message</th>
                    <th>chairman image</th>
                    <th>correspondent message</th>
                    <th>correspondent image</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
include('./connections/dbconnect.php');

$select_query = "select * from aboutus";
$result_query = mysqli_query($con,$select_query);
if($result_query){
    $serial_number = 1;
    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['id'];
        $our_mission = $row['our_mission'];
        $mission_image = $row['mission_image'];
        $our_vision = $row['our_vision'];
        $vision_image = $row['vision_image'];
        $chairman_message = $row['chairman_message'];
        $chairman_image = $row['chairman_image'];
        $correspondent_message = $row['correspondent_message'];
        $correspondent_image = $row['correspondent_image'];

        
        echo '<tr>
        <td>'. $serial_number .'</td>
        <td>'. $id .'</td>
        <td>'. $our_mission .'</td>
        <td><img src="../images/about/' . $mission_image . '" alt="Employee Image" width="50"></td>
        <td>'. $our_vision .'</td>
        <td><img src="../images/about/' . $vision_image . '" alt="Employee Image" width="50"></td>
        <td>'. $chairman_message .'</td>
        <td><img src="../images/about/' . $chairman_image . '" alt="Employee Image" width="50"></td>
        <td>'. $correspondent_message .'</td>
        <td><img src="../images/about/' . $correspondent_image . '" alt="Employee Image" width="50"></td>
        <td>
        <button class="btn btn-primary"><a href="update_aboutus.php?update_id='.$id.'" class="text-light">edit</a></button>
        </td>
        </tr>';
        $serial_number++;
    }
}
?>
        </table>
    </div>
    </tbody>


    
<?php
include('includes/footer.php');

?>