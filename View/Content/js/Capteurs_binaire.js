$( document ).ready(function(){
    $(".salon").click(function (){

        onClick("Lumiere",1)
    });

});


function getEtatCapteur(id_piece, type){
    return "On"; 
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

function onClick(type,id_piece){

                $("#content").empty();
                $("#content").append(function (){
                    var etat = getEtatCapteur(id_piece,type);
                    var html = afficherEtatCapteur(etat,type);
                    return html;
                });
                $('.Switch').click(function() {

                    // Check If Enabled (Has 'On' Class)
                    if ($(this).hasClass('On')){
                        
                        // Change Button Style - Remove On Class, Add Off Class
                        $(this).removeClass('On').addClass('Off');
                        etatCapteur = 'Off';
                        
                    } else { // If Button Is Disabled (Has 'Off' Class)
                        
                        // Change Button Style - Remove Off Class, Add On Class
                        $(this).removeClass('Off').addClass('On');
                        etatCapteur = 'On';
                    }
                    var typeCapteur = $('#type').text();
                    var img = 'View/Content/images/capteurs/' + typeCapteur + etatCapteur + '.png'
                    $("#image_capteurs").attr("src", img );
                });
            }