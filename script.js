document.addEventListener('DOMContentLoaded', (event) => {
  var players = [];
  var swiper = new Swiper(".swiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 200,
      modifier: 1,
      slideShadows: true
    },
    keyboard: {
      enabled: true
    },
    mousewheel: {
      enabled: true,
      sensitivity: 1
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    breakpoints: {
      640: {
        slidesPerView: 1
      },
      768: {
        slidesPerView: 1
      },
      1024: {
        slidesPerView: 2 
      },
      1560: {
        slidesPerView: 2
      }
    },
  });
  var navbar = document.getElementById('navbar');

  var prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
  window.onscroll = function() {
    var currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
    if (prevScrollPos > currentScrollPos) {
      navbar.style.opacity = 0;
      navbar.style.top = "-60px";
    } else {
      navbar.style.opacity = 0.7;
      navbar.style.top = "0";
    }
    prevScrollPos = currentScrollPos;
  };
});


