<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 23/01/2018
 * Time: 20:04
 */

?>

<form method="post" action="index.php?controller=user&action=update" id="updateuser" class="form-style-6">
    <fieldset>
        <p>
            <span class="label"><label for="Name">Nom:</label></span>
            <span class="controle"><input type="text" class="text" id="LastName" name ="LastName" maxlength="20" /></span>
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
            <span class="label"><label for="Role">Role</label></span>
            <select id="Role" name="Role">
                <option value="admin">Administrateur</option>
                <option value="FM">Flat Manager</option>
                <option value="FU">Flat User</option>
                <option value="BM">Gestionnaire Immeuble</option>
            </select>
        </p>
        <input type="hidden" id="ID" name="ID">
        <button type="submit">Modifier</button>
    </fieldset>
    <br/>
</form>
