/*
    Effector Javascript
 */


$( document ).ready(function(){

})


function GetListRooms(){
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=flat&action=getListRooms",
        datatype: "json",
        success: function (data) {
            console.log(data);
        }
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
    $.ajax({
        url: "index.php",
        type: "GET",
        data: "controller=effector&action=getEffectorState&id_effector=" + id_effector,
        datatype: "json",
        success: function (data) {
            console.log(data);
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
            console.log(data);
        }
    });
}
