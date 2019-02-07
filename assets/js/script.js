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

// ======FIN NAVIGATIOn=======




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

// Couleurs en fonction du % obtenu 

var resultatObtenu = document.getElementsByClassName("resultatObtenu");
var boutonEnvoyer = document.getElementsByClassName("boutonEnvoyer");
var totalAccident=100000;

boutonEnvoyer[0].addEventListener("click", function() { rempliCarte(); });

function rempliCarte() { 
    if (resultatObtenu !=0 && resultatObtenu != null) {
        for (var path of paths) {
            resultatObtenu += (resultatObtenu.value*100)/totalAccident; 
            
            if (resultatObtenu < 30){
                path.style = "yellow";
            }
            if (30 < resultatObtenu && resultatObtenu > 60){
                path.style = "red";
            }
            if (resultatObtenu > 60){
                path.style= "black";
            }
        }
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

//Fonction qui remplit les tableaux
let myselects = document.getElementsByClassName('select');
let mylabels = document.getElementsByClassName('label');

function addToArray(){
    let tags = [];
    let postselect = [];
    for (let i = 0; i < myselects.length; i++) {
        if(myselects[i].value !== ""){
            tags.push(mylabels[i].innerHTML+" "+myselects[i].value);
            postselect.push(myselects[i].name);
            postselect.push(myselects[i].value);
        }
    }
    return [tags, postselect];
}

let tagsdiv = document.getElementsByClassName('tags')[0];
let tags = [[]];
//Quand on change les select, on remplit les tableaux
for (let i = 0; i < myselects.length; i++) {
    myselects[i].addEventListener('change', function(){

        tagsdiv.innerHTML = "";
        if(tags[0].length >= 5){
            myselects[i].value = "";
            //afficher message d'erreur;
        }
        else {
            tags = addToArray();
        }
        for (let i = 0; i < tags[0].length; i++) {
            let mytag = document.createElement('p');
            mytag.classList.add("tag");
            mytag.innerHTML = tags[0][i];
            tagsdiv.appendChild(mytag);
        }
        console.log("select");
        console.log(tags[1]);
        for (let i = 0; i < tags[1].length; i++) {
            console.log(tags[1][i]);
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

//AJAX
let submit = document.getElementsByClassName('boutonEnvoyer');

submit[0].addEventListener('click', function(e){
    e.preventDefault();
    
    //Objet AJAX ici
    var xhttp = new XMLHttpRequest();
        xhttp.open("POST", 'Controllers/JajaxController.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        //vérifier combien d'éléments sont choisis. En fonction de ça, envoyer la requête avec le bon nombre de variables POST
        if(typeof tags[1] !== 'undefined'){

                switch (tags[1].length) {
                case 10:
                    xhttp.send(tags[1][0]+'='+tags[1][1]+"&"+tags[1][2]+'='+tags[1][3]+"&"+tags[1][4]+'='+tags[1][5]+"&"+tags[1][6]+'='+tags[1][7]+"&"+tags[1][8]+'='+tags[1][9]);
                break;

                case 8:
                    xhttp.send(tags[1][0]+'='+tags[1][1]+"&"+tags[1][2]+'='+tags[1][3]+"&"+tags[1][4]+'='+tags[1][5]+"&"+tags[1][6]+'='+tags[1][7]);
                break;

                case 6:
                    xhttp.send(tags[1][0]+'='+tags[1][1]+"&"+tags[1][2]+'='+tags[1][3]+"&"+tags[1][4]+'='+tags[1][5]);
                break;

                case 4:
                    xhttp.send(tags[1][0]+'='+tags[1][1]+"&"+tags[1][2]+'='+tags[1][3]);
                break;

                case 2:
                    xhttp.send(tags[1][0]+'='+tags[1][1]);
                break;
                case 0:
                    xhttp.send('default=default');
                break;
            }
        }
        else{
            xhttp.send('default=default');
        }
        // ('ftp_url='+serverurl+'&ftpuser='+usernamepop+'&ftppassword='+passwordpop)

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                console.log("response = ");
                console.log(response);
                //du code si ça a marché
            }
            else if(this.status !== 200){
                console.log("erreur");
            }
        }
});