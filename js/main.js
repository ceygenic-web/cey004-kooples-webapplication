// states
const SERVER_URL = "https://www.kooplesclothing.com/";
let SidebarToggleClicked = false;

// initiator
document.addEventListener("DOMContentLoaded", () => {
  // sidebar toggle listner
  const sidebarToggleBtns = document.querySelectorAll(".sidebar-toggle");
  sidebarToggleBtns.forEach((element) => {
    element.addEventListener("click", closeNavigationSidebar);
  });

  const sidebar = document.querySelector(".sidebar");
  window.addEventListener("resize", () => {
    if (window.innerWidth > 767 && SidebarToggleClicked) {
      sidebar.style.display = "none";
    } else if (window.innerWidth <= 767 && SidebarToggleClicked) {
      sidebar.style.display = "flex";
    }
  });
});

const closeNavigationSidebar = () => {
  const sidebar = document.querySelector(".sidebar");
  if (window.getComputedStyle(sidebar).display == "flex") {
    sidebar.style.display = "none";
    SidebarToggleClicked = false;
  } else {
    sidebar.style.display = "flex";
    SidebarToggleClicked = true;
  }
};

const toProduct = (query = null) => {
  const params = query ? "?id=" + query : "";
  const URL = `product${params}`;
  toPage(URL);
};

const toPage = (page) => {
  window.location.href = page;
};

// discount card UI component
function discountUIComponent(price, discount) {
  // discount component
  let newPrice = price - (price / 100) * discount;
  let priceComponent = ``;
  if (discount > 0 && discount < 100) {
    priceComponent += `<span class="fs-6 text-decoration-line-through text-secondary">${price} LKR</span> <span class="cey-text-primary fs-5 fw-bold"> ${newPrice} LKR</span>`;
  } else {
    priceComponent += `<span class="fs-5 fw-bold cey-text-primary">${price} LKR</span>`;
  }
  return priceComponent;
}
