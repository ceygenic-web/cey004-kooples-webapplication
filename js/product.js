// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  //build landing page swiper
  buildProductPageS1SwiperInitiator();
  window.addEventListener("resize", () => {
    buildProductPageS1SwiperInitiator();
  });
});

const buildProductPageS1SwiperInitiator = () => {
  if (window.innerWidth > 1400) {
    buildProductPageS10Swiper(4, 30);
  } else if (window.innerWidth <= 1400 && window.innerWidth > 998) {
    buildProductPageS10Swiper(3, 20);
  } else if (window.innerWidth <= 998 && window.innerWidth > 600) {
    buildProductPageS10Swiper(2, 10);
  } else if (window.innerWidth <= 600) {
    buildProductPageS10Swiper(1, 5);
  }
};

const buildProductPageS10Swiper = (perView, space) => {
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });

  const tumbs = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 0,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
};
