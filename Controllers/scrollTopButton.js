$(document).ready(function () {
  // Mostrar/ocultar botón al hacer scroll
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $("#scrollToTopBtn").fadeIn();
    } else {
      $("#scrollToTopBtn").fadeOut();
    }
  });

  // Desplazar al top al hacer clic en el botón
  $("#scrollToTopBtn").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 200);
    return false;
  });
});
