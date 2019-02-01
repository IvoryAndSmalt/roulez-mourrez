
        // ==================== SECTION DEPARTEMENTS ====================================

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