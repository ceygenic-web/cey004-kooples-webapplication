// libraries classes
class RequestManager {
  sendRequest() {
    const loadUIComp = async (index) => {
      // server call
      const componentString = await fetch("ui.comp.php").then((res) =>
        res.text()
      );
      const comp = renderFromString(componentString); // create DOM Element by sting from response

      // update UI with data later using DOM manipulation
      document.getElementById("container").appendChild(comp);
    };

    // just to test if it work with dynamic data
    for (let index = 0; index < 5; index++) {
      loadUIComp(index);
    }

    // actual function of string to DOM Element
    function renderFromString(htmlString) {
      const container = document.createElement("div");
      container.innerHTML = htmlString;
      return container.firstChild; // Extract the first child element
    }
  }
}

class APIRequestHandler {
  constructor(baseURL) {
    this.baseURL = baseURL;
  }

  async request(method, endpoint, options = {}) {
    let url = `${this.baseURL}${endpoint}`;
    let config = {
      method: method,
      headers: {
        "Content-Type": "application/json",
      },
      ...options,
    };

    if (method === "GET" && options.params) {
      const queryString = new URLSearchParams(options.params).toString();
      url += `?${queryString}`;
    }

    if (method === "POST" && options.body) {
      if (options.body instanceof FormData) {
        console.log(config);

        delete config.headers["Content-Type"];
        config.body = options.body;
      } else {
        config.body = createFormData(options.body);
      }
    }

    try {
      const response = await fetch(url, config);
      const text = await response.text();
      const isJSON = response.headers
        .get("content-type")
        ?.includes("application/json");

      if (isJSON) {
        const data = JSON.parse(text);
        return this.handleJSONResponse(data);
      } else {
        console.error("Response is not JSON:", text);
        return false;
      }
    } catch (error) {
      console.error("Fetch error:", error);
      return false;
    }
  }

  createFormData(obj) {
    const formData = new FormData();
    Object.keys(obj).forEach((key) => {
      formData.append(key, obj[key]);
    });
    return formData;
  }

  handleJSONResponse(data) {
    if (data.status === "success") {
      return data.results || true; // success toast if needed
    } else if (data.status === "failed") {
      if (Array.isArray(data.errors)) {
        Core.toast.prompt("Errors occuerd : " + data.errors.length);
        console.log(data.errors);
      } else if (data.error) {
        Core.toast.prompt("Error occured : " + data.error);
        console.log(data.error);
      } else {
        Core.toast.prompt("API Error"); // error toast
        console.log(data);
      }
      return false;
    } else {
      console.error("Unexpected JSON response:", data);
      return false;
    }
  }

  async get(endpoint, params) {
    return await this.request("GET", endpoint, { params });
  }

  async post(endpoint, body) {
    return await this.request("POST", endpoint, { body });
  }
}

// // GET request with query parameters
// api.get("/data", { userId: 123, type: "admin" }).then((result) => {
//   if (result !== false) {
//     console.log("GET result:", result);
//   }
// });

// // POST request with JSON body
// api.post("/submit", { name: "John", age: 30 }).then((result) => {
//   if (result !== false) {
//     console.log("POST result:", result);
//   }
// });

// // POST request with FormData
// const formData = new FormData();
// formData.append("file", fileInput.files[0]);
// api.post("/upload", formData).then((result) => {
//   if (result !== false) {
//     console.log("File upload result:", result);
//   }
// });