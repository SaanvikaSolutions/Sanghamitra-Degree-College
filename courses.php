<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="icon" href="VDC-LOGO.svg" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <specia-header></specia-header>
    <!-- top section  -->
    <div class="top-bar-section">
        <img src="./images/Courses/background-courses.png" alt="No Image">
        <h1 class="top-bar-heading">
            Courses
        </h1>
    </div> 

    <!-- capsule -  -->
    <div class="capsule">
        <h1>
            Home | Courses
        </h1>
    </div>

    <h1 class="ug-course-heading" id="U.G Courses">U.G Courses</h1>

    <div class="courses-cards">
        <div class="course-flex">

            <?php
                include('./admin/connections/dbconnect.php');
                // include('./vdc-dashboard/function.php');

                $fetct_query = "SELECT * FROM `courses` WHERE course_title in ('B.sc Honors in Computer Science','B.A','B.C.A','BBA (Bachelor of Business Administration)','BBA (RETAIL OPERATIONS)')";
                $result = mysqli_query($con,$fetct_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pgt = $row['program_title'];
                    echo "<div class='ug-courses'>
                            <h1 class='ug-card-heading'>" . $row['program_title'] . "</h1>
                            <div class='ug-courses-small-content'>" . $row['content'] . "</div>
                            <button class='btn-courses'><a href='call-courses.php?page=$pgt'>Learn More...</a></button>
                        </div>";
                }
            ?>

        </div>
        <h1 class="ug-course-heading" id="B.com">B.Com</h1>
        <div class="course-flex">

            <?php
                $fetct_query = "SELECT * FROM `courses` WHERE course_title ='B.Com'";
                $result = mysqli_query($con,$fetct_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pgt = $row['program_title'];
                    echo "<div class='ug-courses'>
                            <h1 class='ug-card-heading'>" . $row['program_title'] . "</h1>
                            <div class='ug-courses-small-content'>" . $row['content'] . "</div>
                            <button class='btn-courses'><a href='call-courses.php?page=$pgt'>Learn More...</a></button>
                        </div>";
                }
            ?>
        </div>
        <h1 class="ug-course-heading" id="B.Sc">B.Sc. (Physical Sciences)</h1>
        <div class="course-flex">

                
            <?php
                $fetct_query = "SELECT * FROM `courses` WHERE course_title ='B.Sc. (Physical sciences)'";
                $result = mysqli_query($con,$fetct_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pgt = $row['program_title'];
                    echo "<div class='ug-courses'>
                            <h1 class='ug-card-heading'>" . $row['program_title'] . "</h1>
                            <div class='ug-courses-small-content'>" . $row['content'] . "</div>
                            <button class='btn-courses'><a href='call-courses.php?page=$pgt'>Learn More...</a></button>
                        </div>";
                }
            ?>
            
        </div>
        <h1 class="ug-course-heading">B.Sc. (life Sciences)</h1>
        <div class="course-flex">
        <?php
                $fetct_query = "SELECT * FROM `courses` WHERE course_title ='B.Sc. (Life Sciences)'";
                $result = mysqli_query($con,$fetct_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pgt = $row['program_title'];
                    echo "<div class='ug-courses'>
                            <h1 class='ug-card-heading'>" . $row['program_title'] . "</h1>
                            <div class='ug-courses-small-content'>" . $row['content'] . "</div>
                            <button class='btn-courses'><a href='call-courses.php?page=$pgt'>Learn More...</a></button>
                        </div>";
                }
            ?>
        </div>
    </div>

    <h1 class="ug-course-heading" id="P.G-Courses">P.G Courses</h1>
    <div class="courses-cards">

        <!-- <h1 class="ug-course-heading" id="U.G Courses">B.Com</h1> -->
        <div class="course-flex">
        <?php

                $fetct_query = "SELECT * FROM `courses` WHERE course_title in ('M.Com.','M.Sc. (Computer Science)')";
                $result = mysqli_query($con,$fetct_query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $pgt = $row['program_title'];
                    echo "<div class='ug-courses'>
                            <h1 class='ug-card-heading'>" . $row['program_title'] . "</h1>
                            <div class='ug-courses-small-content'>" . $row['content'] . "</div>
                            <button class='btn-courses'><a href='call-courses.php?page=$pgt'>Learn More...</a></button>
                        </div>";
                }
            ?>
        </div>
    </div>

    <special-footer></special-footer>

    <script src="./headerFooterManager.js"></script>

</body>

</html>