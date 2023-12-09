$(document).ready(function () {
  // Simula el inicio de sesión
  $("#btn-click").click(function () {
    $(".overlay").fadeIn(); // Muestra la animación de carga

    // Simula un retraso antes de ocultar la animación (puedes reemplazar esto por una llamada AJAX)
    setTimeout(function () {
      $(".overlay").fadeOut(); // Oculta la animación de carga después de 2 segundos (simulado)
    }, 2000); // Duración del retraso en milisegundos (simulado)
  });
});
