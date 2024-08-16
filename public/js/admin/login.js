const login = () => {
  const form = document.forms[0];

  fetch("/api/admin/login", {
    method: "POST",
    body: new FormData(form),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.status == "success") {
        alert("Logged as an Admin!");
        window.location.href = "/admin/";
      } else {
        alert(data.error);
        // console.log(data); // test
      }
    });
};
