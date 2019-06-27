$(document).ready(function () {

    $('.promo-package').slick({
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

    $('.single-testimonial').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.more-info-btn').click(function () {
        // var owl = $('.promo-package');
        // owl.trigger('stop.owl.autoplay');
        $('.destination-about').slideDown(450);
        $('html, body').animate({
            scrollTop: $(".destination-about").offset().top - 20
        }, 450);
    });

});

$('.buy-package').click(function () {
    $('.promo-package').slick('setPosition', 0);
});

function myFunction(e) {
    var elems = document.querySelector(".menu-active");
    if (elems !== null) {
        elems.classList.remove("menu-active");
    }
    e.target.className = "nav-link menu-active";
}