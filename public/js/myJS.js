$(document).ready(function() {

    $(".y").click(function() {
        $(".z").hide(500);
    });

    $(".w").click(function() {
        $(".z").toggle(500);
    });


    //show/hide password section
    $("#eye_close1").click(function(){
        $("#eye_close1").hide();
        $("#eye_open1").show();

        $('input[name="password"]').attr("type", "text");
    });
    $("#eye_open1").click(function(){
        $("#eye_open1").hide();
        $("#eye_close1").show();

        $('input[name="password"]').attr("type", "password");
    });

    //show/hide password confirmation section
    $("#eye_close2").click(function(){
        $("#eye_close2").hide();
        $("#eye_open2").show();

        $('input[name="password_confirmation"]').attr("type", "text");
    });
    $("#eye_open2").click(function(){
        $("#eye_open2").hide();
        $("#eye_close2").show();

        $('input[name="password_confirmation"]').attr("type", "password");
    });


//carousel
    $('.owl-carousel').owlCarousel({
        rtl: true,
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        stagePadding: 50,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
});




