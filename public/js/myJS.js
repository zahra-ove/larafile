$(document).ready(function() {

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
    // $('.owl-carousel').owlCarousel({
    $('#owl-one').owlCarousel({
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
    });
//------------------------- END of carousel ---------------------------//
$('#owl-two').owlCarousel({
    rtl: true,
    loop: true,
    margin: 50,
    nav: false,
    dots: true,
    stagePadding: 0,
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
});


//------------------------- START of star rating plugin ---------------------------//

//SweetAlert2 Toast
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })


var rateType = $('#info').data("type");
var rateId = $('#info').data("id");

$("#rateyo").rateYo({
    // rating: 3.6,
    rating: $("#avgrate").data('avg'),
    starWidth: "20px",
    onSet: function (rating, rateYoInstance) {
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

                //showing message as sweetalert

                Toast.fire({
                    icon: 'success',
                    title: message
                });
                // Swal.fire({
                //     icon: 'success',
                //     title: 'تبریک!',
                //     text: message,
                //   });
            }
            else   //calling sweetalert for display related message
            {
                Swal.fire({
                    icon: 'warning',
                    title: 'متاسفم!',
                    text: message,
                    footer: '<pre><a href="/register">ثبت نام</a>    <a href="/login">ورود</a></pre>',
                    showClass: {
                      popup: 'animated fadeInDown faster'
                    },
                    hideClass: {
                      popup: 'animated fadeOutUp faster'
                    }
                  });
            }

        },
        error: function(data)
        {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });

}

// -------------------------------- rating for each product in shop page ----------------------------//
$(".test").each(function(){
    $x = $(this).find('.info').data('avg');
    console.log($x);
    console.log("  ");

    $(".rateyo2").rateYo({
        // rating: 3.6,
        rating: $(this).find('.info').data('avg'),
        starWidth: "15px",
    });
});

//----------------------------- add to cart action by ajax    -----------------------------------------//

$('#fileAdd2Cart').on('click', function(e){
    e.preventDefault();
    const type = 'file';
    const id = $(this).data("id");

    addingItem(type, id);   //adding item to the cart by ajax
    cartCount();   // retrieving number of items in the cart

});

// function for adding item to the cart
function addingItem(type, id)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/add-to-cart',
        method: "POST",
        data:
            {
                'type' : type,
                'id': id,
            },
        success: function(data)
        {
            var message   = data.message;
            console.log(message);

            Toast.fire({
                icon: 'success',
                title: message
            });
        },
        error: function(data)
        {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });
}

//retrieving number of items added to the cart
function cartCount()
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/cart-count',
        method: "GET",

        success: function(data)
        {
            var cartCount = data.cartCount;
            $('.cartNum').attr('data-count', cartCount);
        },
        error: function(data)
        {
            var errors = data.responseJSON;
            console.log(errors);
        }
    });
}
//-----------------------------End  add to cart action by ajax    -----------------------------------------//


});  //end of DOM
