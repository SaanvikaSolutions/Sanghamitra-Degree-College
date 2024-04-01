<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="icon" href="VDC-LOGO.svg" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vdcgallery.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .container-gallery {
            padding: 40px 0px;
        }
    </style>
</head>
<body>

<specia-header></specia-header>
<!-- top section  -->
<div class="top-bar-section">
        <img src="./images/Courses/background-courses.png" alt="No Image">
        <h1 class="top-bar-heading">
            Gallery
        </h1>
    </div>

    <input type="radio" name="photos" id="check1" checked>
    <input type="radio" name="photos" id="check2" >
    <input type="radio" name="photos" id="check3" >
    <input type="radio" name="photos" id="check4" >

    <div class="container-gallery">
        <h1>OUR PHOTO GALLERY</h1>
        <div class="top-content">
            <h3>Photo Gallery</h3>
            <label for="check1">All Photos</label>
            <label for="check2">Events</label>
            <label for="check3">Workshops</label>
            <label for="check4">Annual day</label>

        </div>

        <div class="photo-gallery">
        <?php
            include("./admin/connections/dbconnect.php");

            $gallery_query = "SELECT * FROM `gallery` WHERE `name` = 'Events'";
            $gallery_res = mysqli_query($con,$gallery_query);

            foreach($gallery_res as $row => $header){

            ?>
            <div class="pic Events">
                <img src="./images/gallery/<?=  $header['image']   ?>" alt="">
            </div>
            <?php } ?>
            <?php

            $gallery_query = "SELECT * FROM `gallery` WHERE `name` = 'Workshops'";
            $gallery_res = mysqli_query($con,$gallery_query);

            foreach($gallery_res as $row => $header){

            ?>
            <div class="pic Workshops">
                <img src="./images/gallery/<?=  $header['image']   ?>" alt="">
            </div>

            <?php } ?>
            <?php

            $gallery_query = "SELECT * FROM `gallery` WHERE `name` = 'Annual'";
            $gallery_res = mysqli_query($con,$gallery_query);

            foreach($gallery_res as $row => $header){

            ?>
            <div class="pic Annual">
                <img src="./images/gallery/<?=  $header['image']   ?>" alt="">
            </div>
            <?php } ?>
        </div>

    </div>
    <!-- <special-icon-bar></special-icon-bar> -->
    <div class="icon-bar">
        <i class="fa fa-arrow-right arrow" aria-hidden="true"></i>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="google"><i class="fa fa-google"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>

    <special-footer></special-footer>
    <script src="https://kit.fontawesome.com/b19824e628.js" crossorigin="anonymous"></script>
    <script>
        // var typed = new Typed(".auto-type", {
        //     strings: ["Enquire Now (DOST College Code: 11250)"],
        //     typeSpeed: 50,
        //     backSpeed: 50,
        //     loop: true
        // })
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
    <script src="./js/app.js"></script>
    <script src="./headerFooterManager.js"></script>

</body>
</html>