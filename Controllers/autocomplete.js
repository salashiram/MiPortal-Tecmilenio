$(document).ready(function () {
  const dominios = [
    // Lista de dominios para autocompletar
    "tecmilenio.com.mx",
    "gmail.com",
    "outlook.com",
  ];
  $("#email").autocomplete({
    source: function (request, response) {
      const term = request.term;
      const atIndex = term.lastIndexOf("@");

      if (atIndex !== -1) {
        const domain = term.substring(atIndex + 1);
        const filtered = $.grep(dominios, function (value) {
          return value.indexOf(domain) !== -1;
        });

        response(filtered);
      } else {
        response([]);
      }
    },
    select: function (event, ui) {
      const term = this.value;
      const atIndex = term.lastIndexOf("@");

      if (atIndex !== -1) {
        const newText = term.substring(0, atIndex + 1) + ui.item.value;
        this.value = newText;
      } else {
        this.value = ui.item.value;
      }
      return false; // Evita la inserción automática del valor seleccionado
    },
  });
});
