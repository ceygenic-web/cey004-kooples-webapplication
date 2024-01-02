// project bias ui component builder JS framework
// Product details component builder
function productDataUpdater(jsonData, mainContainer, secondaryContainer) {
  let data;
  try {
    data = JSON.parse(jsonData);
  } catch (error) {
    console.log("Invalid Input");
    return;
  }

  mainContainerBuilder(data, mainContainer);
  secondaryContainerBuilder(data, secondaryContainer);
}

// main product section ui builder
function mainContainerBuilder(data, container) {
  const mainContainer = document.getElementById(container);
  let component = ``;
  let specialSection = ``;
  let specialSectionCount = 0;
  let object = data.special;
  for (const key in object) {
    if (Object.hasOwnProperty.call(object, key)) {
      const element = object[key];
      if (specialSectionCount > 0) {
        specialSection += `<hr />`;
      }
      specialSection += `
        <div>
            <h5 class="fw-bold">${element.sectionTitle}</h5>
            <div>
                ${element.value}
            </div>
        </div>
      `;

      specialSectionCount++;
    }
  }

  component = `
    <div class="mb-4 border-3">
      <h5 class="fw-bold">${data.description.head}</h5>
      <div>
          ${data.description.body}
      </div>
    </div>
    <hr>
    <div class="mb-4">
      ${specialSection}
      <div class="my-4">
          <span class="py-2 px-3 cey-bg-darker cey-text-white">${data.price}</span>
      </div>
    </div>
    <div class="d-flex gap-2">
      <button class="col-6 cey-btn-box fw-bold">ADD TO CART</button>
      <button class="col-6 cey-bg-darker cey-text-white fw-bold">ADD TO WATCH LIST</button>
    </div>
  `;

  mainContainer.innerHTML = component;
}

// secondary product section ui builder
function secondaryContainerBuilder(data, container) {
  const secondaryContainer = document.getElementById(container);
  let section = ``;
  let sectionCount = 0;
  let object = data.secondary;
  for (const key in object) {
    if (Object.hasOwnProperty.call(object, key)) {
      const element = object[key];
      if (sectionCount > 0) {
        section += `<hr />`;
      }
      section += `
        <div class="mb-4 border-bottom border-3">
            <h5 class="fw-bold">${element.head}</h5>
            <div>
                ${element.body}
            </div>
        </div>
      `;

      sectionCount++;
    }
  }

  secondaryContainer.innerHTML = section;
}

// test
/**
 * tempory testing section
 */
const mockData = {
  description: {
    head: "Product Description",
    body: `Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam numquam aliquam eligendi? Est fuga expedita, nesciunt illo facere fugit dicta adipisci veritatis accusantium nam odit dolores, atque sequi vero perferendis.`,
  },
  price: "59.99",
  special: {
    feature1: {
      sectionTitle: "Comfort and Grip",
      value: "Soft-touch finish and contoured shape for all-day comfort.",
    },
    feature2: {
      sectionTitle: "Precision Tracking",
      value: "High-definition sensor for smooth and accurate cursor control.",
    },
  },
  secondary: {
    specifications: {
      head: "Specifications",
      body: "Dimensions: 120 x 60 x 30 mm, Weight: 90 g, Battery: Rechargeable",
    },
    reviews: {
      head: "Customer Reviews",
      body: "4.8 out of 5 stars based on 1,200 reviews",
    },
    extra: {
      head: "extra Item",
      body: "there is no such extra item to be included",
    },
  },
};

window.addEventListener("DOMContentLoaded", () => {
  productDataUpdater(
    JSON.stringify(mockData),
    "mainProductContainer",
    "secondaryProductContainer"
  );
});
