$( document ).ready(function() {
    getconversation();


    $('#btn_send_message').click(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

        var message = encodeURIComponent( $('#Message').val() );
        var IDReceiver = $('#IDuserConv').val();

        if(message != ""){ // on vérifie que les variables ne sont pas vides
            $.ajax({
                url : "index.php?controller=messages&action=send", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : "Message=" + message + "&IDReceiver=" + IDReceiver ,
                success: function (data) {
                    date = new Date();
                    message = escapeHtml($('#Message').val())
                    addmessage(true,message, date.toUTCString()); // on ajoute le message dans la zone prévue
                    $('#Message').val('');
                }
            });
        }

    });

    // Autocomplete
    $("#search-box").autocomplete({
        minLength: 2,
        delay : 400,
        source: function (request, response) {
            $.ajax({
                url: "index.php", // on donne l'URL du fichier de traitement
                type: "GET", // la requête est de type POST
                data: "controller=messages&action=getUser&search=" + request.term, // et on envoie nos données,
                success: function (data) {
                    response(JSON.parse(data));
                }
            });
        }
    });


});



function getmessage(IDConv) {
    var IDUser = getCookie('IDuser');
    $.ajax({
        url : "index.php", // on donne l'URL du fichier de traitement
        type : "GET", // la requête est de type POST
        data : "controller=messages&action=retreivemessage&IDconv=" + IDConv, // et on envoie nos données,
        success: function (data) {

            var messages = JSON.parse(data);
            $.each(messages, function(index, obj){
                if (IDUser == obj.id_sender)
                    addmessage(true,obj.message, obj.datetime);
                else
                    addmessage(false,obj.message, obj.datetime);
            });
        }
    });


}

function getconversation(){
    $.ajax({
        url : "index.php", // on donne l'URL du fichier de traitement
        type : "GET", // la requête est de type POST
        data : "controller=messages&action=retreiveconversation", // et on envoie nos données,
        success: function (data) {
            var converversations = JSON.parse(data);
            $.each(converversations,function(index){
                addconversation(converversations[index][0],converversations[index][1],converversations[index][2]);
            })

            $(".conversation").click(function(){
                var IDUser = $(this).attr('iduser');
                $('#messages').empty();
                $('#IDuserConv').val(IDUser);
                getmessage(IDUser);
            });

            getmessage(converversations[0][2]); // Get message of the last conversation.
        }
    });

}

function addmessage(sender, message, time){
    if(!sender){
        $('#messages').append('<div class="message darker">\n' +
        '            <img src="View/Content/images/BM_avatar.png" alt="Avatar" class="right">\n' +
        '            <p>' + message + '</p>\n' +
            '<span class="time-left">' + time + '</span>' +
        '        </div>');
    }
    else{
        $('#messages').append('<div class="message">\n' +
            '            <img src="View/Content/images/user_avatar.jpeg" alt="Avatar" class="right">\n' +
            '            <p>' + message + '</p>\n' +
            '<span class="time-right">' + time + '</span>' +
            '        </div>');
    }
}

function addconversation(display_name, role, iduser){

    $('#panel-left').append('<div class="conversation" iduser="' + iduser+'">\n' +
        '            <img src="View/Content/images/user_avatar.jpeg" alt="Avatar">\n' +
        '            <p>' + display_name + '</p>\n' +
        '        </div>');

}

