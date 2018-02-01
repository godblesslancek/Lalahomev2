$(document).ready(function(){
    getListBuilding();
    $('#btn_ajouter').click(function () {

        $("#content").load("View/pages/create_building.php", function(){
            autoComplete();
        });
    });
    $('#btn_modifier').click(function (event){
        $("#content").load("View/pages/update_building.php", function(){
            autoComplete();
            getBuilding($("#buildingselected").val())
        });
    })
    $('#btn_supprimer').click(function (event) {
        deleteBuilding($("#buildingselected").val());
    })

});

function getListBuilding(name) {
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=building&action=getBuildingList&name=" + name,
        datatype: "json",
        success: function (data) {
            createTable(data);
        }
    });
}function createTable(data) {
    $('#content').empty();
    $('#content').append('<center><table id="fieldsetTabBuilding"></table></center>');
    var row = JSON.parse(data);
    var header = {
        "name_building": "Nom Appartement",
        "nb_of_flats": "Nombre d'appartement",
        "address": "Adresse",
    };
    createRowHeader(header);
    $.each(row, function (index) {
        createRow(row[index]);
    });
    $('#fieldsetTabBuilding tr').click(function () {
        var id =  $(this).attr('id');
        $('#buildingselected').val(id);
        $(this).addClass("selected").siblings().removeClass("selected");
    });
}
function createRow(data) {
    var row = $('<tr id="' + data.id_building + '" />')
    $('#fieldsetTabBuilding').append(row);
    row.append($("<td>" + data.name_building + "</td>"));
    row.append($("<td>" + data.nb_of_flats+ "</td>"));
    row.append($("<td>" + data.address + "</td>"));

}
function createRowHeader(data) {
    var row = $('<tr id="' + data.id_user + '" />')
    $('#fieldsetTabBuilding').append(row);
    row.append($("<th>" + data.name_building + "</th>"));
    row.append($("<th>" + data.nb_of_flats+ "</th>"));
    row.append($("<th>" + data.address + "</th>"));

}

function validateForm() {
    $("#registration").validate({
        rules: {
            "LastName": {
                "required": true,
                "minlength": 2,
                "maxlength": 60000
            },
            "FirstName": {
                "required": true,
                "minlength": 2,
                "maxlength": 60000
            },
            "Email": {
                "required": true,
                "maxlength": 255
            },
            "Phone": {
                "required": true
            },
            "Password": {
                required: true,
                minlength: 8
            },
            messages: {
                LastName: {
                    required: "Please enter a valid LastName",
                },
                FirstName: {
                    required: "Please enter your FirstName",
                },
                Password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                Email: {
                    required: "Please enter a valid email address"
                }
            },

        }
    })
}

function autoComplete(){
    // Autocomplete
    $("#BM_name").autocomplete({
        minLength: 2,
        delay : 400,
        source: function (request, response) {
            $.ajax({
                url: "index.php", // on donne l'URL du fichier de traitement
                type: "GET", // la requête est de type POST
                data: "controller=user&action=userBMList&name=" + request.term, // et on envoie nos données,
                success: function(data) {
                    console.log(data)
                    response(JSON.parse(data));
                }
            });
        },
        focus: function(event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
        },
        select: function(event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $("#id_BM").val(ui.item.value);
        }
    });
}

function getBuilding(id_building){
    $.ajax({
        url: "index.php?controller=building&action=getBuilding",
        type: "POST",
        data: "id_building=" + id_building,
        datatype: "json",
        success: function(data) {
            dataP = JSON.parse(data);
            $.each(dataP, function (index,item) {
                $("#"+ item.name).val(item.value);
            });
        }

    });
}

function deleteBuilding(id_building){
    $.ajax({
        url: "index.php?controller=building&action=deleteBuilding",
        type: "POST",
        data: "id_building=" + id_building
    }).done(function () {
        getListBuilding();
    });
}