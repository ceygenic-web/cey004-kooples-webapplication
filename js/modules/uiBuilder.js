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
          <span class="py-2 px-3 cey-bg-darker cey-text-white">${data.price} LKR</span>
      </div>
    </div>
    <p class="cey-text-primary">Payments will be handles via whatsapp! Payment gates will be implimented soon</p>
    <div class="d-flex gap-2">
      <button onclick="toPage('purchase?product=${data.title}');" class="col-6 cey-btn-box fw-bold">PURCHASE</button>
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
