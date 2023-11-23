const textarea = document.getElementById('miTextarea');
const contador = document.getElementById('contador-caracteres');
const maxCaracteres = 100;

textarea.addEventListener('input', function() {
  const caracteresRestantes = maxCaracteres - textarea.value.length;
  contador.textContent = `Caracteres restantes: ${caracteresRestantes}`;
  
  if (caracteresRestantes < 0) {
    // Aquí puedes agregar acciones adicionales, como deshabilitar la entrada
    // o cambiar el estilo para indicar que se ha excedido el límite.
    contador.style.color = 'red';
  } else {
    contador.style.color = 'black';
  }
});