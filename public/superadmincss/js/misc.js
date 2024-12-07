(function ($) {
  'use strict';
  $(function () {
    var body = $('body');
    var sidebar = $('.sidebar');

    // Logika untuk menambahkan kelas aktif pada elemen berdasarkan URL saat ini
    function addActiveClass(element) {
      var current = location.pathname; // Mendapatkan URL path saat ini
      if (element.attr('href') === current) {
        element.parents('.nav-item').last().addClass('active');
        if (element.parents('.sub-menu').length) {
          element.closest('.collapse').addClass('show'); // Hanya buka dropdown terkait
          element.addClass('active');
        }
      }
    }

    // Iterasi melalui semua link sidebar untuk menambahkan kelas aktif
    $('.nav li a', sidebar).each(function () {
      var $this = $(this);
      addActiveClass($this);
    });

    // Logika untuk menutup dropdown lain ketika satu dibuka
    sidebar.on('show.bs.collapse', '.collapse', function () {
      sidebar.find('.collapse.show').not(this).collapse('hide');
    });

    // Fungsi untuk menampilkan atau menyembunyikan sidebar pada klik toggle
    $('[data-toggle="minimize"]').on("click", function () {
      if (body.hasClass('sidebar-toggle-display') || body.hasClass('sidebar-absolute')) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    // Menambahkan ikon helper pada elemen form checkbox dan radio
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    // Fitur untuk fullscreen
    $("#fullscreen-button").on("click", function toggleFullScreen() {
      if (
        (document.fullscreenElement === null) || 
        (document.msFullscreenElement === null) ||
        (!document.mozFullScreen) || 
        (!document.webkitIsFullScreen)
      ) {
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    });

    // Fitur untuk "Pro Banner"
    if (document.querySelector('#proBanner')) {
      if ($.cookie('corona-free-banner') !== "true") {
        document.querySelector('#proBanner').classList.add('d-flex');
      } else {
        document.querySelector('#proBanner').classList.add('d-none');
      }

      var bannerClose = document.querySelector('#bannerClose');
      if (bannerClose) {
        bannerClose.addEventListener('click', function () {
          document.querySelector('#proBanner').classList.add('d-none');
          document.querySelector('#proBanner').classList.remove('d-flex');
          var date = new Date();
          date.setTime(date.getTime() + 24 * 60 * 60 * 1000); // Set expiration for one day
          $.cookie('corona-free-banner', "true", { expires: date });
        });
      }
    }
  });
})(jQuery);
