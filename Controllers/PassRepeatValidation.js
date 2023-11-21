const password1 = document.getElementById('inpPass1');
const password2 = document.getElementById('inpPass2');
const errorMessage = document.getElementById('error-message');
const btnSave = document.getElementById('btn-submit');
btnSave.addEventListener('click',()=>{
     if(password1.value !== password2.value){
         errorMessage.style.display='block';
     } else{
         errorMessage.style.display='none';
     }
})