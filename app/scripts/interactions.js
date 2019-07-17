$(document).ready(function () {

  $('.promo-package').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false,
    dots: true,
    infinite: true,
    speed: 350,
    fade: true,
    cssEase: 'ease-in'
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
    $('.promo-package').slick('slickPause');
    $('.destination-about').slideDown(450);
    $('html, body').animate({
      scrollTop: $(".destination-about").offset().top - 20
    }, 450);
  });

  // Add smooth scroll to anchors
  $("a").on('click', function (event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function () {
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  if ($(".back-to-top").length) {
    var scrollTrigger = 600,
    backToTop = function() {
      var scrollTop = $(window).scrollTop();
      if(scrollTop > scrollTrigger) {
        $(".back-to-top").fadeIn();
      } else {
        $(".back-to-top").fadeOut();
      }
    }

    backToTop();

    $(window).on('scroll', function() {
      backToTop();
    });

    $(".back-to-top").on('click', function() {
      $('html, body').animate({
        scrollTop: 0
      }, 900);
    });    
  }

});
