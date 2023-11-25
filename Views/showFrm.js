const loginForm = document.getElementById("frm-login");
const registerForm = document.getElementById("frm-register");
const showRegFrm = document.getElementById("linkToRegister");
const showLogFrm = document.getElementById("linkToLogin");

// open buttons
const btnOpenModal = document.getElementById("open-modal");
const btnOpenPinModal = document.getElementById("open-modal2");
const btnOpenRecoveryPassModal = document.getElementById("open-modal3");

// close buttons
const btnCloseModal = document.getElementById("close-modal");
const btnClosePinModal = document.getElementById("close-modal2");
const btnCloseRecoveryPassModal = document.getElementById("close-modal3");
// const modal =document.getElementById("modal");


// modals
const modal = document.getElementById("modal");
const modalPin = document.getElementById("modal2");
const modalRecover = document.getElementById("modal3");

showRegFrm.addEventListener("click", function (event) {
  event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo normal
  if (loginForm.style.display === "block") {
    loginForm.style.display = "none";
    registerForm.style.display = "block";
  } else {
    loginForm.style.display = "block";
    registerForm.style.display = "none";
  }
});
showLogFrm.addEventListener("click", function (event) {
  event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo normal
  if (registerForm.style.display === "block") {
    registerForm.style.display = "none";
    loginForm.style.display = "block";
  } else {
    registerForm.style.display = "block";
    loginForm.style.display = "none";
  }
});

// open  first dialog modal
btnOpenModal.addEventListener("click", () => {
  modal.showModal();
});
// close firs dialog modal
btnCloseModal.addEventListener("click", () => {
  modal.close();
});
// open second dialog modal
btnOpenPinModal.addEventListener('click',()=>{
    modalPin.showModal();
});
btnClosePinModal.addEventListener('click',()=>{
    modal.close();
    modalPin.close();
});
// open third dialog modal
btnOpenRecoveryPassModal.addEventListener('click',()=>{
    modalRecover.showModal();
});
btnCloseRecoveryPassModal.addEventListener('click',()=>{
    modal.close();
    modalPin.close();
    modalRecover.close();
})

