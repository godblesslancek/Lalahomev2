/*
    Effector Javascript
 */


$( document ).ready(function(){
    GetListRooms();
})


function GetListRooms(){
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=flat&action=getListRooms",
        datatype: "json",
        success: function (data) {
            data = JSON.parse(data);
            $("#pieces").empty();
            $.each(data,function(index){
                includeRoom(data[index]);
            });
        }
    }).done(function(){
        $(".piece").click(function(){
            var id_room  = $(this).attr("id");
            $("#selectedroom").val(id_room);
            $.ajax({
                url: "index.php",
                type: "GET",
                data: "controller=effector&action=getEffectorList&id_room=" + id_room,
                datatype: "json",
                success: function (data) {
                    data = JSON.parse(data);
                    $("#capteurs").empty();
                    $("#content").empty();
                    $.each(data,function(index){
                        includeType(data[index]);
                    });
                }
            }).done(function(){
                $(".capteur").click(function(){
                    afficher_Capteur($(this).attr('type'), $(this).attr("id"));
                });
            });

        });
        });
}

function GetEffectorList(id_room){
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=effector&action=getEffectorList&id_room=" + id_room,
        datatype: "json",
        success: function (data) {
            console.log(data);
        }
    });
}

function GetValueEffector(id_effector){
    return $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=effector&action=getEffectorState&id_effector=" + id_effector,
        datatype: "json",
        success: function (data) {
        }
    });
}

function ChangeValueEffector(id_effector){
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=effector&action=changeState&id_effector=" + id_effector,
        datatype: "json",
        success: function (data) {
        }
    });
}

function includeRoom(data){
    var html = '<div class="piece" id="'+ data.id +'"  >' +
        '<center><img src="View/Content/images/piece/' + data.name + '.png" alt="' + data.name + '" /></center></div>';

    $("#pieces").append(html);
}

function includeType(data){
    var html = '<div class="capteur" type="'+ data.type +'" id="'+ data.id +'" >\n' +
        '        <center><img src="View/Content/images/capteurs/'+ data.type +'.png" alt="' + data.type+ '" /></center>\n' +
        '    </div>'
    $("#capteurs").append(html);
}

function afficherEtatCapteur (etat, type){


    var html =   '<center><h1 id="type">' + type + '</h1>' +
        `  </br>
     <div class="demo">
     <div class="Switch ` + etat + `">
         <div class="Toggle"></div>
         <span class="On">ON</span> <span class="Off">OFF</span> </div>
    </div>
    <img id="image_capteurs" src="View/Content/images/capteurs/` + type + etat + `.png" alt="ONOFF" />
    </center>`

    return html;
}

function afficher_Capteur(type,id_capteur){

     GetValueEffector(id_capteur).done(
        function (data) {
            var etat;
            if (data == 1)
                etat = 'On';
            if (data == 0)
                etat = 'Off';

            $("#content").empty();
            $("#capteurs").empty();
            $("#content").append(afficherEtatCapteur(etat,type));
            $('.Switch').click(function() {
                if ($(this).hasClass('On')){
                    $(this).removeClass('On').addClass('Off');
                    etat = 'Off';
                    ChangeValueEffector(id_capteur);
                } else {
                    $(this).removeClass('Off').addClass('On');
                    etat = 'On';
                    ChangeValueEffector(id_capteur);
                }
                var img = 'View/Content/images/capteurs/' + type + etat + '.png'
                $("#image_capteurs").attr("src", img );
        }
    );
    });
}