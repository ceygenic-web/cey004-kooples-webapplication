// product data updator
const mockData = {
  title: "Product 1",
  description: {
    head: "Product Description",
    body: `Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam numquam aliquam eligendi? Est fuga expedita, nesciunt illo facere fugit dicta adipisci veritatis accusantium nam odit dolores, atque sequi vero perferendis.`,
  },
  price: "13500",
  special: {
    feature1: {
      sectionTitle: "Comfort and Grip",
      value: "Soft-touch finish and contoured shape for all-day comfort.",
    },
    feature2: {
      sectionTitle: "Precision Tracking",
      value: "High-definition sensor for smooth and accurate cursor control.",
    },
  },
  secondary: {
    specifications: {
      head: "Specifications",
      body: "Dimensions: 120 x 60 x 30 mm, Weight: 90 g, Battery: Rechargeable",
    },
    reviews: {
      head: "Customer Reviews",
      body: "4.8 out of 5 stars based on 1,200 reviews",
    },
    extra: {
      head: "extra Items",
      body: "there is no such extra item to be included",
    },
  },
};

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
