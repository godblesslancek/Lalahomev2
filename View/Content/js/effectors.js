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
                $.ajax({
                    url: "index.php",
                    type: "GET",
                    data: "controller=sensor&action=getSensorsList&id_room=" + id_room,
                    datatype: "json",
                    success: function (data) {
                        data = JSON.parse(data);
                        $.each(data,function(index){
                            includeType(data[index]);
                        });
                    }
                }).done(function () {
                    $(".capteur").click(function(){
                        afficher_Capteur($(this).attr('type'), $(this).attr("id"));
                    });
                })
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

function GetValueSensor(id_sensor){
    return $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=sensor&action=getSensorValue&id_sensor=" + id_sensor,
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

    switch (type){
        case 'light':
            type_shown = "Lumière";
            break;
        case "alarm":
            type_shown = "Alarme";
            break;
    }

    var effector =   '<center><h1 id="type">' + type_shown + '</h1>' +
        `  </br>
     <div class="demo">
     <div class="Switch ` + etat + `">
         <div class="Toggle"></div>
         <span class="On">ON</span> <span class="Off">OFF</span> </div>
    </div>
    <img id="image_capteurs" src="View/Content/images/capteurs/` + type + etat + `.png" alt="ONOFF" />
    </center>`

    return effector;
}

function ChangeValue(id_sensor,value){
    $.ajax({
        url: "index.php?controller=sensor&action=changeValue",
        type: "GET",
        data: "id_sensor=" + id_sensor + "&value=" + value,
        datatype: "json",
        success: function (data) {
        }
    });
}
function SensorBox(data){

    return  sensor = `<div class="Temperatures" >
        <div class="moins"  id="btn_moins">
            <center><img src="View/Content/images/capteurs/moins.png" alt="moins" /></center>
        </div>

        <div class="valeurTemp" >
        </br>
        <h1 style="display: inline" id="valtemp">${data}</h1> <h1 style="display: inline">°C</h1>
    </div>

    <div class="plus" id="btn_plus">
    <center><img src="View/Content/images/capteurs/plus.png" alt="plus" /></center>
    </div>
    </div>`
}

function afficher_Capteur(type,id_capteur){


    $("#content").empty();
    $("#capteurs").empty();
    if(['temp'].includes(type)){
        GetValueSensor(id_capteur).done(function (data) {
            $("#content").append(SensorBox(data));
            $(".plus").click(function(e){
                ChangeValue(id_capteur,1);
                var val = Number($("#valtemp").text()) +1
                $("#valtemp").empty();
                $("#valtemp").append(val);
            });
            $(".moins").click(function(e){
                ChangeValue(id_capteur,-1);
                var val = Number($("#valtemp").text()) - 1
                $("#valtemp").empty();
                $("#valtemp").append(val);
            });

        });
    }
    else{
        GetValueEffector(id_capteur).done(
            function (data) {
                var etat;
                if (data == 1)
                    etat = 'On';
                if (data == 0)
                    etat = 'Off';
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


}