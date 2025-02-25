new Swiper('.swiper', {
  
    loop: true,
    spaceBetween: 30,
  
    // pagination bullets
    pagination: {
      el: '.team-section .swiper-pagination',
      clickable: true,
      dynamicBullets: true
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.team-section .swiper-button-next',
      prevEl: '.team-section .swiper-button-prev',
    },

    //responsive breakpoints
    breakpoints: {
        0:{
            slidesPerView: 1
        },
        768:{
            slidesPerView: 2
        },
        1024:{
            slidesPerView: 3
        },
    }
  

  });