// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  //build landing page swiper
  buildProductPageS1SwiperInitiator();
  window.addEventListener("resize", () => {
    buildProductPageS1SwiperInitiator();
  });

  // load product
  const URLparams = getKeyValuePairsFromUrlParams();
  productDataUpdater(
    URLparams["id"],
    "mainProductContainer",
    "secondaryProductContainer",
    buildProductPageS1SwiperInitiator
  );
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

  const relatedProduct = new Swiper(".mySwiper3", {
    slidesPerView: perView,
    spaceBetween: space,
    navigation: {
      nextEl: ".pp-s2-swiper-control-right",
      prevEl: ".pp-s2-swiper-control-left",
    },
  });
};
