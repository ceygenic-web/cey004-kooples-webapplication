//  custom js for each page
document.addEventListener("DOMContentLoaded", () => {
  for (let x = 1; x <= 5; x++) {
    new Component("productCard", async (comp) => {
      comp.querySelector(
        ".product-card"
      ).style.backgroundImage = `url('/public/resources/images/products/product-${x}.jpg')`;
      comp.querySelector(".product-card-name").innerHTML = "The Product " + x;
      comp.querySelector(".product-card-description").innerHTML =
        "Simple description...";
      comp.querySelector(".product-card-price").innerHTML = "3000.00 LKR";

      if (x == 3 || x == 4) {
        comp.querySelector(".product-wholesale").classList.remove("d-none");
        comp.querySelector(".product-wholesale").classList.add("d-inline");
      }

      document.getElementById("mainProductContainer").appendChild(comp);
    });
  }
});
