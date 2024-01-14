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
  if (!isRelatedLoaded) {
    loadRelatedProduct();
  }

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

// load related Product
var isRelatedLoaded = false;
function loadRelatedProduct() {
  sendRequest(
    "/api/product/get-related?search=",
    "GET",
    null,
    {},
    true,
    (data) => {
      isRelatedLoaded = true;

      let swiperSlideUI = ``;
      if (data.status == "success") {
        data.results.forEach((product) => {
          const minimizedDescription =
            product.description.split(" ").slice(0, 10).join(" ") + "...";
          swiperSlideUI += `
            <div class="swiper-slide pp-s2-card cey-product-item-card cey-shadow-light">
                <img style="object-fit: cover" src="${SERVER_URL}${product.images[0].filename}" height="100%" width="100%">
                <div class="position-absolute pp-s2-card-backdrop"></div>
                <div class="content">
                    <h6 class="fw-bold">${product.title}</h6>
                    <p>${minimizedDescription}</p>
                    <button onclick="toPage('purchase?productId=${product.product_id}')" class="cey-btn-box"><span class="me-3">PURCHASE</span> <i class="bi-cart"></i></button>
                </div>
            </div>
          `;
        });
        const relatedProductContainer = document.getElementById(
          "relatedProductContainer"
        );

        relatedProductContainer.innerHTML = swiperSlideUI;
      } else {
        document
          .getElementById("relatedProductSection")
          .classList.add("d-none");
      }
    }
  );
}
