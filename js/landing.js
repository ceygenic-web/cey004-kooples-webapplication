// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  //build landing page swiper

  buildLandingPageS3SwiperInitiator();
  window.addEventListener("resize", () => {
    buildLandingPageS3SwiperInitiator();
  });
});

const buildLandingPageS3SwiperInitiator = () => {
  if (window.innerWidth > 1400) {
    buildLandingPageS3Swiper(4, 30);
  } else if (window.innerWidth <= 1400 && window.innerWidth > 998) {
    buildLandingPageS3Swiper(3, 20);
  } else if (window.innerWidth <= 998 && window.innerWidth > 600) {
    buildLandingPageS3Swiper(2, 10);
  } else if (window.innerWidth <= 600) {
    buildLandingPageS3Swiper(1, 5);
  }
};

const buildLandingPageS3Swiper = (perView, space) => {
  const swiper = new Swiper(".lpLatestProductSwiper", {
    slidesPerView: perView,
    spaceBetween: space,
    navigation: {
      nextEl: ".lp-s3-swiper-control-right",
      prevEl: ".lp-s3-swiper-control-left",
    },
  });
};
