$(function() {
    $(".menu-icon").on("click", function() {
        alert("apres tu comprendras");
    });

    $(window).on("scroll", function() {
        if ($(window).scrollTop()) {
            $("header nav").addClass("black");
        } else {
            $("header nav").removeClass("black");
        }
    });
})