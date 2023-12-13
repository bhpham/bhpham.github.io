
$(document).ready(function() {

    $('body').scrollspy({
        target: '.navbar-custom',
        offset: 50
    })

    $(document).on('click','.navbar-collapse.in',function(e) {
        if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
            $(this).collapse('hide');
        }
    });

    /* ---------------------------------------------- /*
     * Navbar
    /* ---------------------------------------------- */

    var navbar = $('.navbar');
    var navHeight = navbar.height();

    $(window).scroll(function() {
        if($(this).scrollTop() >= navHeight) {
            navbar.addClass('navbar-color');
        }
        else {
            navbar.removeClass('navbar-color');
        }
    });

    if($(window).width() <= 767) {
        navbar.addClass('custom-collapse');
    }

    $(window).resize(function() {
        if($(this).width() <= 767) {
            navbar.addClass('custom-collapse');
        }
        else {
            navbar.removeClass('custom-collapse');
        }
    });

    $('a[href*=#]').bind("click", function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top
        }, 1000);
        e.preventDefault();
    });


    /*Text Rotator*/
    $(".rotate").textrotator({
        animation: "dissolve", 
        separator: "|", 
        speed: 2000 // How many milliseconds until the next word show.
    });

    /* ---------------------------------------------- /*
     * WOW Animation When You Scroll
    /* ---------------------------------------------- */

    wow = new WOW({
        mobile: false
    });
    new WOW().init();

    /* ---------------------------------------------- /*
     * Owl slider
     /* ---------------------------------------------- */

    $("#owl-clients").owlCarousel({
        items : 4,
        slideSpeed : 300,
        paginationSpeed : 400,
        autoPlay: 5000
    });

    /* ---------------------------------------------- /*
    * Portfolio pop up
    /* ---------------------------------------------- */

    $('#portfolio').magnificPopup({
        delegate: 'a.pop-up',
        type: 'image',  
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1]
        }, image: {
            titleSrc: 'title',
            tError: 'The image could not be loaded.',
        }
    });

    $('.video-pop-up').magnificPopup({
        type: 'iframe'
    });

    /* Mobile-nav 
    $('.js--nav-icon').click(function() {
        var nav = $('.main-nav');

        nav.slideToggle(200);
    });*/

    /* Navigation scroll*/
    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });


    /* Animations on scroll */
    $('.js--wp-1').waypoint(function(direction) {
        $('.js--wp-1').addClass('animated fadeIn');
    }, {
        offset: '50%'
    });

    $('.js--wp-2').waypoint(function(direction) {
        $('.js--wp-2').addClass('animated fadeInUp');
    }, {
        offset: '50%'
    });

    $('.js--wp-3').waypoint(function(direction) {
        $('.js--wp-3').addClass('animated fadeIn');
    }, {
        offset: '50%'
    });

    $('.js--wp-4').waypoint(function(direction) {
        $('.js--wp-4').addClass('animated pulse');
    }, {
        offset: '50%'
    });

    

});

