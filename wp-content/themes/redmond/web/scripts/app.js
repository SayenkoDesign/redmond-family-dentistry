jQuery(function() {
    jQuery(document).foundation();
    jQuery('.fancybox').fancybox();
    jQuery('.partners-slider').slick({
        arrows: true,
        slidesToShow: 4,
        responsive: [{
            breakpoint: 700,
            settings: {
                slidesToShow: 1
            },
            breakpoint: 1024,
            settings: {
                slidesToShow: 2
            }
        }]
    });
    jQuery('.reviews-slider').slick({
        slidesToShow: 1,
        dots: true,
        arrows: false
    });
    jQuery('.before-after-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        arrows: false
    });

    jQuery('.header .services').on("click", function(e){
        jQuery(this).children('a').toggleClass("active");
        jQuery('#mega-menu').fadeToggle();
        e.preventDefault();
        return false;
    });

    jQuery('.team-members .member > a.hide-for-small-only').on("click", function(e){
        var elem = jQuery('#' + jQuery(this).attr('data-toggle'));

        // close same menu on second click
        if(elem.is(':visible')) {
            elem.slideToggle();
            e.preventDefault();
            return false;
        }

        // close other visable menus before opening new one
        var visible = jQuery('.member-details .member:visible');
        if(visible.length) {
            visible.slideToggle(function () {
                elem.slideToggle();
            });
            e.preventDefault();
            return false;
        }

        // open new menu
        elem.slideToggle(function(){
            jQuery('html, body').animate({
                scrollTop: elem.offset().top - 200
            }, 2000);
        });
        e.preventDefault();
        return false;
    });

    jQuery('.member-details .member a.close').on("click", function(e){
        jQuery(this).parent('.member').slideToggle();
        e.preventDefault();
        e.defaultPrevented;
        return false;
    })
});
