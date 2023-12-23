document.addEventListener("DOMContentLoaded", () => {
  fetch("api/product/view", {
    method: "GET",
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status == "success") {
        data.results.forEach((element) => {
          document.getElementById("mainProductContainer").innerHTML = `
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center">
                        <div class="cey-product-item-card cey-shadow-light">
                            <img src="resources/images/category2.jpg" height="100%" width="100%">
                            <h6 class="fw-bold">Porduct Title</h6>
                            <p>product descriptino of small content will be here and it will be very short...</p>
                            <button class="cey-btn-box"><span class="me-3">CART</span> <i class="bi-cart"></i></button>
                        </div>
                    </div>
                `;
        });
      }
    });
});
