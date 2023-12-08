var linkToLogin = document.getElementById("linkToLogin");

linkToLogin.addEventListener("click", function (event) {
  event.preventDefault(); // Evitar comportamiento predeterminado del enlace

  limpiarCampos();
});

function limpiarCampos() {
  var formulario = document.getElementById("formRegistro");
  var campos = formulario.querySelectorAll("input, textarea, select");

  campos.forEach(function (campo) {
    campo.value = ""; // Establecer el valor del campo en blanco
  });
}
