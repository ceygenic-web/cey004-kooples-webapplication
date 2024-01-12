// initiator
document.addEventListener("DOMContentLoaded", () => {
  setProductToMessage();
});

// setting product on message
function setProductToMessage() {
  const URLdata = getKeyValuePairsFromUrlParams();
  const link = document.getElementById("messageLink");
  link.setAttribute(
    "href",
    `https://wa.me/94784822710?text=I wants to but this product. \r\n                      
    product Id : ${URLdata.productId} \r\n                      
    Product Name : ${URLdata.name} \r\n                     
    Link : ${SERVER_URL}product?id=${URLdata.productId} \r\n`
  );
}
