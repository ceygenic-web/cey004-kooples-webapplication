// admin home js file
// admin ui layout manager
document.addEventListener("DOMContentLoaded", () => {
  homeLayoutManger();
  loadPanels();
});

// load home layout ui components
function loadPanels() {
  let productPanels = ["productUpdateView", "productAddView"];

  productPanels.forEach((element) => {
    sendRequest(
      "/admin/api/product/" + element,
      "GET",
      null,
      {},
      false,
      (json) => {
        let container = document.getElementById("product");
        let data = JSON.parse(json);
        if (data.status == "success") {
          container.innerHTML += data.results;
        } else if (data.status == "failed") {
          container.innerHTML += "Error 500";
          console.log("error occured!");
        } else {
          console.log("error");
        }
      }
    );
  });
}

// set event listners to panels
function homeLayoutManger() {
  document.querySelectorAll(".admin-navigation-button").forEach((element) => {
    element.addEventListener("click", (event) => {
      openPanel(event);
    });
  });
}

// open a panel
function openPanel(event) {
  document.querySelectorAll(".admin-panel").forEach((element) => {
    element.classList.remove("d-block");
    element.classList.add("d-none");
    if (element.id === event.target.dataset.panel) {
      element.classList.remove("d-none");
      element.classList.add("d-block");
    }
  });
}
