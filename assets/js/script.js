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


/***************************************/
/**************  NEW JaJAX  ************/
/***************************************/

// On créer une class qui contient les paths

// class LinkedPaths {
//     constructor($paths) { //propriété
//         this.$paths = $paths //intancier le paths
//     this.$placeholder = this.$target.firstElementChild // Pour récupérer la valeur par défaut on cible l'enfant
        
//         this.onchange = this.onChange.bind(this), 500        //bind permet que This fera tjr référence à cette class 
//         this.cache = {} // Pour éviter de recharger les choix déja fait
        
//         //Puis écouteur qd changement, nouvelle méthode
//         this.$paths.addEventListener('change', this.onChange)
//     }
// }



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
        for (let i = 0; i < tags[1].length; i++) {
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
let totalp = document.getElementsByClassName('total');

submit[0].addEventListener('click', function(e){
    e.preventDefault();
    
    //Objet AJAX ici
    var xhttp = new XMLHttpRequest();
        xhttp.open("POST", 'Controllers/JajaxController.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

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

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                console.log("response = ");
                console.log(response);
                totalp[0].innerHTML = response.total;
                //du code si ça a marché
            }
            else if(this.status !== 200){
                console.log("erreur");
            }
        }
});