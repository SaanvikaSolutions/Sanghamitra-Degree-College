<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="VDC-LOGO.svg" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Facilities</title>
    <link rel="stylesheet" href="./css/style.css">

    <!-- facilities css  -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

            /* ----colors  */
            --navigation-background: #f9f9f4;
            --font-color-navigation: #c21c20;
            --nav-hover-backgroung: #bfd0e2;
            --font-color: #ff6900;
            --font-hover-color: #ff7454;
            --nav-hover-backgroung-light: #d0dae6;
            --facilities-font-color: #185c74;
            --black: black;
            --white: white;
        }

        body {
            font-size: 16px;
        }

        #our-Dept-header {
            font-size: 2rem;
            padding: 20px auto;
            margin: 20px auto;
            /* font-weight: 500; */
            text-align: center;
            text-decoration: underline;
            color: var(--facilities-font-color);
            background-color: lightyellow;

        }
        #our-lab-header {
            font-size: 2rem;
            padding: 20px auto;
            margin: 20px auto;
            /* font-weight: 500; */
            text-align: center;
            text-decoration: underline;
            color: darkslateblue;
            background-color: lightyellow;

        }

        .labs {
            margin: 10px 40px;
            padding: 10px;
            /* border: 1px solid black; */
        }

        .labsflex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background-color: var(--navigation-background);

        }

        .labs .labcontent-sub {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* padding: 10px; */
            box-sizing: border-box;
            border: 2px solid darkslateblue;
        }

        .labcontent {
            background-color: rgb(222 217 248 / 83%);
            margin-left: 0px;
            padding-left: 0px;
            min-height: 300px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;

        }
        .labcontent-2{
            background-color: rgb(222 217 248 / 83%);
            margin-left: 0px;
            padding-left: 0px;
            min-height: 300px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;

        }

        .labs .labcontent-sub h1 {
            text-decoration: underline;
            font-size: 1.5rem;
            padding: 10px;
            color: var(--facilities-font-color);
        }

        .labs .labcontent-sub ul {
            padding-left: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .labs .labcontent-sub img {
            width: 100%;
            height: auto;
            object-fit: fill;
        }

        #labs-section{
            width: 90%;
            margin: 10px auto;
        }
        .lab-div{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .lab-div .lab-card{
            width: 30%;
            height: 300px;
            height: auto;
            margin: 20px auto;
            background-color: rgb(222 217 248 / 83%);
            padding: 10px;
            border-radius: 10px;
            border: 2px solid darkslateblue;
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            flex-direction: column;
        }
        .lab-div .lab-card1{
            width: 30%;
            height: 200px;
            height: auto;
            margin: 20px auto;
            background-color: rgb(205 198 243);
            padding: 10px;
            border-radius: 10px;

            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-direction: column;
        }
        .lab-div .lab-card h1{
            padding: 10px;
            color: var(--facilities-font-color);
        }
        .lab-div .lab-card1 h1{
            padding: 10px;
            color: var(--facilities-font-color);
        }

        #our-features-header {
            font-size: 2rem;
            padding: 20px auto;
            margin: 20px auto;
            /* font-weight: 500; */
            text-align: center;
            text-decoration: underline;
            color: var(--facilities-font-color);
            background-color: lightyellow;
            text-transform: uppercase;

        }

        #features-section{
            width: 90%;
            margin: 10px auto;
            
        }
        #features-section .features-div .features-card{
            width: 100%;
            margin: 10px auto;
            padding: 20px;
            background-color: rgb(222 217 248 / 83%);
            text-align: center;
            border-radius: 10px;
            border: 2px solid darkslateblue;

        }
        #features-section .features-div .features-card ul{
            width: 100%;
            margin: 10px auto;
            padding: 10px;
            background-color:rgb(222 217 248 / 83%);
            text-align: left;
            border-radius: 10px;

        }

        /* @media (max-width:900px) {
            .labsflex {
                flex-direction: column;

            }

            .labs .labcontent-sub {
                width: 100%;
            }

        } */
        @media (max-width:1118.9999px) {
            .labsflex {
                flex-direction: column;

            }

            .labs .labcontent-sub {
                width: 100%;
            }

            .labs .labcontent-sub ul {
                padding-bottom: 10px;
            }

            .labcontent {
                border-top-left-radius: 20px;
                border-bottom-left-radius: 0px;
                border-top-right-radius: 20px;

            }
            .labcontent-2 {
                border-top-right-radius: 0px;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;

            }


            .lab-div{
                flex-direction: column;
            }

            .lab-div .lab-card{
                width: 80%;
            }
            .lab-div .lab-card1{
                width: 80%;
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

    <!-- top section  -->
    <div class="top-bar-section">
        <img src="./images/Courses/background-courses.png" alt="No Image">
        <h1 class="top-bar-heading">
            Our Facilities
        </h1>
    </div>


    <!-- our facilities start  -->
    <h1 id="our-Dept-header">OUR Departments</h1>

    <div class="labs labsflex">
        <div class="labcontent-sub labcontent">
            <h1>DEPARTMENT OF LIFE SCIENCE</h1>
            <ul>
                <li><Strong>Global Relevance:</Strong> In today's interconnected world, computer science expertise is
                    essential.</li>
                <li><Strong>Foundational Learning:</Strong> Our curriculum simplifies complex computing concepts for
                    easy comprehension.</li>
                <li><Strong>Expert Faculty:</Strong> Learn from experienced instructors dedicated to making learning
                    accessible.</li>
                <li><Strong>Practical Focus:</Strong> Bridge theory and practice through hands-on projects and
                    real-world applications.</li>
                <li><Strong>Cutting-Edge Resources:</Strong> Access state-of-the-art labs and technology for hands-on
                    learning.</li>
                <li><Strong>Fostering Creativity:</Strong> Encouraging innovation through hackathons, competitions, and
                    research.</li>
                <li><Strong>Career Preparation:</Strong> Prepare for diverse tech careers in software engineering, data
                    analysis, and more.</li>
            </ul>

        </div>
        <div class="labcontent-sub">
            <img src="./images/Facilities/csLab.jpg" alt="No Source">
        </div>
    </div>

    <div class="labs labsflex">
        <div class="labcontent-sub">
            <img src="./images/Facilities/BIO-TECHNOLOGY-LAB.jpg" alt="No Source">
        </div>
        <div class="labcontent-sub labcontent-2">
            <h1>DEPARTMENT OF COMPUTER SCIENCE</h1>
            <ul>
                <li><Strong>Comprehensive Study:</Strong> Dive into the study of living organisms and their functions.</li>
                <li><Strong>Hands-On Learning:</Strong> Engage in practical experiments and research to deepen understanding.</li>
                <li><Strong>Expert Faculty:</Strong> Learn from experienced instructors dedicated to making learning
                    accessible.</li>
                <li><Strong>Interdisciplinary Impact:</Strong> Connects with various fields like health, environment, and agriculture.</li>
                <li><Strong>21st Century Relevance:</Strong> Recognized as a vital sector driving global progress.</li>
                <li><Strong>Fastest Growing Sector: </Strong> Acknowledged by experts and economists worldwide.</li>
                <li><Strong>Career Opportunities:</Strong> Prepare for a range of careers in research, healthcare, and more.</li>
            </ul>
        </div>
    </div>
    <div class="labs labsflex">
        <div class="labcontent-sub labcontent">
            <h1>DEPARTMENT OF PHYSICAL SCIENCE</h1>
            <ul>
                <li><Strong>Comprehensive Understanding:</Strong> Explore the physical world through observation, experimentation, and theory in chemistry, earth sciences, and physics.</li>
                <li><Strong>Commitment to Excellence:</Strong> Our department is dedicated to achieving excellence in both research and teaching.</li>
                <li><Strong>In-depth Learning:</Strong> Students develop specialized knowledge and graduate-level skills, including critical thinking, problem-solving, and active learning.</li>
                <li><Strong>Hands-on Experience:</Strong> Gain practical experience through classroom, laboratory, and field activities, led by experienced faculty members.</li>
                <li><Strong>Diverse Course Offerings:</Strong> Choose from a range of courses including B.Sc, MPC, MPCs, MCCs, MSCs, and MSDs to tailor your academic journey.</li>
            </ul>

        </div>
        <div class="labcontent-sub">
            <img src="./images/Facilities/physical-science-lab.jpg" alt="No Source">
        </div>
    </div>

    <div class="labs labsflex">
        <div class="labcontent-sub">
            <img src="./images/Facilities/BIO-TECHNOLOGY-LAB.jpg" alt="No Source">
        </div>
        <div class="labcontent-sub labcontent-2">
            <h1>DEPARTMENT OF MANAGEMENT</h1>
            <ul>
                <li><Strong>Advancing Management Knowledge:</Strong> Dedicated to enhancing understanding and practice in the field of management.</li>
                <li><Strong>Developing Impactful Leaders:</Strong> Our mission is to nurture leaders who are socially responsible, innovative, and results-oriented.</li>
                <li><Strong>Destination of Choice:</Strong> Aspire to be the preferred destination for students, faculty, organizations, and the community.</li>
                <li><Strong>Cutting-Edge Programs:</Strong> Offering innovative management programs designed to meet the evolving needs of the industry.</li>
                <li><Strong>Focus on Social Responsibility:</Strong> Instilling values of social responsibility and ethical leadership in our students.</li>
                <li><Strong>Current Offering: </Strong> Currently offering a Bachelor of Business Administration (BBA) program with a vibrant community of over 100 students.</li>
            </ul>
        </div>
    </div>

    <div class="labs labsflex">
        <div class="labcontent-sub labcontent">
            <h1>DEPARTMENT OF COMMERCE:</h1>
            <ul>
                <li><Strong>Leading Department:</Strong> One of the largest departments in the college, providing high-quality education.</li>
                <li><Strong>Diverse Offerings:</Strong> Offering B.Com (General), B.Com (Computers), and B.Com (Computer Applications) programs with a current intake of over 300 students.</li>
                <li><Strong>Quality Education:</Strong> Committed to excellence, with well-qualified faculty dedicated to student success.</li>
                <li><Strong>Practical Skills:</Strong> Focused on equipping students with practical and analytical skills essential for the business world.</li>
                <li><Strong>Building Foundations:</Strong> Building a strong foundation of knowledge in various areas of commerce, preparing students for professional success.</li>
                <li><Strong>Promoting Experiential Learning:</Strong> Encouraging experiential learning to develop effective work habits, time management, and self-discipline among students.</li>
            </ul>

        </div>
        <div class="labcontent-sub">
            <img src="./images/Facilities/physical-science-lab.jpg" alt="No Source">
        </div>
    </div>

    <h1 id="our-lab-header">OUR LABS</h1>

    <section id="labs-section">
        <div class="lab-div">
            <div class="lab-card">
                <h1 class="lab-card-heading">PHYSICS LAB</h1>
                <p>The laboratory is equipped with the latest requisite apparatus and advanced measuring instruments to conduct experiments. Five sets of apparatus have been provided for each experiments</p>
            </div>
            <div class="lab-card">
                <h1 class="lab-card-heading">CHEMISTRY LAB</h1>
                <p>We have three Chemistry Labs, Laboratories are fully equipped with balances, electrical water baths, centrifuge machines, conductometers, teaching aids etc.</p>
            </div>
            <div class="lab-card">
                <h1 class="lab-card-heading">MICROBIOLOGY LAB</h1>
                <p>This has two labs with 25 oil immersion microscopes, calorimeters, Autoclave machine, refrigerator, over etc., and has all the facilities to work safely on new bacterial systems.</p>
            </div>
            <div class="lab-card">
                <h1 class="lab-card-heading">BIOCHEMISTRY LAB</h1>
                <p>The Lab has advanced kits required for Bio chemistry tests basides the other equirements. Electron Microscope, PH Meter, Centrifuge tubes, Water baths, Dhona weight balance, Incubators, Micro Pipettes (O.1 ml), Hot Air Oven, Page Electrophoresis Chambers, Chromatography Chambers, Colorimeters, Homogenizers, UV Lamps, Spirit Lamps.</p>
            </div>
            <div class="lab-card">
                <h1 class="lab-card-heading">BIOTECHNOLOGY LAB</h1>
                <p>Our two Bio-Technology labs are fully equipped with advanced instruments including oil immersion microscopes, autoclaves, incubators, PH meters, and conductometers. We also provide explanatory visual aids such as charts and transparencies. With ample space, our labs accommodate workshops, seminars, and demonstrations regularly.</p>
            </div>
            <div class="lab-card">
                <h1 class="lab-card-heading">COMMERCE LAB</h1>
                <p>Commerce lab is clear picture of kind of companies the methods adopted by Companies to secure capital a detailed view of practices adopted by companies and the various accounting policies which will be useful for the students while attending interviews.</p>
            </div>
            <div class="lab-card">
                <h1 class="lab-card-heading">ENGLISH LAB</h1>
                <p>The English lab is provided with advanced computer systems, earphones and multimedia kit. It is very useful in improving the communication skills of the students.</p>
            </div>
        </div>
    </section>

    <h1 id="our-features-header">our salient features</h1>

    <section id="features-section">
        <div class="features-div">
            <div class="features-card">
                <h1 class="feature-card-heading">SEMINAR HALL</h1>
                <ul>
                    <li>Seminar halls provide students with opportunities to attend seminars, enhancing communication skills and gaining expert knowledge.</li>
                    <li>Students presenting in seminars learn to express ideas clearly, supported by examples, fostering confidence and motivation.</li>
                    <li>These halls serve as platforms for exchanging great ideas, improving interpersonal skills, and breaking stage fear.</li>
                    <li>Speaking in seminar halls helps students develop convincing skills, standing out in the crowd and building confidence among peers.</li>
                </ul>
            </div>
            <div class="features-card">
                <h1 class="feature-card-heading">THE LIBRARY</h1>
                <ul>
                    <li>The library boasts a rich collection of over 10,000 books and periodicals.</li>
                    <li>It includes the latest publications in Computer Science and various other subjects.</li>
                    <li>The collection features both Foreign and Indian publications.</li>
                    <li>Journals on Computer Education and Bio Sciences are also available, catering to diverse interests and academic needs.</li>
                </ul>
            </div>
            <div class="features-card">
                <h1 class="feature-card-heading">L.C.D., PROJECTOR FACILITY</h1>
                <ul>
                    <li>Our college offers LCD projectors and audio-visual aids to enhance teaching methodology.</li>
                    <li>These resources facilitate effective education in subjects like computer programming languages, English languages, databases, and video classes across all subjects.</li>
                </ul>
            </div>
            
        </div>
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