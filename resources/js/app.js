//
import "bootstrap/dist/js/bootstrap";
import Swiper from "swiper/bundle";
import "./main";


// SWIPER HOME
var swiper = new Swiper('.mySwiper', {
    spaceBetween: 30,

    loop: true,

    speed: 1200,

    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        // Mobile piccoli
        0: {
            slidesPerView: 1,
            spaceBetween: 15
        },

        // Tablet
        768: {
            slidesPerView: 2,
            spaceBetween: 20
        },

        // Desktop
        1200: {
            slidesPerView: 3,
            spaceBetween: 30
        },

    }
});
// SWIPER SHOW
 var swiper3 = new Swiper('.mySwiper3', {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper('.mySwiper2', {
        loop: true,
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        thumbs: {
          swiper: swiper3,
        },
      });

