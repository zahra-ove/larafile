$(document).ready(function() {


//SweetAlert2 Toast
// const Toast = Swal.mixin({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 1000
// });
//

// ---------------------- START user profile -------------------------------//
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
// ----------------------- END user profile------------------------------//

//------------------------- START of carousel ---------------------------//
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
//------------------------- END of carousel ---------------------------//



//------------------------- START of star rating plugin ---------------------------//
    var rateType = $('#info').data("type");
    var rateId = $('#info').data("id");

$("#rateyo").rateYo({
    // rating: 3.6,
    rating: $("#avgrate").data('avg'),
    starWidth: "20px",
    onSet: function (rating, rateYoInstance) {
        // console.log(rating);
        // console.log(rateType);
        // console.log(rateId);

        sendRating(rating, rateType, rateId);
    }
});




//functions defined for star rating system
function sendRating(rate, type, id)
{


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ratings',
        method: "POST",
        data:
            {
                'rateNum' : rate,
                'rateType': type,
                'id': id
            },
        success: function(data)
        {


            var countRate = data.countRate;
            var avgRate   = data.avgRate;
            var message   = data.message;
            var userRate   = data.userRate;

            if(typeof(countRate) != "undefined" && countRate !== null) {
                console.log(avgRate);
                $('#avgrate').html(`${avgRate} ستاره`);
                $('#countrate').html(`${countRate} رای`);
                $('#userRate').html(`${userRate} ستاره`);
            }

            // Toast.fire({
            //     type: 'success',
            //     title: message
            // });
        },
        error: function(data)
        {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });

}

//------------------------- END of star rating plugin ---------------------------//


});  //end of DOM
