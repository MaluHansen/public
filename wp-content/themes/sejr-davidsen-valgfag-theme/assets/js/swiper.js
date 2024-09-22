// Dokumentation kan findes: https://swiperjs.com/


// Ny Swiper slider 
var swiper = new Swiper(".mySwiper", {
  // Viser 4 cards per slide
  slidesPerView: 4,
  
  // Afstanden mellem cards 10px
  spaceBetween: 10,
  
  // Flytter 1 card pr slide
  slidesPerGroup: 1,
  
  // Sætter slideren til at køre i loop
  loop: true,

  // Kører med autoplay
  autoplay: {
    // 2500 ms
    delay: 2500, 
    // Slideren stoppe når musen hover over
    pauseOnMouseEnter: true, 
    // slideren kører fremad
    reverseDirection: false, 
  },
  
  //  Hastighed mellem slides 2000 ms
  speed: 2000,

  // knapper til næste og forrige slide
  navigation: {
    nextEl: ".swiper-button-next", 
    prevEl: ".swiper-button-prev", 
  },

  // Pagination (knapper under slider)
  pagination: {
    el: ".swiper-pagination", // Angiver elementet for pagination
    clickable: true, 
  },
});

// Begrænser max antal slides til 10 på slideren
var swiperWrapper = document.querySelector('.swiper-wrapper');
var slides = swiperWrapper.querySelectorAll('.swiper-slide');

if (slides.length > 10) {
  // Fjerner alle slides efter de første 10
  for (var i = 10; i < slides.length; i++) {
    slides[i].remove();
  }
}
