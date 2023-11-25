const inputs = document.querySelectorAll('.pin-input');
inputs.forEach((input, index) => {
  input.addEventListener('input', (e) => {
    if (e.inputType === 'deleteContentBackward') {
      // Permitir eliminar números solo si hay contenido
      if (index !== 0 && !inputs[index].value) {
        inputs[index - 1].focus();
      }
    } else {
      // Asegurar que solo se ingrese un número
      const value = e.data;
      if (!/^\d$/.test(value)) {
        input.value = '';
        return;
      }

      // Si hay contenido, pasar al siguiente input
      if (value && index !== inputs.length - 1) {
        inputs[index + 1].focus();
      }
    }
  });
  // Al presionar "Retroceso", regresar al input anterior
  input.addEventListener('keydown', (e) => {
    if (e.key === 'Backspace' && !inputs[index].value && index !== 0) {
      inputs[index - 1].focus();
    }
  });
});