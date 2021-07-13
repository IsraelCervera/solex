(function ($) {

  "use strict";

  jQuery(document).ready(function ($) {

    //*~-~-~- Preloader Js ~-~-~- */
    $(window).on("load", function () {
      $('.spinner').fadeOut();
      $('.preloader-area').delay(350).fadeOut('slow');
    });

    // meanmenu
    jQuery("#mobile-menu").meanmenu({
      meanMenuContainer: ".mobile-menu",
      meanScreenWidth: "991"
    });
    
    //Homepage carousel
    $('.welcome-slider-area').owlCarousel({
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        navigation: true,
        loop: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsiveClass: true,
        nav: true,
        autoplayTimeout: 5000,
        navText: ['<i class="flaticon-left"></i>', '<i class="flaticon-arrow"></i>'],
        autoplay: false,
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
    //Team carousel
    $('.slider-active').owlCarousel({
      dots: true,
      mouseDrag: true,
      touchDrag: true,
      navigation: true,
      loop: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      responsiveClass: true,
      nav: false,
      autoplayTimeout: 5000,
      navText: ['<i class="flaticon-left"></i>', '<i class="flaticon-arrow"></i>'],
      autoplay: false,
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

    $('.testimonial-slider').owlCarousel({
        dots: true,
        mouseDrag: true,
        touchDrag: true,
        navigation: true,
        loop: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsiveClass: true,
        nav: true,
        autoplayTimeout: 5000,
        navText: ['<i class="flaticon-left"></i>', '<i class="flaticon-arrow"></i>'],
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            }
        }
    });

    $(".portfolio").imagesLoaded(function() {
        var grid = $(".grid").isotope({
            itemSelector: ".grid-item",
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: ".grid-item"
            }
        });

        $(".portfolio-menu").on("click", "button", function() {
            var filterValue = $(this).attr("data-filter");
            grid.isotope({ filter: filterValue });
        });

        //for portfolio menu active class
        $(".portfolio-menu button").on("click", function(event) {
            $(this)
                .siblings(".active")
                .removeClass("active");
            $(this).addClass("active");
            event.preventDefault();
        });
    });

    //magnific popup video
    $('.video-play-btn').magnificPopup({
        type: 'video',
    });


    // counterUp
    $('.counter').counterUp();

    // Search Animation
    $('.search-icon').on('click', function () {
        $('.rapti-nav').addClass('fadeOutUp');
        $('.search-form-wrap').addClass('d-block');
    });
    $('.close-btn').on('click', function () {
        $('.rapti-nav').removeClass('fadeOutUp');
        $('.search-form-wrap').removeClass('d-block');
    });
  
    // Header Sticky
    $(window).on('scroll',function() {
      if ($(this).scrollTop() > 120){  
        $('.header-bottom').addClass("is-sticky");
      }
      else{
        $('.header-bottom').removeClass("is-sticky");
      }
    });
  
    // Go to Top
    $(function(){
      // Scroll Event
      $(window).on('scroll', function(){
        var scrolled = $(window).scrollTop();
        if (scrolled > 600) $('.go-top').addClass('active');
        if (scrolled < 600) $('.go-top').removeClass('active');
      });  
      // Click Event
      $('.go-top').on('click', function() {
        $("html, body").animate({ scrollTop: "0" },  500);
      });
    });

  });

})(jQuery);