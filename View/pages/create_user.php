<?php

?>
<html>
     <div id="div1">
        <center>
        <button type="button" OnClick="alert=('Redirection')">Ajouter</button>
        <button type="button" OnClick="alert('Touche')">Modifier</button>
        <button type="button" OnClick="alert('Touche')">Supprimer</button>
        </center>
     </div><br/>
    <div id="div2">
        <form method="post" action="index.php?controller=user&action=register">
 
            <div class="gauche">
                <fieldset>
                    <p>
                        <span class="label"><label for="Name">Nom:</label></span>
                        <span class="controle"><input type="text" class="text" id="Name" name ="LastName" maxlength="20" /></span>
                    </p>
                    <p>
                        <span class="label"><label for="FirstName">Prénom:</label></span>
                        <span class="controle"><input type="text" class="text" id="FirstName" name="FirstName" maxlength="40" /></span>
                    </p>

                    <p>
                        <span class="label"><label for="Email">Email:</label></span>
                        <span class="controle"><input type="email" class="text" id="Email" name="Email" maxlength="80" /></span>
                    </p>
                    
                    <p>
                        <span class="label"><label for="Phone">Telephone:</label></span>
                        <span class="controle"><input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="text" id="Phone" name="Phone" maxlength="10"/></span>
                    </p>

                    <p>
                        <span class="label"><label for="Password">Mot de passe:</label></span>
                        <span class="controle"><input type="password" class="text" id="Password" name="Password" maxlength="80" /></span>
                    </p>

                    <p>
                        <span class="label"><label for="Password_Verif">Confirmer mot de passe:</label></span>
                        <span class="controle"><input type="password" class="text" id="Password_Verif" name="Password_Verif" maxlength="80" /></span>
                    </p>

                    <p>
                    <span class="label"><label for="Role">Role</label></span>
                        <select id="Role" name="Role">
                            <option value="admin">Administrateur</option>
                            <option value="FM">Flat Manager</option>
                            <option value="FU">Flat User</option>
                            <option value="BM">Gestionnaire Immeuble</option>
                        </select>
                    </p>
                    <button type="submit">S'enregistrer</button>              
                    <p>
                        <?php 
                            if(isset($_GET['error'])) {
                                if($_GET['error'] == 1) $error = "mots de passe différents";
                                if($_GET['error'] == 2) $error = "veuillez renseigner tous les champs";

                                echo $error;
                            }
                        ?>
                    </p>
                </fieldset>

                </div>
                <br/>
        </form>
            <div id="div3">
        <!--<form method="post" action="add_bulding.php">
 
            <div class="gauche"><fieldset>
                <p>
                    <span class="label"><label for="Name_bulding">Nom Immeuble:</label></span>
                    <span class="controle"><input type="text" class="text" id="Name_bulding" name ="Name_bulding" maxlength="80" /></span>
                </p>
                <p>
                    <span class="label"><label for="Numb_of_flat">Nombre d'appartement:</label></span>
                    <span class="controle"><input type="number" class="text" id="Number_flat" name="Number_flat" maxlength="4"/></span>
                </p>

                <p>
                    <span class="label"><label for="Adress">Adress:</label></span>
                    <span class="controle"><input type="text" class="text" id="Adress" name="Adress" maxlength="100"/></span>
                </p> 
            </fieldset></div> <br/>

            <div id="div3">
        <form method="post" action="add_flat.php">
 
            <div class="gauche"><fieldset>
                <p>
                    <span class="label"><label for="Num_flat">Numero Appartement:</label></span>
                    <span class="controle"><input type="number" class="text" id="Num_flat" name ="Num_flat" maxlength="4"/></span>
                </p>
                <p>
                    <span class="label"><label for="Numb_of_room">Nombre de pieces:</label></span>
                    <span class="controle"><input type="number" class="text" id="Numb_of_room" name="Numb_of_room" maxlength="4" /></span>
                </p>
               
            </fieldset></div>            

            <p class="submit">
                <input type="submit" value="Envoyer la demande" />
            </p>
        </form>-->
 
        
</div>
</html>