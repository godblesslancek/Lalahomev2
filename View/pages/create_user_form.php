<?php

?>


<form  method="post" >
    <p>
        <label for="FirstName">Prénom :</label>
        <input type="text" id="firstname" name="FirstName">
        <br>
        <label for="LastName">Nom :</label>
        <input type="text" id="LastName" name="LastName">
        <br>
        <label for="phonenumber">Numéro de téléphone :</label>
        <input type="tel" name="Phone"  id="phonenumber">
        <br>
        <label for="email">Adresse e-mail :</label>
        <input id="email" name="Email" type="Email">
        <br>

        <label for="role">Role de l'utilisateur :</label>
        <select name="Role" id="role" onchange="onChangeRole()">
            <option value="Admin">Administrateur</option>
            <option value="BM">Building Mananger</option>
            <option value="FM">Flat Manager</option>
            <option value="FU">Flat User</option>
        </select>
        <div id="perm" style="display: none">
    <p>Quelles permissions accodées à l'utilisateur ? </p>
    <p>
        <label for="Perm_type_Volet">Volets:</label>
        <input type="checkbox" id="Perm_type_Volet" name="Perm_type_Volet" value="1"  checked="yes" /><br />
        <label for="Perm_type_Lumiere">Lumières :</label>
        <input type="checkbox" id="Perm_type_Lumiere" name="Perm_type_Lumiere" value="1" checked="yes" /><br />
        <label for="Perm_type_Temp">Température :</label>
        <input type="checkbox" id="Perm_type_Temp" name="Perm_type_Temp" value="1" checked="yes" /><br />
        <label for="Perm_type_Alarm">Alarme :</label>
        <input type="checkbox" id="Perm_type_Alarm" name="Perm_type_Alarm" value="1" checked="yes" />
    </p>
    </div>
    <label for="password">Mot de passe:</label>
    <input id="password" type="Password" name="Password">
    <br>
    <label for="password_verif">Vérification du mot de passe:</label>
    <input id="password_verif" type="Password" name="Password_Verif">
    <br>
    <input id="btn_validate" type="submit" name="creation_user" value="Valider">
    </p>
</form>