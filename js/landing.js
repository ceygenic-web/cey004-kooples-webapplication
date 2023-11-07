// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  //build landing page swiper

  buildLandingPageS3Swiper(4, 30);
  window.addEventListener("resize", () => {
    if (window.innerWidth > 767) {
      buildLandingPageS3Swiper(4, 30);
    } else if (window.innerWidth <= 767) {
      buildLandingPageS3Swiper(2, 10);
    }
  });
});

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
