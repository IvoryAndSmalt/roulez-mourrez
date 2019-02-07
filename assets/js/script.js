// =============== NAVIGATION ======================
let menuicons = document.getElementsByClassName('menuicon');
let menuul = document.getElementsByClassName('menuul');
let formulaire = document.getElementById('formulaire');
let main = document.querySelector('main');
for (let j = 0; j < menuul.length; j++) {
    menuul[j].style.display="none";
}

for (let i = 0; i < menuicons.length; i++) {
    menuicons[i].addEventListener('click', function(e){
        e.preventDefault();
        menuul[i].style.top= parseInt(window.getComputedStyle(formulaire).height)+5+"px";
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

main.addEventListener('click', function(){
    for (let j = 0; j < menuul.length; j++) {
        menuul[j].style.display="none";
    }
})

var selects = document.getElementsByClassName("select");
var nomDuChamp = document.getElementsByClassName("label");
var contenuTableau = [];

for (let i = 0; i < selects.length; i++) {

    selects[i].addEventListener('change', function(){

        modifieTexte(i);

    })
}

function modifieTexte(i) {
    if (contenuTableau.indexOf(valeurChamp) === -1) {

        // Ajoute les valeurs au tableau
        contenuTableau.push(valeurChamp, valeurSelect);
        
        // Insère le tableau et enlève les , entre les cases
        resultatSelection.innerHTML = contenuTableau.join(' ');

    }
    else if (contenuTableau.indexOf(valeurChamp) === 0) {
        
    }
}


// =========== SECTION DEPARTEMENTS =================

var map = document.querySelector('#map');
var paths = map.querySelectorAll('.map--image a'); // selectionne les differentes formes géométriques
var links = map.querySelectorAll('.map--list a'); // selectionne les differents liens

// lorsque l'on rentre sur un chemin 

    // Polyfill du foreach pour le rendre accessible partout 
    if (NodeList.prototype.forEach === undefined) {
        NodeList.prototype.forEach = function (callback) {
            [].forEach.call(this, callback)
        }
    }

// Fonction qui active l'élément 
var activeArea = function (id) {
    map.querySelectorAll('.is-active').forEach(function (item) {
            item.classList.remove('is-active');
        }) // Permet de déselectionner le lien actif précédent
    if(id !== undefined) {
        document.querySelector('#list-' + id).classList.add('is-active');
        document.querySelector('#dpt-' + id).classList.add('is-active');
    }
}

// Rend les formes géométriques active avec la list au passage de la souris
paths.forEach(function (path) {
    path.addEventListener('mouseenter', function (event) {
        // debugger
        var id = this.id.replace('dpt-', '');
        activeArea(id);
    })
})

// Inverse : Rend la list active avec les formes géométriques au passage de la souris
links.forEach(function (link) {
    link.addEventListener('mouseenter', function (event) {
        // debugger
        var id = this.id.replace('list-', '');
        activeArea(id);
    })
})

// En dehors de la carte plus aucun élément sélectionné
map.addEventListener('mouseleave', function () {
    activeArea();
})



var total = document.getElementsByClassName("total").innerHTML;
var totalDepartement = document.getElementById("totalDepartement");
console.dir(totalDepartement);

var tableauResultatDpt = new Array;
var tableauValeurDpt = new Array;

var boutonEnvoyer = document.getElementsByClassName("boutonEnvoyer");



boutonEnvoyer[0].addEventListener("click", function() { rempliCarte(); });


function rempliCarte() { // Couleurs en fonction du % obtenu 
    console.log("cc");
    tableauResultatDpt.push(totalDepartement); // Tableau du total en fonction des départements
    tableauValeurDpt.push(departement);
    

    for (let i = 0; i < tableauResultatDpt.length; i++) {

        total += (tableauResultatDpt[i].value * 100)/total; 

        for (var path of paths) {
            
            if (total < 30){
                path.style = "yellow";
            }
            if (30 < total && total > 60){
                path.style = "red";
            }
            if (total > 60){
                path.style= "black";
            }
        }
    }
}



/***************************************/
/**************  NEW JaJAX  ************/
/***************************************/

// On créer une class qui contient les paths

class LinkedPaths {
    constructor($paths) { //propriété
        this.$paths = $paths //intancier le paths
    this.$placeholder = this.$target.firstElementChild // Pour récupérer la valeur par défaut on cible l'enfant
        
        this.onchange = this.onChange.bind(this), 500        //bind permet que This fera tjr référence à cette class 
        this.cache = {} // Pour éviter de recharger les choix déja fait
        
        //Puis écouteur qd changement, nouvelle méthode
        this.$paths.addEventListener('change', this.onChange)
    }
}



/***************************************/
/***************    AJAX    ************/
/***************************************/

// paths.forEach(function (path) {
//     path.addEventListener('click', function (event) {
//         event.preventDefault();
//         ajax();
//     })
// })

// links.forEach(function (link) {
//     link.addEventListener('click', function (event) {
//         event.preventDefault();
//         ajax();
//     })
// })

// //Création d'un objet pour permettre de faire des requêtes http pour échanger du XML

// // var xhr = null; 
 
// if(window.XMLHttpRequest) // Firefox et autres
//     xhr = new XMLHttpRequest(); 
// else if(window.ActiveXObject){ // Internet Explorer 
//     try {
//             xhr = new ActiveXObject("Msxml2.XMLHTTP");
//         } catch (e) {
//             xhr = new ActiveXObject("Microsoft.XMLHTTP");
//         }
// }
// else { // XMLHttpRequest non supporté par le navigateur 
//     alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
//     xhr = false;
// }

// // Méthode qui sera appelée sur le click du bouton

// function ajax(){
//     var xhr = getXhr()
//     // On défini ce qu'on va faire quand on aura la réponse
//     xhr.onreadystatechange = function(){
//         // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
//         if(xhr.readyState == 4 && xhr.status == 200){

//             contenuTableau = xhr.responseText;
//         }
//     }

//     // Methode POST et appel de la page home pour exécuter les requêtes
//     xhr.open("POST","home.php",true);

//     // Changement du type MINE pour le POST
//     xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

//     // Arguments
//     xhr.send("variable1=truc&variable2=bidule");

//     // ici, l'id de l'auteur
//     sel = document.getElementById('auteur');
//     idauteur = sel.options[sel.selectedIndex].value;
//     xhr.send("idAuteur="+idauteur);
// }

// // let croixfermer = document.getElementById('');
// let select_i = document.getElementById('');

// croixfermer.addEventListener('click', function(){
//     select_i.value="";
// })

let myselects = document.getElementsByClassName('select');
let mylabels = document.getElementsByClassName('label');
let tagsdiv = document.getElementsByClassName('tags')[0];
let tags = [];

for (let i = 0; i < myselects.length; i++) {
    myselects[i].addEventListener('change', function(){
        tagsdiv.innerHTML = "";
        if(tags.length >= 5){
            myselects[i].value = "";
            //afficher message d'erreur;
        }
        else{
            tags = addToArray();
        }
        for (let i = 0; i < tags.length; i++) {
            let mytag = document.createElement('p');
            mytag.classList.add("tag");
            mytag.innerHTML = tags[i];
            tagsdiv.appendChild(mytag);
        }
    });
}

// ============ BOUTON CLEAR ===================
// let clear = document.getElementById('clear');
// clear.addEventListener('click', function(e){
//     e.preventDefault();
//     tagsdiv.innerHTML = "";
//     for (let i = 0; i < myselects.length; i++) {
//         myselects[i].value = "";
//     }
// })

// function addToArray(){
//     let tags = [];
//     for (let i = 0; i < myselects.length; i++) {
//         if(myselects[i].value !== ""){
//             tags.push(mylabels[i].innerHTML+" "+myselects[i].value);
//         }
//     }
//     return tags;
// }
