/**
 * send a request to a given URL with fetch api and execute callback when resonse reached back.
 *
 * @param {string} url - request URL
 * @param {string} method - request method (GET or POST)
 * @param {object | FormData} data - data as an object or form data for both GET and POST
 * @param {object} headers - object containing headers of request
 * @param {boolean} isJson - is reponse type json or not
 * @param {Function} callback - callback function to run after the response is reached
 */
const sendRequest = async (
  url,
  method = "GET",
  data = null,
  headers = {},
  isJson = false,
  callback
) => {
  const options = {
    method,
    headers,
  };

  if (method === "GET" && data) {
    // Append query parameters to URL for GET requests
    url += `?${new URLSearchParams(data).toString()}`;
  } else if (method === "POST" && data) {
    if (data instanceof FormData) {
      // Use FormData directly as body
      options.body = data;
    } else {
      // Create FormData from object
      const formData = new FormData();
      Object.entries(data).forEach(([key, value]) => {
        formData.append(key, value);
      });
      options.body = formData;
    }
  }

  fetch(url, options)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error: ${response.status}`);
      }

      return isJson ? response.json() : response.text();
    })
    .then((data) => {
      if (!isJson) {
        callback(data);
        return;
      }

      try {
        if (data.status == "success") {
          callback(data);
        } else if (data.status == "failed") {
          alert(data.error);
        } else {
          console.log("Error Occured!");
          alert("something went wrong!");
        }
      } catch (error) {
        alert("something went wrong!");
        console.error("Error Occured! : ", error);
      }
    })
    .catch((error) => {
      console.error("Request failed:", error);
      callback(null, error); // Pass error to callback
    });
};

/**
 *parse wuery parameters from URL
 */
function getKeyValuePairsFromUrlParams() {
  const urlParams = new URLSearchParams(window.location.search);
  const queryParams = {};

  for (const [key, value] of urlParams.entries()) {
    // Ensure accurate decoding of values
    queryParams[key] = decodeURIComponent(value);
  }

  return queryParams;
}

/**
 * update URL queries based on object
 */
function setKeyValuePairsToUrlParams(object) {
  const urlParams = new URLSearchParams(object);
  history.replaceState(
    null,
    null,
    window.location.pathname + "?" + urlParams.toString()
  );
}

/**
 * genarte a FORM from input fields given as ids
 */
function genarateFromFromInputValues(...ids) {
  const form = new FormData();
  ids.forEach((id) => {
    const element = document.getElementById(id);
    form.append(element.getAttribute("name"), element.value);
  });
  return form;
}

/**
 * image comporessor
 */
function compressImage(imageFile, quality = 0.7) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(imageFile);

    reader.onload = () => {
      const img = new Image();
      img.onload = () => {
        const canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;

        const ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        canvas.toBlob(
          (compressedImageBlob) => {
            resolve(
              new File([compressedImageBlob], imageFile.name, {
                type: imageFile.type,
              })
            );
          },
          "image/jpeg",
          quality
        ); // Adjust quality as needed
      };
      img.src = reader.result;
    };

    reader.onerror = (error) => {
      reject(error);
    };
  });
}
