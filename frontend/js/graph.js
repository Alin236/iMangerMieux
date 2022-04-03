var id_utilisateur;
var jour;

$(document).ready(function() {
    id_utilisateur = $('#id_utilisateur').html();
    jour = $('#jour').html();
    plotCountFruitVegetable();
});

function plotCountFruitVegetable(){
    const url = '/backend/countFruitVegetable.php?id_utilisateur=' + id_utilisateur + '&jour=' + jour;
    $.get(url, function(response){
        $('#countFruitVegetable').append('<p class="card-text text-center">' + response + '/5</p>');
    }, 'json').fail(function(){
        console.log('Fail : chargement de la consommation de fruits et légumes');
    });
}