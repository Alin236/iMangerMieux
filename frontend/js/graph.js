var id_utilisateur;

$(document).ready(function() {
    id_utilisateur = $('#id_utilisateur').html();
    plotCountFruitVegetable();
    plotDailyAnalysis();
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

function plotDailyAnalysis(){
    const couleurs=['red','green', 'blue', 'yellow', 'grey'];
    const url = '/backend/dailyAnalysis.php?id_utilisateur=' + id_utilisateur;
    $.get(url, function(response){
        data = [];
        Object.entries(response).forEach(([key, value]) => {
            data.push(value);
        });

        $('#dailyAnalysis').empty();
        var svg = d3.select("#dailyAnalysis").append("svg")
            .attr("width","200px")
            .attr("height","200px")
            .style("border","1px solid black");

        var pieDailyAnalysis=d3.pie();
        pieDailyAnalysis.value(function(d){
                return d;
            });

        var arc=d3.arc().innerRadius(0).outerRadius(88);

        var grp=svg.append("g").attr("transform","translate(100,100)");
        grp.selectAll("path").data(pieDailyAnalysis(data))
            .enter()
            .append("path")
            .attr("fill",function(d,i){
                return(couleurs[i]);
            })
            .attr("d",arc);
        
        $('#dailyAnalysis').append('<ul id="dailyAnalysisList"></ul>')
        var i = 0;
        Object.entries(response).forEach(([key, value]) => {
            d3.select('#dailyAnalysisList').append('li').style('list-style','none').append('p').html(value+' '+key).style('border', '1px solid ' + couleurs[i]);;
            i++;
        });

    }, 'json').fail(function(){
        console.log('Fail : chargement de l\'analyse journalière');
    });
}