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
    `https://wa.me/94784822710?text=I wants to but this product : ${URLdata.product} : Image : -
  https://kooplesclothing.com/resources/images/hero.jpg`
  );
}
