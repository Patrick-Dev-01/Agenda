// varivel que verifica se o menu esta fechado ou não
var fechado = true;

function abrir(){
    // pegar os elementos que vão sofrer alterações
    var menu_lateral = document.querySelector(".menu-lateral");
    var menu = document.getElementById("menu");
    var div_user = document.querySelector(".user");
    // se o menu estiver for aberto
    if(fechado == true){
        // mostrar menu
        menu_lateral.style.width = "300px";
        menu_lateral.style.height = "515px";
        menu_lateral.style.border = "1px solid white";
        menu_lateral.style.transition = "0.5s";
        menu.style.display = "block";
        div_user.style.display = "block";
        // não esta mais fechado
        fechado = false;
    }
    // se o usuario fechar
    else if(fechado == false){
        menu_lateral.style.width = "0px"
        menu_lateral.style.height = "0px";
        menu_lateral.style.border = "0px";
        menu.style.display = "none";
        div_user.style.display = "none";
        // menu fechado
        fechado = true;
    }
}
