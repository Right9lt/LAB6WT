let colorPicker;
const defColor ="#ffffff";

window.addEventListener("load", init, false);
function init(){
colorPicker=document.getElementById("colorPicker");
colorPicker.value=defColor;
colorPicker.addEventListener("input", updateBG,false);
}

function updateBG(event){
document.body.style.backgroundColor=event.target.value;
}