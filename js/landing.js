// landing page initiator
document.addEventListener("DOMContentLoaded", () => {
  // load latest collection
  loadLatestCollection();

  window.addEventListener("resize", () => {
    buildLandingPageS3SwiperInitiator();
  });

  setTimeout(() => {
    fbq("track", "PageView");
  }, 500);
});

const buildLandingPageS3SwiperInitiator = () => {
  if (window.innerWidth > 1400) {
    buildLandingPageS3Swiper(4, 30);
    buildLandingPageS10Swiper(1, 30);
  } else if (window.innerWidth <= 1400 && window.innerWidth > 998) {
    buildLandingPageS3Swiper(3, 20);
    buildLandingPageS10Swiper(1, 30);
  } else if (window.innerWidth <= 998 && window.innerWidth > 600) {
    buildLandingPageS3Swiper(2, 10);
    buildLandingPageS10Swiper(1, 30);
  } else if (window.innerWidth <= 600) {
    buildLandingPageS3Swiper(1, 5);
    buildLandingPageS10Swiper(1, 30);
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

const buildLandingPageS10Swiper = (perView, space) => {
  const swiper = new Swiper(".lptestamonialSwiper", {
    slidesPerView: perView,
    spaceBetween: space,
    navigation: {
      nextEl: ".lp-s3-swiper-control-right",
      prevEl: ".lp-s3-swiper-control-left",
    },
  });
};

// hero search bar
function heroSearch() {
  const search = document.getElementById("heroSearch").value;
  toPage("shop?search=" + search);
}

// load latest collection
function loadLatestCollection() {
  sendRequest("api/product/view?limit=6", "GET", null, {}, true, (data) => {
    const container = document.getElementById("latestCollectionContainer");
    container.innerHTML = "";
    if (data.status == "success") {
      if (!data.results.length) {
        document
          .getElementById("latestCollectionSection")
          .classList.add("d-none");
      }

      data.results.forEach((element) => {
        let minmizedDescription =
          element.description.split(" ").slice(0, 10).join(" ") + "...";

        // discount UI
        let priceComponent = discountUIComponent(
          element.price,
          element.discount
        );

        const imageName = element.images[0].filename;
        container.innerHTML += `
                <div class="swiper-slide cey-product-item-card cey-shadow-light cey-cursor-pointer">
                    <img class="lp-card-img" src="${SERVER_URL}${imageName}" height="100%" width="100%">
                    <div onclick="toProduct('${element.product_id}')" class="card-backdrop"></div>
                    <div class="content">
                        <h6 class="fw-bold">${element.title}</h6>
                        <p>${minmizedDescription}</p>
                        <span>${priceComponent}</span>
                    </div>
                </div>
              `;
      });

      //build landing page swiper
      buildLandingPageS3SwiperInitiator();
    }
  });
}
