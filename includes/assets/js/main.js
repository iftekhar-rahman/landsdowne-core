;(function($){
    'use strict';

    var Testimonial = new Swiper(".Testimonial", {
        slidesPerView: 1,
        loop: false,
        centeredSlides: false,
        autoplay: false,
        autoHeight: true,
        // autoplay: {
        //   delay: 3000,
        // },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        fadeEffect: {
          crossFade: true,
        },
      });
    

})(jQuery); // End of use strict