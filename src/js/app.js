document.addEventListener("DOMContentLoaded", function(){
    eventListeners();
    darkMode();
    agregarEstilo();
})

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion")

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove("mostrar");
    }else{
        navegacion.classList.add("mostrar");
    }
}

//Evento de darkMode
function darkMode(){
    const btnDarkMode = document.querySelector(".dark-mode-boton");

    btnDarkMode.addEventListener('click', function(e){
        document.body.classList.toggle('dark-mode');

        infoBtnDarkMode = e.target
        accesoAlPadreDM(infoBtnDarkMode);
    })
}

function accesoAlPadreDM(info){
    let elementoBody = info;

    //Escalar el Doom al padre
    while(elementoBody && elementoBody.tagName !== 'BODY'){
        elementoBody = elementoBody.parentElement;
    }

    let nombreClaseBody = elementoBody.classList.value
    validarDMLocalStorange(nombreClaseBody);
}

function validarDMLocalStorange(nomBody){
   
    if(nomBody === "dark-mode"){
        localStorage.setItem('DarkMode', 'negro')
        agregarEstilo();
    }else{
        localStorage.setItem('DarkMode', 'blanco')
        agregarEstilo();
    }
}

function agregarEstilo(){
    let estadoDarkMode = localStorage.getItem('DarkMode');
    if(estadoDarkMode == "negro"){
        document.body.classList.add('dark-mode');
    }else{
           document.body.classList.remove('dark-mode');
    }
}
