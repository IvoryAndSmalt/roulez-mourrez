// =============== NAVIGATION ============================
let menuicons = document.getElementsByClassName('menuicon');
let menuul = document.getElementsByClassName('menuul');
let formulaire = document.getElementById('formulaire');
for (let j = 0; j < menuul.length; j++) {
    menuul[j].style.display="none";
}

for (let i = 0; i < menuicons.length; i++) {
    menuicons[i].addEventListener('click', function(e){
        e.preventDefault();
        menuul[i].style.top= parseInt(window.getComputedStyle(formulaire).height)+"px";
        if(menuul[i].style.display==="block"){
            for (let j = 0; j < menuul.length; j++) {
                menuul[j].style.display="none";
            }
        }
        else{
            for (let j = 0; j < menuul.length; j++) {
                menuul[j].style.display="none";
            }
            menuul[i].style.display="block";
        }
    })
}


var selects = document.getElementsByClassName("select");
var nomDuChamp = document.getElementsByClassName("label");
var contenuTableau = [];

for (let i = 0; i < selects.length; i++) {

    selects[i].addEventListener('change', function(){

        modifieTexte(i);

    })
}

function modifieTexte(i) {

    var resultatSelection = document.getElementById('resultatSelection');
    var valeurChamp = nomDuChamp[i].innerHTML;
    var valeurSelect = selects[i].value;

        // Assigne Clé valeur
        contenuTableau[valeurChamp] = valeurSelect;

        
        // Insère le tableau et enlève les , entre les cases
        resultatSelection.innerHTML = contenuTableau.join(' ');

        console.log(contenuTableau);
}