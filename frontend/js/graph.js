var id_utilisateur;

$(document).ready(function() {
    id_utilisateur = $('#id_utilisateur').html();
    plotCountFruitVegetable();
});

$( "#jour" ).change(function() {
    plotCountFruitVegetable();
});

function plotCountFruitVegetable(){
    const jour = $('#jour').val();
    const url = '/backend/countFruitVegetable.php?id_utilisateur=' + id_utilisateur + '&jour=' + jour;
    $.get(url, function(response){
        $('#countFruitVegetable').empty();
        $('#countFruitVegetable').append('<p class="card-text text-center">' + response + '/5</p>');
    }, 'json').fail(function(){
        console.log('Fail : chargement de la consommation de fruits et légumes');
    });
}