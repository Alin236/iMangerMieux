$(document).ready(function(){
    $('#authenticationForm').attr('onsubmit',"onFormSubmit()");
});

function onFormSubmit() {
    //Prevent the form to be sent to the server
    event.preventDefault();
    let login = $('#inputLogin').val();
    let motDePasse = $('#inputMotDePasse').val();
    if(login != ''){
        let data;
        data = {'login': login, 'mot_de_passe': motDePasse};
        $.post('/backend/user.php', data, function(response){
            response = response[0];
            userInfo = {'id_utilisateur': response[0], 'nom': response[1], 'prenom': response[2], 'mail': response[3], 'genre': response[4], 'date_de_naissance': response[5]};
            $.post('session', userInfo, function(){
                document.location.reload();
            }, 'json').fail(function(){
                console.log('Fail : création de la session');
            });
        }, 'json').fail(function(){
            console.log('Fail : authentification');
        });
    }
}