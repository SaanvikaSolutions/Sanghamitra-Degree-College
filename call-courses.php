<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="VDC-LOGO.svg" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Courses</title>

    <!-- courses section in courses page  -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

            /* ----colors  */
            --font-hover-color: #ff7454;
            --navigation-background: #f9f9f4;
            --font-color-navigation: #c21c20;
            --nav-hover-backgroung-light: #d0dae6;
            --black: black;
            --white: white;
            --font-color: #ff6900;
        }

        body {
            font-family: Poppins;
            /* font-family: 'Jost', sans-serif; */
            font-weight: 400;
            font-style: normal;
            font-size: 16px;
            background-color: var(--white);
        }

        .capsule {
            display: block;
            text-align: center;
            margin: 10px auto;
            padding: 5px;
            background-color: var(--font-hover-color);
            border-radius: 50px;
        }

        .courses h1 {
            font-family: 'Jost', sans-serif;
            text-align: center;
            color: var(--font-color);
            text-decoration: underline;
            margin: 10px;
            padding: 5px;

        }

        .capsule h1 {
            color: var(--white);
        }

        .courses-section-heading {
            padding: 5px;
            /* box-shadow: 0 0 0 5px grey; */
            border-radius: 10px;
            box-shadow: 0 0 2px 2px grey;
            /* with blur shadow*/
            width: 90%;
            margin: 10px auto;
        }

        .courses-section-heading ul {
            margin: 20px;
        }

        .courses-section-heading ol {
            margin: 20px;
        }

        .courses-section-heading h1,
        h2,
        h3 {
            font-family: 'Jost', sans-serif;
            margin: 20px 0px;
            color: var(--font-color);
            text-decoration: underline;
        }

        .courses-section-heading p {
            font-family: 'Times New Roman', Times, serif;
            font-weight: 300;
            margin: 10px;
        }

        .course-table h1 {
            margin: 10px;
            padding: 5px;
            color: var(--font-color);
        }

        .course-table .table-heaings{
            width: 90%;
            margin: 10px auto;
        }

        .course-table .table-heaings table {
            width: 100%;
        }

        .course-table .table-heaings table tr th {
            background-color: var(--font-color);
            color: var(--black);
            width: 30%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
        }

        .course-table .table-heaings table tr td {
            /* background-color: var(--font-color); */
            color: var(--black);
            width: 30%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
        }

        .course-forms form {
            margin: 10px auto;
            width: 90%;
        }

        .course-forms form .form-input-tags input {
            color: var(--black);
            width: 33%;
            /* margin: 10px 0px; */
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
        }
        .course-forms form textarea {
            color: var(--black);
            width: 100%;
            /* margin: 10px 0px; */
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
        }
        .course-forms form input[type="submit"] {
            background-color: var(--font-color);
            color: var(--white);
            padding: 10px;
            border-radius: 10px;
            width: 100px;
        }

        @media (max-width:900px) {
            .course-forms form .form-input-tags input {
                width: 99%;
                margin: 10px auto;
            }

        }
    </style>
</head>

<body>
    <!-- including header  -->
    <specia-header></specia-header>

    <!-- including social bar  -->
    <!-- <special-icon-bar></special-icon-bar> -->
    <div class="icon-bar">
        <i class="fa fa-arrow-right arrow" aria-hidden="true"></i>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="google"><i class="fa fa-google"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>

    <?php
    include("./admin/connections/dbconnect.php");
    include("./admin/connections/function.php");
    $new = $_GET['page'];
    // $new = "B.C.A";
    $header_details = executeSelect('courses',$new);
    ?>
    <!-- top section  -->
    <div class="top-bar-section">
        <img src="./images/Courses/background-courses.png" alt="No Image">
        <h1 class="top-bar-heading">
            Courses
        </h1>
    </div>

    <!-- courses section in courses page  -->
    <section class="courses">

        <?php foreach($header_details as $row => $header){?>

        <div class="capsule">
            <h1>
                Home |
                <?=$header['program_title']?>
            </h1>
        </div>
        <h1>
            Course Overview
        </h1>
        <div class="courses-section-heading">
            <?=$header['content']?>


        </div>
        

        <div class="course-table">
            <h1>Study Options:</h1>
            <div class="table-heaings">
                <table>
                    <tr>
                        <th>Qualification</th>
                        <th>Period</th>
                        <th>College Code</th>
                    </tr>
                    <tr>
                        <td><?=$header['program_title']?></td>
                        <td><?=$header['Duration']?></td>
                        <td><?=$header['code']?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php } ?>

        <!-- <div class="course-forms">
            <form action="">
                <div class="form-input-tags">
                    <label for="firstname"><input type="text" name="firstname" placeholder="First Name"></label>
                    <label for="Email"><input type="text" name="Email" placeholder="Your Email"></label>
                    <label for="Phone"><input type="text" name="Phone" placeholder="Phone No"></label>
                </div>
                <br>
                <label for="message">Message:</label><textarea id="message" name="message" rows="4" required></textarea>
                <br>

                <input type="submit" value="Submit">


            </form>
        </div> -->


    </section>

    <special-footer></special-footer>

    <script src="https://kit.fontawesome.com/b19824e628.js" crossorigin="anonymous"></script>
    <script>
        let arrow = document.querySelector('.arrow');
        let anchorAll1 = document.querySelector('.facebook');
        let anchorAll2 = document.querySelector('.twitter');
        let anchorAll3 = document.querySelector('.google');
        let anchorAll4 = document.querySelector('.linkedin');
        let anchorAll5 = document.querySelector('.youtube');

        arrow.addEventListener('click', () => {
            anchorAll1.classList.toggle('block');
            anchorAll2.classList.toggle('block');
            anchorAll3.classList.toggle('block');
            anchorAll4.classList.toggle('block');
            anchorAll5.classList.toggle('block');
        })

    </script>
    <script src="./headerFooterManager.js"></script>
    <script src="./js/app.js"></script>

</body>

</html>