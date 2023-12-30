const form = document.getElementById("signInForm");
document.getElementById("login").addEventListener("click", (e) => {
  e.preventDefault();

  const formData = new FormData(form);

  sendRequest(
    "/admin/api/access/login",
    form.method.toUpperCase(),
    formData,
    {},
    true,
    (data) => {
      window.location.href = "/admin/home";
    }
  );
});
