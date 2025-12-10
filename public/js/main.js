(function ($) {
    "use strict";
  
    // Preloader
    $(window).on('load', function () {
      if ($('#preloader').length) {
        $('#preloader').delay(100).fadeOut('slow', function () {
          $(this).remove();
        });
      }
    });
  
    // Back to top button
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.back-to-top').fadeIn('slow');
      } else {
        $('.back-to-top').fadeOut('slow');
      }
    });
    $('.back-to-top').click(function(){
      $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
      return false;
    });
  
    // // Whatsapp chat button
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
          $('.whatsapp-chat-').fadeIn('slow');
      } else {
          $('.whatsapp-chat-').fadeOut('slow');
      }
    });
  
      $('.whatsapp-chat-').click(function () {
        window.open(
            'https://wa.me/6281220183537/?text=Halo%20Saya%20Mendapatkan%20informasi%20Dari%20Website%20Untuk%20Melakukan%20Daftar%20Online%0A%0AFormulir%20Konfirmasi%20Peserta%20(Online)%0A%0ANama%20lengkap%20:%20%0ANo%20tlp/wa%20:%20%0ANama%20perusahan%20:%20%0APendidikan%20Terakhir%20:%20%0ALokasi%20Tambang%20Provinsi%20:%20%0AKota%20diklat%20yg%20akan%20diikuti%20:%20%0AMenginap/tidakmenginap%20:%20%0AMerokok/tidak%20merokok%20:%20%0ADiklat%20dan%20Sertifikasi%20yang%20akan%20diikuti%20:%20%0ATanggal%20diklat%20yang%20akan%20diikuti%20:%20',
            '_blank'
        );
        return false;
    });
  
  // // Initial check for buttons
  $(document).ready(function () {
      if ($(window).scrollTop() > 100) {
          $('.back-to-top, .whatsapp-chat-').fadeIn('slow');
      } else {
          $('.back-to-top, .whatsapp-chat-').fadeOut('slow');
      }
  });
  
    // // Whatsapp chat button
    // $(window).scroll(function () {
    //   if ($(this).scrollTop() > 100) {
    //       $('.whatsapp-chat-online').fadeIn('slow');
    //   } else {
    //       $('.whatsapp-chat-online').fadeOut('slow');
    //   }
    // });
  
  $('.whatsapp-chat-online').click(function () {
      window.open(
          'https://wa.me/6281220183537/?text=Halo%20Saya%20Mendapatkan%20informasi%20Dari%20Website%20Untuk%20Melakukan%20Daftar%20Online%0A%0AFormulir%20Konfirmasi%20Peserta%20(Online)%0A%0ANama%20lengkap%20:%20%0ANo%20tlp/wa%20:%20%0ANama%20perusahan%20:%20%0APendidikan%20Terakhir%20:%20%0ALokasi%20Tambang%20Provinsi%20:%20%0ADiklat%20dan%20Sertifikasi%20yang%20akan%20diikuti%20:%20%0ATanggal%20diklat%20yang%20akan%20diikuti%20:%20',
          '_blank'
      );
      return false;
  });
  
    // // Initial check for buttons
    // $(document).ready(function () {
    //     if ($(window).scrollTop() > 100) {
    //         $('.back-to-top, .whatsapp-chat-online').fadeIn('slow');
    //     } else {
    //         $('.back-to-top, .whatsapp-chat-online').fadeOut('slow');
    //     }
    // });
  
    // $(window).scroll(function () {
    //   if ($(this).scrollTop() > 100) {
    //       $('.whatsapp-chat-offline').fadeIn('slow');
    //   } else {
    //       $('.whatsapp-chat-offline').fadeOut('slow');
    //   }
    // });
  
      $('.whatsapp-chat-offline').click(function () {
        window.open(
            'https://wa.me/6281220183537/?text=Halo%20Saya%20Mendapatkan%20informasi%20Dari%20Website%20Untuk%20Melakukan%20Daftar%20Offline%0A%0AFormulir%20Konfirmasi%20Peserta%20(Offline)%0A%0ANama%20lengkap%20:%20%0ANo%20tlp/wa%20:%20%0ANama%20perusahan%20:%20%0APendidikan%20Terakhir%20:%20%0AJenis%20Kelamin%20:%20L%20/%20P%0ALokasi%20Tambang%20Provinsi%20:%20%0AKota%20diklat%20yg%20akan%20diikuti%20:%20%0AMenginap/tidakmenginap%20:%20%0AMerokok/tidak%20merokok%20:%20%0ADiklat%20dan%20Sertifikasi%20yang%20akan%20diikuti%20:%20%0ATanggal%20diklat%20yang%20akan%20diikuti%20:%20',
            '_blank'
        );
        return false;
    });
  
    // // Initial check for buttons
    // $(document).ready(function () {
    //     if ($(window).scrollTop() > 100) {
    //         $('.back-to-top, .whatsapp-chat-offline').fadeIn('slow');
    //     } else {
    //         $('.back-to-top, .whatsapp-chat-offline').fadeOut('slow');
    //     }
    // });
  
  
    // Initiate the wowjs animation library
    new WOW().init();
  
    // Initiate superfish on nav menu
    $('.nav-menu').superfish({
      animation: {
        opacity: 'show'
      },
      speed: 400
    });
  
    // Mobile Navigation
    if ($('#nav-menu-container').length) {
      var $mobile_nav = $('#nav-menu-container').clone().prop({
        id: 'mobile-nav'
      });
      $mobile_nav.find('> ul').attr({
        'class': '',
        'id': ''
      });
      $('body').append($mobile_nav);
      $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
      $('body').append('<div id="mobile-body-overly"></div>');
      $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');
  
      $(document).on('click', '.menu-has-children i', function(e) {
        $(this).next().toggleClass('menu-item-active');
        $(this).nextAll('ul').eq(0).slideToggle();
        $(this).toggleClass("fa-chevron-up fa-chevron-down");
      });
  
      $(document).on('click', '#mobile-nav-toggle', function(e) {
        $('body').toggleClass('mobile-nav-active');
        $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
        $('#mobile-body-overly').toggle();
      });
  
      $(document).click(function(e) {
        var container = $("#mobile-nav, #mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
            $('#mobile-body-overly').fadeOut();
          }
        }
      });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
      $("#mobile-nav, #mobile-nav-toggle").hide();
    }
  
    // Header scroll class and logo change
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
          $('#header').addClass('header-scrolled');
          $('#logo-img').attr('src', '/img/SMB.png'); // Path relatif ke public
      } else {
          $('#header').removeClass('header-scrolled');
          $('#logo-img').attr('src', '/img/SMB_Putih.png'); // Path relatif ke public
      }
    });
  
    // Set logo on page load based on scroll position
    if ($(window).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
      $('#logo-img').attr('src', '/img/SMB.png');
    } else {
      $('#header').removeClass('header-scrolled');
      $('#logo-img').attr('src', '/img/SMB_Putih.png');
    }
  
  
  
    // Smooth scroll for the menu and links with .scrollto classes
    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        if (target.length) {
          var top_space = 0;
  
          if ($('#header').length) {
            top_space = $('#header').outerHeight();
  
            if (! $('#header').hasClass('header-scrolled')) {
              top_space = top_space - 20;
            }
          }
  
          $('html, body').animate({
            scrollTop: target.offset().top - top_space
          }, 1500, 'easeInOutExpo');
  
          if ($(this).parents('.nav-menu').length) {
            $('.nav-menu .menu-active').removeClass('menu-active');
            $(this).closest('li').addClass('menu-active');
          }
  
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
            $('#mobile-body-overly').fadeOut();
          }
          return false;
        }
      }
    });
  
    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, #mobile-nav');
    var main_nav_height = $('#header').outerHeight();
  
    $(window).on('scroll', function () {
      var cur_pos = $(this).scrollTop();
    
      nav_sections.each(function() {
        var top = $(this).offset().top - main_nav_height,
            bottom = top + $(this).outerHeight();
    
        if (cur_pos >= top && cur_pos <= bottom) {
          main_nav.find('li').removeClass('menu-active menu-item-active');
          main_nav.find('a[href="#'+$(this).attr('id')+'"]').parent('li').addClass('menu-active menu-item-active');
        }
      });
    });
  
    // Intro carousel
    var introCarousel = $(".carousel");
    var introCarouselIndicators = $(".carousel-indicators");
    introCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
      (index === 0) ?
      introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "' class='active'></li>") :
      introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "'></li>");
  
      $(this).css("background-image", "url('" + $(this).children('.carousel-background').children('img').attr('src') +"')");
      $(this).children('.carousel-background').remove();
    });
  
    $(".carousel").swipe({
      swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
      },
      allowPageScroll:"vertical"
    });
  
    // Skills section
    $('#skills').waypoint(function() {
      $('.progress .progress-bar').each(function() {
        $(this).css("width", $(this).attr("aria-valuenow") + '%');
      });
    }, { offset: '80%'} );
  
    // jQuery counterUp (used in Facts section)
    $('[data-toggle="counter-up"]').counterUp({
      delay: 10,
      time: 1000
    });
  
    // Porfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item',
      layoutMode: 'fitRows'
    });
  
    $('#portfolio-flters li').on( 'click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');
  
      portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });
  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
      autoplay: true,
      dots: true,
      loop: true,
      margin: 20, // Tambahkan jarak antar item
      responsive: {
          0: { items: 2 }, // Untuk layar kecil
          768: { items: 3 }, // Untuk tablet
          1024: { items: 5 } // Untuk layar besar
      }
  });
  
    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
      autoplay: true,
      dots: true,
      loop: true,
      items: 1
    });
  
  })(jQuery);