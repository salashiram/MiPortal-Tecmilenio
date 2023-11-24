document.addEventListener("DOMContentLoaded", function () {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        document.body.innerHTML = this.responseText;
      }
    };
    xhr.open("GET", "sideBar.html", true); // Ruta correcta a tu archivo sidebar.html
    xhr.send();
  });