$(document).ready(function () {
  jQuery.fn.exists = function () { return this.length > 0; }

  // Start Prelader
  if ($('.preloader').length) {
    $('.preloader').delay(100).fadeOut(300);
  }
  // End Preloader

  // Start header fix on scroll
  $(function () {
    var topbarHeight = $(".top-bar").innerHeight();
    $(window).scroll(function () {
      var scroll = getCurrentScroll();
      if (scroll >= topbarHeight) {
        $('.sina-nav').addClass('fixed-top');
      }
      else {
        $('.sina-nav').removeClass('fixed-top');
      }
    });
    function getCurrentScroll() {
      return window.pageYOffset || document.documentElement.scrollTop;
    }
  });
  // End header fix on scroll

  // Start scroll to top

  // End scroll to top


  // Start Home Slider
  if ($('#home-slider').exists()) {
    var homeSlider = $('#home-slider');
    homeSlider.owlCarousel({
      loop: true,
      items: 1,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 6000,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      navText: ['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>', '<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'],
    });

    homeSlider.on("translate.owl.carousel", function (event) {
      $('.owl-item .item-caption h3').removeClass('animated flipInX delay-1s').hide();
    })

    homeSlider.on("translated.owl.carousel", function (event) {
      $('.owl-item.active').not('.cloned').find('.item-caption h3').addClass('animated flipInX delay-1s').show();
    })
  }
  // End Home 

  // Start Home slider height
  if ($('#home-slider').exists()) {
    var slideHeight = $('#home-slider .item').height();
    var windowHeight = $(window).height();
    var headerHeight = $("header").height();
    var sliderMaxHeight = windowHeight - headerHeight;

    if (slideHeight != windowHeight) {
      $("#home-slider .item").css("max-height", sliderMaxHeight);
    }
  }
  // End Home slider height

  // Start Featured tours slider
  if ($('#featured-tours-slider').exists()) {
    var featuredToursSlider = $('#featured-tours-slider');
    featuredToursSlider.owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
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
          items: 4
        }
      }
    })
    $('#featuredNextBtn').click(function () {
      featuredToursSlider.trigger('next.owl.carousel', [500]);
    })
    $('#featuredPrevBtn').click(function () {
      featuredToursSlider.trigger('prev.owl.carousel', [500]);
    })
  }
  // End Featured tours slider

  // Start Testimonial Slider
  if ($('#testimonial-slider').exists()) {
    var clientSlider = $('#testimonial-slider');
    clientSlider.owlCarousel({
      loop: true,
      items: 1,
      nav: true,
      dots: false,
      autoplay: true,
      autoHeight: true,
      autoplayTimeout: 6000,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      navText: ['<i class="fa fa-angle-left fa-2x fa-fw" aria-hidden="true"></i>', '<i class="fa fa-angle-right fa-2x fa-fw" aria-hidden="true"></i>'],
    });
  }
  // End Testimonial Slider

  // Start reviews gallery
  if ($('#reviews-fancy').exists()) {
    $('[data-fancybox="reviews"]').fancybox({
      toolbar: "auto",
      buttons: [
        "zoom",
        "fullScreen",
        "close"
      ],
      fullScreen: {
        autoStart: true
      },
      transitionEffect: "rotate"
    });
  }
  // End reviews gallery

  // Start Single tour map
  if ($('.single-map-section').exists()) {
    $('.maps').click(function () {
      $('.maps iframe').css("pointer-events", "auto");
    });

    $(".maps").mouseleave(function () {
      $('.maps iframe').css("pointer-events", "none");
    });
  }
  // End Single tour map

  // Start Hide CF7 succuess message
  if ($('.wpcf7-response-output').exists()) {
    var delay_time = '4000',
      effect = 'slideUp', // fadeOut, slideUp
      speed = '3000';
    jQuery(document).on("ajaxComplete", function () {
      jQuery('.wpcf7-mail-sent-ok').delay(delay_time)[effect](speed);
      // jQuery('.wpcf7-mail-sent-ok').delay(2000).fadeOut(1500);
    });
  }
  // End Hide CF7 succuess message

  if (jQuery('.wpcf7-form').length) {
    var astx_label_class = 'form-check-label',
      astx_input_class = 'form-check-input',
      astx_parent_class = 'form-check';

    $('.wpcf7-form input[type=checkbox], .wpcf7-form input[type=radio]').each(function () {
      var element = $(this),
        parent = element.closest('.wpcf7-list-item');
      element.addClass(astx_input_class);
      parent.addClass(astx_parent_class);
      if (astx_label_class)
        parent.find('wpcf7-list-item-label').addClass(astx_label_class);
    });
  }

});

// Start preloader
// $(window).on('load', function () {
//   if ($('.preloader').length) {
//     $('.preloader').delay(200).fadeOut(500);
//   }
// });
  // End preloader