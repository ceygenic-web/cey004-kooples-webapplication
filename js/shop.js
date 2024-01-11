// global
let _category = "";
let _search = "";

// initiator
document.addEventListener("DOMContentLoaded", () => {
  const queries = getKeyValuePairsFromUrlParams();
  _category = queries.category ?? "";
  _search = queries.search ?? "";

  // set default search
  const shopSearch = document.getElementById("shopSearch");
  shopSearch.value = _search;

  searchProduct("", "");

  // update categories in to dropdown
  loadCategories();
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

  sendRequest(URL, "GET", null, {}, true, (data) => {
    const container = document.getElementById("mainProductContainer");
    container.innerHTML = "";
    if (data.status == "success") {
      data.results.forEach((element) => {
        let minmizedDescription =
          element.description.split(" ").slice(0, 10).join(" ") + "...";
        container.innerHTML += `
                  <div class="shop-product-card col-12 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center mt-2">
                        <div class="shop-product-card-container w-100 cey-shadow-light position-relative">
                          <div class="content">
                            <h6 class="fw-bold">${element.title}</h6>
                            <p>${minmizedDescription}</p>
                            <!-- <button class="cey-btn-box"><span class="me-3">CART</span> <i class="bi-cart"></i></button> -->
                            <button onclick="toPage('purchase?product=${element.title}')" class="cey-btn-box"><span class="me-3">PURCHASE</span> <i class="bi-cart"></i></button>
                          </div>
                          <img src="${element.images[0]["filename"]}" height="100%" width="100%" onclick="toProduct('${element.product_id}')">
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

      // if (_category) {
      //   setKeyValuePairsToUrlParams({
      //     category: _category,
      //   });
      // }
      // if (_search) {
      //   setKeyValuePairsToUrlParams({
      //     search: _search,
      //   });
      // }
    }
  });
}

// load Categories
function loadCategories() {
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
}

// search bar feature
function searchBar(event) {
  const search = event.target.value;
  searchProduct(search, _category);
}
