
const mis_selectores = document.querySelectorAll('.my_selector');
function cambiar_colores(){
    const selectores = document.getElementsByName("combinacion[]");
    for (let i = 0; i < selectores.length; i++) {
        let color = selectores[i].value;
        selectores[i].className = color;
    }
    // console.log(selectores);
}

cambiar_colores();
for(let i = 0; i < mis_selectores.length; i++){
    mis_selectores[i].addEventListener("change", cambiar_colores);
}
