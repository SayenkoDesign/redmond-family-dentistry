jQuery(function() {
    jQuery(document).foundation();
    jQuery('.fancybox').fancybox();
    jQuery('.partners-slider').slick({
        arrows: true,
        slidesToShow: 4,
        responsive: [{
            breakpoint: 700,
            settings: {
                slidesToShow: 2
            }
        }]
    });
    jQuery('.reviews-slider').slick({
        slidesToShow: 1
    });
});
