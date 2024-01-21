// admin home js file
// admin ui layout manager
let adminUIModel;
document.addEventListener("DOMContentLoaded", () => {
  homeLayoutManger();
  loadPanels();

  adminUIModel = new UIModel();
});

// load home layout ui components
function loadPanels() {
  let productPanels = ["productAddView"];

  productPanels.forEach((element) => {
    sendRequest(
      "/admin/api/product/" + element,
      "GET",
      null,
      {},
      true,
      (data) => {
        let container = document.getElementById(element + "Container");
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
            sendRequest(
              "/api/category/getsub",
              "GET",
              null,
              {},
              true,
              (data) => {
                const select = document.getElementById(element + "SubCategory");
                const defaultOption = document.createElement("option");
                defaultOption.value = 0;
                defaultOption.innerText = "Select a Sub category";
                select.appendChild(defaultOption);
                if (data.status == "success") {
                  data.results.forEach((category) => {
                    const option = document.createElement("option");
                    option.value = category.sub_category;
                    option.innerText = category.sub_category;
                    select.appendChild(option);
                  });
                }

                if (!isListning) {
                  addEventListeners();
                }
              }
            );
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
    "productAddViewSubCategory",
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
    try {
      if (data.status == "success") {
        alert("success");
        window.location.reload();
      } else if (data.status == "failed") {
        alert(data.error);
      } else {
        alert("Something went worng");
        console.log(data);
      }
    } catch (error) {
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

let currentUpdateProductId;
let updatedData = {};
let temporyOtherSectionData = {};
// let temporyOtherSectionDataFromDB = {};
function getUpdatedDataFromInput(event) {
  const input = event.target;
  if (input.dataset.type === "other-section") {
    temporyOtherSectionData[input.name] = input.value;
    return;
  }
  updatedData[input.name] = input.value;
}

// open update model
function openUpdateProductModel(event) {
  // clear old data
  currentUpdateProductId = null;
  updatedData = {};
  temporyOtherSectionData = {};

  const modelOpenBtn = event.target;
  modelOpenBtn.disabled = true;

  const productUpdateOpenModelId = document.getElementById(
    "productUpdateOpenModelIdInputs"
  ).value;

  sendRequest(
    "../api/product/view",
    "GET",
    { id: productUpdateOpenModelId },
    {},
    true,
    (data) => {
      if (data.status == "success") {
        loadUIComponent(data.results[0]);
      } else if (data.status == "failed") {
        alert(data.error);
      } else {
        alert("Something Went Wrong!");
        console.log(data);
      }
      modelOpenBtn.disabled = false;
    }
  );

  function loadUIComponent(data) {
    currentUpdateProductId = data.product_id; // set product id tha is going to be updated
    // temporyOtherSectionDataFromDB = data.other_data;

    //  category Selector load
    sendRequest(
      "../api/category/get",
      "GET",
      null,
      {},
      true,
      (categoryData) => {
        let options = ``;
        categoryData.results.forEach((category) => {
          let isSelected =
            category.category_id === data.category_category_id
              ? " selected "
              : " ";
          options += `<option ${isSelected} value="${category.category_id}">${category.category}</option>`;
        });

        let categories = `
        <label for="category">Category:</label>
        <select onchange="getUpdatedDataFromInput(event)" class="form-select" id="productUpdateViewcategory" name="category">
          ${options}
        </select><br>
      `;

        document.getElementById("productUpdateCategorySelector").innerHTML =
          categories;
      }
    );

    // sub category Selector load
    sendRequest(
      "../api/category/getsub",
      "GET",
      null,
      {},
      true,
      (subCategoryData) => {
        let options = ``;
        subCategoryData.results.forEach((category) => {
          let isSelected =
            category.sub_categories_id === data.sub_categories_sub_categories_id
              ? " selected "
              : " ";
          options += `<option ${isSelected} value="${category.sub_categories_id}">${category.sub_category}</option>`;
        });

        let categories = `
          <label for="productUpdateViewSubCategory">Sub Category:</label>
          <select onchange="getUpdatedDataFromInput(event)" class="form-select" id="productUpdateViewSubCategory" name="sub_category">
            ${options}
          </select><br>
      `;

        document.getElementById("productUpdateSubCategorySelector").innerHTML =
          categories;
      }
    );

    let otherSections = ``;
    const otherSectionsObject = JSON.parse(data.other_data);
    for (const sectionTitle in otherSectionsObject) {
      if (Object.hasOwnProperty.call(otherSectionsObject, sectionTitle)) {
        const sectionName = sectionTitle.replace(" ", "_");
        otherSections += `
          <label for="price">${sectionTitle}</label>
          <input data-type="other-section" onchange="getUpdatedDataFromInput(event)" value="${otherSectionsObject[sectionTitle]}" type="text" id="${sectionName}Input" name="${sectionName}" class="form-control"><br>
        `;
      }
    }

    const productUpdateUI = `
    <!-- product update section -->
    <section id="productUpdateMainContainer" class="productUpdate ad-s1 cey-bg-dark py-5">
          <div class="container py-5 d-flex justify-content-center align-items-center h-100 w-100 flex-column">
          <h1 class="cey-text-white">Update products</h1>
              <div id="productUpdateView" class="col-12 d-flex flex-column gap-1 cey-text-white">
              <div class="d-flex flex-column">
                      <label for="id">ID:</label>
                      <input onchange="getUpdatedDataFromInput(event)" value="${data.product_id}" disabled class="form-control" type="text" id="update_id" name="id"><br>
                      <label for="title">Title:</label>
                      <input onchange="getUpdatedDataFromInput(event)" value="${data.title}"  class="form-control" type="text" id="update_title" name="title"><br>
                      <label for="description">Description:</label>
                      <textarea onchange="getUpdatedDataFromInput(event)"  class="form-control" id="update_description" name="description" cols="30" rows="5">${data.description}</textarea><br>
                      <div class="d-flex flex-column" id="productUpdateCategorySelector"></div>
                      <div class="d-flex flex-column" id="productUpdateSubCategorySelector"></div>
                      <label for="price">Price</label>
                      <input onchange="getUpdatedDataFromInput(event)" value="${data.price}" type="text" id="update_price" name="price" class="form-control"><br>
                      ${otherSections}
                      <button class="btn btn-primary" onclick="updateProductData()">Update</button>
                  </div>
              </div>
          </div>
      </section>
  `;

    adminUIModel.openModel("Update Product", productUpdateUI);
  }
}

// update product data
function updateProductData() {
  // if (Object.keys(temporyOtherSectionDataFromDB).length !== 0) {
  //   const otherSectionsObj = JSON.stringify(temporyOtherSectionDataFromDB);
  //   for (const key in otherSectionsObj) {
  //     if (Object.hasOwnProperty.call(otherSectionsObj, key)) {
  //       // neted loop
  //       for (const key2 in temporyOtherSectionData) {
  //         if (Object.hasOwnProperty.call(temporyOtherSectionData, key2)) {
  //           if (key2 === key) {
  //             otherSectionsObj[key] = temporyOtherSectionData[key];
  //           }
  //         }
  //       }

  //       // update data in temp variable
  //       if (Object.keys(otherSectionsObj).length !== 0) {
  //         updatedData["other_data"] = JSON.stringify(otherSectionsObj);
  //       }
  //     }
  //   }
  // }

  // update data in temp variable
  if (Object.keys(temporyOtherSectionData).length !== 0) {
    updatedData["other_data"] = JSON.stringify(temporyOtherSectionData);
  }

  if (Object.keys(updatedData).length == 0) {
    alert("No data has been updated!");
    return;
  }

  const form = new FormData();
  form.append("id", currentUpdateProductId);
  for (const key in updatedData) {
    if (Object.hasOwnProperty.call(updatedData, key)) {
      form.append(key, updatedData[key]);
    }
  }

  sendRequest("../api/product/update", "POST", form, {}, true, (res) => {
    console.log(res);
    if (res.status == "success") {
      alert("success");
      adminUIModel.closeModel();
    } else if (res.status == "failed") {
      alert(res.error);
    } else {
      console.log(res);
    }
  });
}
