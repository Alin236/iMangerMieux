$(document).ready(function() {
    $('#modifier').click(function(){modifier()});
});

function modifier(){
    console.log($('.container-fluid p'));
    $('.container-fluid p').replaceWith(function(){
        return '<input id="'+this.id+'" value="'+this.innerHTML+'"></input>'
    });
}