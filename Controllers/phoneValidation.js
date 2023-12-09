const inputNumero = document.getElementById("phone");

inputNumero.addEventListener("input", function () {
  const valor = this.value;

  // Validar si el valor contiene más de 10 dígitos numéricos
  if (/^\d{11,}/.test(valor)) {
    // Si tiene más de 10 dígitos, recortar el valor a 10 dígitos
    this.value = valor.slice(0, 10);
  }
});
