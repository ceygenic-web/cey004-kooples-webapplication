document.addEventListener("DOMContentLoaded", () => {
  getKeyValuePairsFromUrlParams();

  let URL = "api/product/view";
  URL += window.location.search;
  fetch(URL, {
    method: "GET",
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      const container = document.getElementById("mainProductContainer");
      if (data.status == "success") {
        data.results.forEach((element) => {
          container.innerHTML += `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 d-flex justify-content-center mt-5" onclick="toProduct('${element.title}')">
                        <div class="cey-product-item-card cey-shadow-light">
                            <img src="resources/images/products/${element.product_id}.jpg" height="100%" width="100%">
                            <div class="content">
                                <h6 class="fw-bold">${element.title}</h6>
                                <p>${element.description}</p>
                                <button class="cey-btn-box"><span class="me-3">CART</span> <i class="bi-cart"></i></button>
                            </div>
                        </div>
                    </div>
                `;
        });
      }
    });
});

function getKeyValuePairsFromUrlParams() {
  const urlParams = new URLSearchParams(window.location.search);
  const queryParams = {};

  for (const [key, value] of urlParams.entries()) {
    // Ensure accurate decoding of values
    queryParams[key] = decodeURIComponent(value);
  }

  return queryParams;
}
