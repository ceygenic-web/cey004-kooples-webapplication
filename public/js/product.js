// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  loadRelatedProducts();

  //build landing page swiper
  buildProductPageS1SwiperInitiator();
  window.addEventListener("resize", () => {
    buildProductPageS1SwiperInitiator();
  });
});

const buildProductPageS1SwiperInitiator = () => {
  new Swiper(".mySwiper3", {
    speed: 400,
    allowTouchMove: true,
    autoplay: {
      delay: 3000,
    },

    // navigation
    navigation: {
      prevEl: ".pp-s3-prev",
      nextEl: ".pp-s3-next",
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
  
  if (window.innerWidth > 1400) {
    buildProductPageS2Swiper(4, 30);
  } else if (window.innerWidth <= 1400 && window.innerWidth > 998) {
    buildProductPageS2Swiper(3, 20);
  } else if (window.innerWidth <= 998 && window.innerWidth > 600) {
    buildProductPageS2Swiper(2, 10);
  } else if (window.innerWidth <= 600) {
    buildProductPageS2Swiper(1, 5);
  }
};

const buildProductPageS2Swiper = (perView, space) => {
  const swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    loop: true,
    spaceBetween: 0,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });

  const tumbs = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 0,
    effect: "creative",
    creativeEffect: {
      prev: {
        shadow: true,
        translate: [0, 0, -400],
      },
      next: {
        translate: ["100%", 0, 0],
      },
    },
    direction: "vertical",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
};

const loadRelatedProducts = () => {
  const relatedProductContainer = document.getElementById(
    "relatedProductContainer"
  );
  relatedProductContainer.innerHTML = "";

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

      relatedProductContainer.appendChild(comp);
    });
  }
};
