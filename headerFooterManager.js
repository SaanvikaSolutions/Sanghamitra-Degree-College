class SpecialHeader extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        <a href="admissions.php"><marquee scrollamount="10">Join us now! Admissions Open at Vanitha Degree College for Women - College Code: 12054. Secure your future today! &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp;  Join us now! Admissions Open at Vanitha Degree College for Women - College Code: 12054. Secure your future today!</marquee></a>
        <header id="top-header">
        <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <img src="Sanghamitra logo.png" alt="VDC">
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="./index.php">Home</a>
            <a href="./Aboutus.php">About Us</a>
            <a href="./courses.php">Courses</a>
            <a href="./facilities.php">Facilities</a>
            <a href="./gallery.php">Gallery</a>
            <a href="./career.php">Career</a>
            <a href="./contact.php">Contact</a>
        </div>
    </div>
        `
    }
}
customElements.define('specia-header',SpecialHeader)

class SpecialIconBar extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        <div class="icon-bar">
        <i class="fa fa-arrow-right arrow" aria-hidden="true"></i>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="google"><i class="fa fa-google"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
    </div>
        `
    }
}

customElements.define('special-icon-bar', SpecialIconBar);

class SpecialFooter extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `<footer class="new_footer_area bg_color">

        <div class="footer_container">
            <div class=" footer-1 footerlogo">
                <img src="Sanghamitra logo.png" alt="">
            </div>
            <div class="footer-1 adderss">
                <h4 class="footerheading">Address</h4>
                <p class="footer-address">Lane Opp. B.J.P. Office & Kukatpally Busstop, Kukatpally, Hyderabad - 500072</p><br>
    
                <a class="footercontent" href="tel:9553955724" class="footertext">95539 55724</a><br>
                <a class="footercontent" href="tel:040-48544098" class="footertext">040-4854 4098</a><br>
                <a class="footercontent" href="#" class="footertext">sanghamitradegreecollege@gmail.com</a>
            </div>
    
            <div class="footer-1 products">
                <h4 class="footerheading">Quick Links</h4>
                <ul class="hidden-list">
                    <li><a class="footercontent" href="./courses.php" class="footertext">Courses </a></li>
                    <li><a class="footercontent" href="./facilities.php" class="footertext"> Facilities</a></li>
                    <li><a class="footercontent" href="./gallery.php" class="footertext"> Gallery</a></li>
                </ul>
            </div>
    
    
            <div class="footer-1 about">
            <h4 class="footerheading">Courses</h4>
            <p class="clickable-element" onclick="toggleList1()"><b>&gt; U.G Courses</b> </p>
            <ul class="hidden-list" id="myList1" style="display: none;">
                <li><a class="footercontent" href="courses.php#U.G Courses">B.A</a></li>
                <li><a class="footercontent" href="courses.php#U.G Courses">B.B.A</a></li>
                <li><a class="footercontent" href="courses.php#B.com">B.Com</a></li>
                <li><a class="footercontent" href="courses.php#B.Sc">B.Sc</a></li>
            </ul>
            
            <div>
                <p class="clickable-element" onclick="toggleList2()"><b>&gt; P.G Courses</b> </p>
                <ul class="hidden-list" id="myList2" style="display: none;">
                    <li><a class="footercontent" href="courses.php#P.G-Courses">M.Com</a></li>
                    <li><a class="footercontent" href="courses.php#P.G-Courses">M.Sc</a></li>
                </ul>
            </div>
        </div>
            <div class="footer-1 gmaps">
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15222.024736210142!2d78.414615!3d17.483334!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb918efc52a855%3A0xb3e0d41dcfaa9a41!2sSanghamitra%20Degree%20and%20PG%20College!5e0!3m2!1sen!2sin!4v1709546796019!5m2!1sen!2sin"
             width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    
        </div>
        <div class="copyright">
            <p>Copyright &copy; <span id="year"></span> <a href="https://saanvikasolutions.com/">Saanvika Software Solutions</a>. All rights reserved.</p>
        </div>
    </footer>
        `
    }
}

customElements.define('special-footer', SpecialFooter);