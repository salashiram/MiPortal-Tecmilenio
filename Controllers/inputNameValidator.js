const inputLetrasEspacios = document.getElementById("onlyText");
const mensajeError = document.getElementById("mensaje-error");

inputLetrasEspacios.addEventListener("input", function () {
  const valor = this.value;

  if (/[^a-zA-Z\s]/.test(valor)) {
    mensajeError.style.display = "block";
    this.value = valor.replace(/[^a-zA-Z\s]/g, "");
  } else {
    mensajeError.style.display = "none";
  }
});
