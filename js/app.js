// copyrights js

window.onload = function() {
    const currentYear = new Date().getFullYear();
    document.getElementById('year').textContent = currentYear;
};

// navbar js 
var index_value = 1;

        function slideShow() {
            var x = 0;
            setTimeout(slideShow, 2500); // Call slideShow function recursively every 2500 milliseconds
            const slide_img = document.querySelectorAll(".slid-img");

            for (x = 0; x < slide_img.length; x++) {
                slide_img[x].style.display = "none";
            }
            
            index_value++;
            if (index_value > slide_img.length) {
                index_value = 1;
            }
            if (index_value < 1) {
                index_value = slide_img.length;
            }
            
            slide_img[index_value - 1].style.display = "block";
        }
        

        // Start the slideshow when the page loads
        slideShow();

        // Function to move slide left or right
        function moveSlide(n) {
            index_value += n;
            slideShow();
        }
// navbar js end 

//slider home page js 
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
    showSlides(slideIndex += n);
}
function currentSlide(n) {
    showSlides(slideIndex = n);
}
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
// Auto Slide   if you need auto slide ,remove the commit "//"
var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
   var slides = document.getElementsByClassName("mySlides");
   for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
   }
   slideIndex++;
   if (slideIndex > slides.length) { slideIndex = 1 }
   slides[slideIndex - 1].style.display = "block";
   setTimeout(showSlides, 2000); // Change image every 2 seconds
}

// silder homepage ending 

// footer toggle js 
function toggleList1() {
    var list = document.getElementById("myList1");
    if (list.style.display === "none") {
        list.style.display = "block";
    } else {
        list.style.display = "none";
    }
}

function toggleList2() {
    var list = document.getElementById("myList2");
    if (list.style.display === "block") {
        list.style.display = "none";
    } else {
        list.style.display = "block";
    }
}

// footer toggel end 



// sidebar toggle js 
// let arrow = document.querySelector('.arrow');
// let anchorAll1 = document.querySelector('.facebook');
// let anchorAll2 = document.querySelector('.twitter');
// let anchorAll3 = document.querySelector('.google');
// let anchorAll4 = document.querySelector('.linkedin');
// let anchorAll5 = document.querySelector('.youtube');

// arrow.addEventListener('click', ()=>{
//     anchorAll1.classList.toggle('block');
//     anchorAll2.classList.toggle('block');
//     anchorAll3.classList.toggle('block');
//     anchorAll4.classList.toggle('block');
//     anchorAll5.classList.toggle('block');

// })

// sidebar toggle end 


