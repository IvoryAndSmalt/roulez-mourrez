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

    if (contenuTableau.indexOf(valeurChamp) === -1) {

        // Ajoute les valeurs au tableau
        contenuTableau.push(valeurChamp, valeurSelect);
        
        // Insère le tableau et enlève les , entre les cases
        resultatSelection.innerHTML = contenuTableau.join(' ');

    }
    else if (contenuTableau.indexOf(valeurChamp) === 0) {
        
    }
        console.log(contenuTableau);
}

