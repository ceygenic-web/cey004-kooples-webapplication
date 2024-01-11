// states
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
