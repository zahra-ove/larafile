$(document).ready(function() {

    $(".y").click(function() {
        $(".z").hide(500);
    });

    $(".w").click(function() {
        $(".z").toggle(500);
    });
});