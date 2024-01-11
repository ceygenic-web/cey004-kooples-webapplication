// admin home js file
// admin ui layout manager
document.addEventListener("DOMContentLoaded", () => {
  homeLayoutManger();
  loadPanels();
});

// load home layout ui components
function loadPanels() {
  let productPanels = ["productAddView", "productUpdateView"];

  productPanels.forEach((element) => {
    sendRequest(
      "/admin/api/product/" + element,
      "GET",
      null,
      {},
      true,
      (json) => {
        let container = document.getElementById("product");
        let data = JSON.parse(json);
        if (data.status == "success") {
          container.innerHTML += data.results;

          // add categories to select
          sendRequest("/api/category/get", "GET", null, {}, true, (data) => {
            const select = document.getElementById(element + "category");
            const defaultOption = document.createElement("option");
            defaultOption.value = 0;
            defaultOption.innerText = "Select a category";
            select.appendChild(defaultOption);
            if (data.status == "success") {
              data.results.forEach((category) => {
                const option = document.createElement("option");
                option.value = category.category;
                option.innerText = category.category;
                select.appendChild(option);
              });
            }
            if (!isListning) {
              addEventListeners();
            }
          });
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

// all event listners for admin home
let isListning = false;
function addEventListeners() {
  // product add
  const productAddForm = document.getElementById("productAdd");
  productAddForm.addEventListener("submit", (event) => {
    event.preventDefault();
    addProduct();
  });

  isListning = true;
}

// business process
const imagesArray = [];
function addProduct() {
  const mainDataIds = [
    "productAdd",
    "add_title",
    "add_description",
    "productAddViewcategory",
    "add_price",
  ];
  const specialFieldsIds = [
    "add_blousepiece",
    "add_style_number",
    "add_shipping_info",
    "add_returns",
    "add_measurements",
    "add_wash_instructions",
    "add_fabric",
  ];

  const requestForm = new FormData();
  mainDataIds.forEach((mainInputId) => {
    const mainInput = document.getElementById(mainInputId);
    requestForm.append(mainInput.getAttribute("name"), mainInput.value);
  });
  const secondaryFields = {};
  specialFieldsIds.forEach((secondaryId) => {
    const secondaryInput = document.getElementById(secondaryId);
    secondaryFields[secondaryInput.getAttribute("name")] = secondaryInput.value;
  });
  const jsonDescription = JSON.stringify(secondaryFields);
  requestForm.append("other_data", jsonDescription);

  // add images
  imagesArray.forEach((file, index) => {
    requestForm.append(index, file);
  });
  sendRequest("/api/product/add", "POST", requestForm, {}, true, (data) => {
    if (data.status == "success") {
      alert("success");
      window.location.reload();
    } else if (data.status == "failed") {
      alert(data.error);
    } else {
      alert("Something went worng");
      console.log(data);
    }
  });
}

// update images in preview
async function updateAddImagePreview(event) {
  const images = event.target.files;
  const imageContainer = document.getElementById("addImagePreviewBox");
  for (const key in images) {
    if (Object.hasOwnProperty.call(images, key)) {
      const element = images[key];
      const compressedImage = await compressImage(element, 0.4);
      imagesArray.push(compressedImage);
    }
  }
  loadImagesToPreview(imagesArray, imageContainer);
}

function loadImagesToPreview(array, container) {
  container.innerHTML = null;
  array.forEach((compressedImage) => {
    const imageBox = document.createElement("div");
    imageBox.classList.add("d-flex");
    imageBox.classList.add("flex-column");
    const image = document.createElement("img");
    image.src = URL.createObjectURL(compressedImage);
    image.classList.add("admin-product-image-preview");
    image.style.backgroundColor = "gray";

    const close = document.createElement("i");
    close.classList.add("bi");
    close.classList.add("bi-x-circle");
    close.classList.add("image-close-icon");
    close.onclick = (index) => {
      imagesArray.splice(index, 1);
      loadImagesToPreview(array, container);
    };
    imageBox.appendChild(close);
    imageBox.appendChild(image);

    container.appendChild(imageBox);
  });
}
