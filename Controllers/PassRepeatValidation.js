const password1 = document.getElementById('inpPass1');
const password2 = document.getElementById('inpPass2');
const errorMessage = document.getElementById('error-message');
const btnSave = document.getElementById('btn-submit');
const password3 = document.getElementById('inpPass3');
const password4 = document.getElementById('inpPass4');
const errorMessage2 = document.getElementById('error-message2');
const btnSave2 = document.getElementById('btn-submit2');
btnSave.addEventListener('click',()=>{
     if(password1.value !== password2.value){
         errorMessage.style.display='block';
     } else{
         errorMessage.style.display='none';
     }
})
btnSave2.addEventListener('click',()=>{
    if(password3.value !== password4.value){
        errorMessage2.style.display='block';
    } else{
        errorMessage2.style.display='none';
    }
})