jQuery(document).ready(function() {
    jQuery(document).ready(function() {
        // slick carousel
        jQuery('.slider').slick({
            dots: false,
            vertical: true,
            slidesToShow: 2,
            autoplay: true,
            slidesToScroll: 1,
            arrows: false,
            verticalSwiping: true,
        });
    });


    jQuery(".button_menu").click(function() {
        jQuery(".menu").stop(100).slideToggle(300, function() {});

    });


});
