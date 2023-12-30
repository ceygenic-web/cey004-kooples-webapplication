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
        console.log("Error Occured!");
      }
    })
    .catch((error) => {
      console.error("Request failed:", error);
      callback(null, error); // Pass error to callback
    });
};
