// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  //build landing page swiper
  buildLandingPageS3Swiper();
});

const buildLandingPageS3Swiper = () => {
  const swiper = new Swiper(".lpLatestProductSwiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    navigation: {
      nextEl: ".lp-s3-swiper-control-right",
      prevEl: ".lp-s3-swiper-control-left",
    },
  });
};
