//  custom js for each page
document.addEventListener("DOMContentLoaded", () => {
  const swiper = initiateBestSellerSwiper();
  for (let x = 1; x <= 5; x++) {
    new Component("productcard", async (comp) => {
      comp.querySelector(
        ".product-card"
      ).style.backgroundImage = `url('/public/resources/images/products/product-${x}.jpg')`;
      comp.querySelector(".product-card-name").innerHTML = "The Product " + x;
      comp.querySelector(".product-card-description").innerHTML =
        "Simple description...";
      comp.querySelector(".product-card-price").innerHTML = "3000.00 LKR";

      if (x == 3 || x == 4) {
        comp.querySelector(".product-wholesale").classList.remove("d-none");
        comp.querySelector(".product-wholesale").classList.add("d-inline");
      }

      document.getElementById("bestSellerContainer").appendChild(comp);
      swiper.update();
    });
  }
});

const initiateBestSellerSwiper = () => {
  return new Swiper(".swiper", {
    speed: 400,
    allowTouchMove: true,
    autoplay: {
      delay: 3000,
    },

    // navigation
    navigation: {
      prevEl: ".hp-s4-prev",
      nextEl: ".hp-s4-next",
    },

    // Default parameters
    slidesPerView: 1,

    // Responsive breakpoints
    breakpoints: {
      // when window width is >= 320px
      520: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      // when window width is >= 640px
      998: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
    },
  });
};
