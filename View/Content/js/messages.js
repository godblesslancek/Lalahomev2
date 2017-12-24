$('#btn_send_message').click(function(e){

    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

    var message = encodeURIComponent( $('#Message').val() );

    $('#btn_send_message').click(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

        var message = encodeURIComponent( $('#Message').val() );

        if(message != ""){ // on vérifie que les variables ne sont pas vides
            $.ajax({
                url : "index.php?controller=messages&action=send", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : "Message=" + message // et on envoie nos données
            });

            $('#messages').append("<p>" + message + "</p>"); // on ajoute le message dans la zone prévue
        }
    });



});
