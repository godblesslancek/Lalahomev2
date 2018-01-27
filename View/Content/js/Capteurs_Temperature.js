$( document ).ready(function(){
    $(".plus").click(function(e){
        ajouter($("#valtemp").text());
    });
    $(".moins").click(function(e){
        soustraire($("#valtemp").text());
    });
});



function setTemperature(temp){
    $("#valtemp").empty ();
    $("#valtemp").append(temp);
}

function ajouter (temp){

    if (temp>29){ 
        alert("Température maximale atteinte")
    }
    else {
        setTemperature(Number(temp)+1);
    }
}

function soustraire (temp){

    if (temp<16){
        alert("Température minimale atteinte")
    }
    else {
        setTemperature(Number(temp)-1);
    }
}