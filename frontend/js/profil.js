var nom;
var prenom;
var mail;
var genre;
var date_de_naissance;

$(document).ready(function() {
    $('#modifier').click(function(){modifier()});
    $('#annuler').click(function(){annuler()});
    nom = $('#nom').html();
    prenom = $('#prenom').html();
    mail = $('#mail').html();
    genre = $('#genre').html();
    date_de_naissance = $('#date_de_naissance').html();
});

var modifying = false;
function modifier(){
    if(!modifying){
        $('#nom').replaceWith('<input id="nom" value="'+nom+'">');
        $('#prenom').replaceWith('<input id="prenom" value="'+prenom+'">');
        $('#mail').replaceWith('<input id="mail" value="'+mail+'">');
        $('#genre').replaceWith('<input id="genre" value="'+genre+'">');
        $('#date_de_naissance').replaceWith('<input id="date_de_naissance" value="'+date_de_naissance+'">');
        $('#modifier').html('Envoyer');
        $('#annuler').toggleClass('invisible', false);
        modifying = true;
    }
    else{
        const data = {
            'id_utilisateur':24,
            'login': $('#mail').val(),
            'date_de_naissance': $('#date_de_naissance').val(),
            'genre': $('#genre').val(),
            'nom': $('#nom').val(),
            'prenom': $('#prenom').val()
        }
        $.ajax({
            method: 'PUT',
            url: makeParameters('/backend/user.php', data),
            dataType: 'json',
            success: function(){
                nom = data.nom;
                prenom = data.prenom;
                mail = data.login;
                genre = data.genre;
                date_de_naissance = data.date_de_naissance;
                annuler();
            }
        });
    }
}

function annuler(){
    $('#nom').replaceWith('<p id="nom">'+nom+'</p>');
    $('#prenom').replaceWith('<p id="prenom">'+prenom+'</p>');
    $('#mail').replaceWith('<p id="mail">'+mail+'</p>');
    $('#genre').replaceWith('<p id="genre">'+genre+'</p>');
    $('#date_de_naissance').replaceWith('<p id="date_de_naissance">'+date_de_naissance+'</p>');
    $('#modifier').html('Modifier');
    $('#annuler').toggleClass('invisible', true);
    modifying = false;
}

function makeParameters(url, json){
    const keys = Object.keys(json);
    url += '?';
    keys.forEach(key => {
        url += key+'='+json[key]+'&';
    });
    url = url.slice(0,-1);
    return url;
}