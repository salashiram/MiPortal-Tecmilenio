$(document).ready(function () {
  $("#fecha-nacimiento").datepicker({
    dateFormat: "yy-mm-dd", // Formato de fecha (año-mes-día)
    changeMonth: true, // Permite cambiar el mes
    changeYear: true, // Permite cambiar el año
    maxDate: new Date(2005, 11, 31),
    minDate: new Date(1950, 0, 1),
    // Otras opciones...
  });
});
