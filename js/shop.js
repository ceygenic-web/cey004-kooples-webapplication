// global
let _category = "";
let _search = "";

// initiator
document.addEventListener("DOMContentLoaded", () => {
  getKeyValuePairsFromUrlParams();
  searchProduct("", "");

  // update categories in to dropdown
  sendRequest("api/category/get", "GET", null, {}, true, (data) => {
    const dropdown = document.getElementById("shopCategoryDropdown");
    let dropdownComponent = `<li onclick="searchProduct('', '')">ANY PRODUCT</li>`;
    if (data.status == "success") {
      data.results.forEach((element) => {
        dropdownComponent += `<li onclick="searchProduct('', '${element.category}')">${element.category}</li>`;
      });
      dropdown.innerHTML = dropdownComponent;
    } else if (data.status == "failed") {
      console.log("Failed to load category");
    } else {
      console.log("Something went wrong");
    }
  });
});

// search products
function searchProduct(search = "", category = "") {
  // update
  _search = search;
  _category = category;

  // search
  let URL = "api/product/view";

  let urlQueriesObject = Object.fromEntries(
    new URLSearchParams(window.location.search).entries()
  );
  let paramsObject = {};
  if (search) {
    paramsObject.search = search;
  } else if (category) {
    paramsObject.category = category;
  }

  urlQueriesObject = { ...urlQueriesObject, ...paramsObject };
  URL += "?" + new URLSearchParams(urlQueriesObject).toString();
  console.log(URL);

  sendRequest(URL, "GET", null, {}, true, (data) => {
    const container = document.getElementById("mainProductContainer");
    container.innerHTML = "";
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

      if (!data.results.length) {
        container.innerHTML = `
          <div class="p-5 w-100 h-100 d-flex flex-column align-items-center">
            <h3 class="fw-bold">No product is available!</h3>
            <i class="bi bi-dropbox" style="font-size: 128px;"></i>
          </div>
        `;
      }
    }
  });
}

// search bar feature
function searchBar(event) {
  const search = event.target.value;
  searchProduct(search, _category);
}

// utility
function getKeyValuePairsFromUrlParams() {
  const urlParams = new URLSearchParams(window.location.search);
  const queryParams = {};

  for (const [key, value] of urlParams.entries()) {
    // Ensure accurate decoding of values
    queryParams[key] = decodeURIComponent(value);
  }

  return queryParams;
}
