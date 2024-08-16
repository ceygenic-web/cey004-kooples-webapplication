// common js will goes here that are applicable for entire application
const APIR = new APIRequestHandler("http://localhost:9001/");

const res = async () => {
  const formData = new FormData();
  formData.append("category", "shorts");
  formData.append("subCategory", "Men");

  console.log(await APIR.get("/api/category/get"));
};

// res();
