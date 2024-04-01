$(document).ready(function () {
    let offset= { offset: "70%" }

    $(".vdcabout").waypoint(
        function(){
            $(".vdcabout").addClass(
                "animate__animated animate__fadeInDown"
            );
        },
        offset
    );
    $(".school_vision_tagline").waypoint(
        function(){
            $(".school_vision_tagline").addClass(
                "animate__animated animate__fadeInDown"
            );
        },
        offset
    );
    $(".misson_content").waypoint(
        function(){
            $(".misson_content").addClass(
                "animate__animated animate__fadeInLeft"
            );
        },
        offset
    );
    $(".misson_pic").waypoint(
        function(){
            $(".misson_pic").addClass(
                "animate__animated animate__fadeInRight"
            );
        },
        offset
    );
    $(".vision_content").waypoint(
        function(){
            $(".vision_content").addClass(
                "animate__animated animate__fadeInLeft"
            );
        },
        offset
    );
    $(".vision_pic").waypoint(
        function(){
            $(".vision_pic").addClass(
                "animate__animated animate__fadeInRight"
            );
        },
        offset
    );
    $(".Principal_info").waypoint(
        function(){
            $(".Principal_info").addClass(
                "animate__animated animate__fadeInRight"
            );
        },
        offset
    );   
    $(".Practice_img").waypoint(
        function(){
            $(".Practice_img").addClass(
                "animate__animated animate__fadeInLeft"
            );
        },
        offset
    );   

})

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
    if (list.style.display === "none") {
        list.style.display = "block";
    } else {
        list.style.display = "none";
    }
}

