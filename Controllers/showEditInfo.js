const infoView = document.getElementById("info-view");
const infoEdit = document.getElementById("edit-info");
const btnShowEditInfo = document.getElementById("btn-edit");
const btnShowInfo = document.getElementById("btn-cancel");




btnShowEditInfo.addEventListener('click',function(event){
    event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo normal
    if (infoView.style.display === "block") {
        infoView.style.display = "none";
        infoEdit.style.display = "block";
    } else {
        infoView.style.display = "block";
        infoEdit.style.display = "none";
    }
})
btnShowInfo.addEventListener('click',function(event){
    event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo normal
    if (infoEdit.style.display === "block") {
        infoEdit.style.display = "none";
        infoView.style.display = "block";
    } else {
        infoEdit.style.display = "block";
        infoView.style.display = "none";
    }
})