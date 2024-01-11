// project bias ui component builder JS framework
// Product details component builder
function productDataUpdater(
  id,
  mainContainer,
  secondaryContainer,
  callback = () => {}
) {
  sendRequest(`/api/product/view?id=${id}`, "GET", null, {}, true, (data) => {
    let result = data.results[0];

    swiperBuilder(result.images);
    mainContainerBuilder(result, mainContainer);
    secondaryContainerBuilder(
      JSON.parse(result.other_data),
      secondaryContainer
    );
    callback();
  });
}

function swiperBuilder(images) {
  const mainContainer = document.getElementById("productMainSwiperContainer");
  const thumbContainer = document.getElementById("productThumbSwiperContainer");

  images.forEach((image) => {
    const slide = createSwiperSlide(image.filename);
    mainContainer.appendChild(slide);
    thumbContainer.appendChild(slide.cloneNode(true));
  });
}

// create swiper slide
function createSwiperSlide(fileName) {
  const slide = document.createElement("div");
  slide.classList.add("swiper-slide");
  const img = document.createElement("img");
  img.setAttribute("src", fileName);
  slide.appendChild(img);
  return slide;
}

// main product section ui builder
function mainContainerBuilder(data, container) {
  const mainContainer = document.getElementById(container);
  let component = ``;
  let specialSection = ``;
  let specialSectionCount = 0;

  // let object = data.special;
  // for (const key in object) {
  //   if (Object.hasOwnProperty.call(object, key)) {
  //     const element = object[key];
  //     if (specialSectionCount > 0) {
  //       specialSection += `<hr />`;
  //     }
  //     specialSection += `
  //       <div>
  //           <h5 class="fw-bold">${element.sectionTitle}</h5>
  //           <div>
  //               ${element.value}
  //           </div>
  //       </div>
  //     `;

  //     specialSectionCount++;
  //   }
  // }

  let minmizedDescription =
    data.description.split(" ").slice(0, 10).join(" ") + "...";

  component = `
    <div class="d-flex flex-column">
      <div class="mb-4 border-3">
        <h5 class="fw-bold">Description</h5>
        <div>
            ${minmizedDescription}
        </div>
      </div>
      <div class="mb-4">${specialSection}</div>
    </div>
    <div class="d-flex flex-column">
      <hr>
      <div class="my-4">
            <span class="py-2 px-3 cey-bg-darker cey-text-white">${data.price} LKR</span>
        </div>
      <p class="cey-text-primary">Payments will be handles via whatsapp! Payment gates will be implimented soon</p>
      <div class="d-flex gap-2">
        <button onclick="toPage('purchase?product=${data.product_id}');" class="col-6 cey-btn-box fw-bold">PURCHASE</button>
        <button class="col-6 cey-bg-darker cey-text-white fw-bold">ADD TO WATCH LIST</button>
      </div>
    </div>
  `;

  mainContainer.innerHTML = component;
}

// secondary product section ui builder
function secondaryContainerBuilder(data, container) {
  const secondaryContainer = document.getElementById(container);
  let section = ``;
  let sectionCount = 0;
  let object = data;
  for (const key in object) {
    if (Object.hasOwnProperty.call(object, key)) {
      const element = object[key];
      if (sectionCount > 0) {
        section += `<hr />`;
      }
      section += `
        <div class="mb-4 border-bottom border-3">
            <h5 class="fw-bold">${key}</h5>
            <div>
                ${element}
            </div>
        </div>
      `;

      sectionCount++;
    }
  }

  secondaryContainer.innerHTML = section;
}
