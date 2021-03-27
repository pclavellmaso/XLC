jQuery(document).ready(function () {

    /*************************/

    var navbar = jQuery('.navbar');
    var sticky = navbar.offset().top;

    jQuery(document).on('scroll', function () {

        if (window.pageYOffset >= sticky) {
            navbar.addClass("sticky");
        } else {
            navbar.removeClass("sticky");
        }
    });

    /*************************/

    jQuery('.tema_fosc').on('click', function () {

        jQuery("body").css("background-color", "#333");
        jQuery("body, a").css("color", "blanchedalmond");
        jQuery(".tema_fosc, .tema_clar").css("border", "1px solid blanchedalmond");
        jQuery(".footer_flex, .navbar").css("background-color", "#4a4a4a");

    });

    jQuery('.tema_clar').on('click', function () {

        jQuery("body").css("background-color", "blanchedalmond");
        jQuery("body, a").css("color", "black");
        jQuery(".tema_fosc, .tema_clar").css("border", "1px solid #333");
        jQuery(".footer_flex, .navbar").css("background-color", "rgb(248, 222, 183)");

    });

    /*************************/

    jQuery(document).on('click', function () {

        //copiar versio s&c
        jQuery(".usuari").click(function () {
            jQuery(".dialeg_usuari").css('opacity', '1')
        });
        //stop propagation

    });

});