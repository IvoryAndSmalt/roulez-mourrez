let tableau = [1,2,3,4,5,6,7,8,9,10,11,12];

function mediane(tableau){
    tableau.sort();
    let taille_tableau = tableau.length;

    if (taille_tableau % 2 === 0){ //c'est pair
        let index_med = Math.floor(taille_tableau/2);
        console.log(tableau[1]);
        let mediane = (tableau[index_med]+tableau[index_med+1])/2;
        console.log(mediane);
    }
    else{ // impair

    }
}

console.log(mediane(tableau));