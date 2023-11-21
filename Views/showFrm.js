const loginForm = document.getElementById("frm-login");
const registerForm = document.getElementById("frm-register");
const showRegFrm = document.getElementById("linkToRegister");
const showLogFrm = document.getElementById("linkToLogin");
const btnOpenModal = document.getElementById("open-modal");
const btnCloseModal=document.getElementById("close-modal");
const modal =document.getElementById("modal");

showRegFrm.addEventListener('click',function(event){
    event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo normal
    if (loginForm.style.display === "block") {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    } else {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    }
})
showLogFrm.addEventListener('click',function(event){
    event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo normal
    if (registerForm.style.display === "block") {
        registerForm.style.display = "none";
        loginForm.style.display = "block";
    } else {
        registerForm.style.display = "block";
        loginForm.style.display = "none";
    }
})
// Open dialog modal
btnOpenModal.addEventListener('click',()=>{
    modal.showModal();
});
btnCloseModal.addEventListener('click',()=>{
    modal.close();
})






