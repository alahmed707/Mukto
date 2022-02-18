$(function ($) {
    "use strict";

    jQuery(document).ready(function () {
       
    //   magnific popup activation
    $('.video-play-btn, .video-play-btn2, .play-video').magnificPopup({
        type: 'video'
    });
    $('.img-popup').magnificPopup({
        type: 'image'
    });
    
    // Serch option toggle
    $('.web-serch').on('click', function(){
        $('.search-form-area-mobile').toggleClass('open');
    });

    // featured-causes-slider
    var $featured_causes_slider_two = $('.featured-causes-slider-two');
    $featured_causes_slider_two.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: false,
        margin: 30,
        autoplayTimeout: 6000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            }
        }
    });

    // featured-causes-slider
    var $featured_causes_slider = $('.featured-causes-slider');
    $featured_causes_slider.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: false,
        margin: 0,
        autoplayTimeout: 6000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            993: {
                items: 3
            },
            1200: {
                items: 3
            },
            1400: {
                items: 4
            }
        }
    });

    // event-slider
    var $event_slider = $('.event-slider');
    $event_slider.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: false,
        margin: 30,
        autoplayTimeout: 6000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });

    // team-slider
    var $team_slider = $('.team-slider');
    $team_slider.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: false,
        margin: 30,
        autoplayTimeout: 6000,
        smartSpeed: 1000,
        center: false,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            993: {
                items: 3
            },
            1200: {
                items: 4
            },
            1400: {
                items: 5
            }
        }
    });
 
    // testimonial-slider
    var $testimonial_slider = $('.testimonial-slider');
    $testimonial_slider.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: false,
        margin: 30,
        autoplayTimeout: 6000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            960: {
                items: 2
            },
            1200: {
                items: 2
            },
            1400: {
                items: 3
            }
        }
    });
 
    // blog-slider
    var $blog_slider = $('.blog-slider');
    $blog_slider.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: false,
        margin: 30,
        autoplayTimeout: 6000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            },
            1400: {
                items: 3
            }
        }
    });
 

});















    $(document).on('click', '.cart-remove', function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });

    $('#carticon').on('click', function () {
        $('.my-dropdown-menu').toggleClass('show');
    });


    /*-- back to top --*/
    $(document).on('click', '.bottomtotop', function () {
        $("html,body").animate({
            scrollTop: 0
        }, 2000);
    });

    //define variable for store last scrolltop
    var lastScrollTop = '';
    $(window).on('scroll', function () {
        var $window = $(window);
        if ($window.scrollTop( ) > 0 ) {
            $(".mainmenu-area").addClass('nav-fixed');
        } else {
            $(".mainmenu-area").removeClass('nav-fixed');
        }

        /*---------------------------
            back to top show / hide
        ---------------------------*/
        var st = $(this).scrollTop();
        var ScrollTop = $('.bottomtotop');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }
        lastScrollTop = st;

    });

    $(window).on('load', function () {
  
    /*---------------------
        Preloader
    -----------------------*/
    var backtoTop = $('.back-to-top')
    /*-----------------------------
        back to top
    -----------------------------*/
    var backtoTop = $('.bottomtotop')
    backtoTop.fadeOut(100);
    });


$('.donateBtn').on('click',function(e){
    e.preventDefault();
    window.location = $(this).attr('data-href');
});



});

// Tawk.to Section

if(gs.is_talkto == 1)
{
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/'+ gs.talkto +'/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
}


// Tawk.to Section Ends

    // LOADER
    if(gs.is_loader == 1)
    {
      $(window).on("load", function (e) {
        setTimeout(function(){
            $('#preloader').fadeOut(500);
          },100)
      });
    }

  // LOADER ENDS