<form method="post" action="index.php?controller=building&action=createBuilding" class="form-style-6">

        <div class="gauche"><fieldset>
            <p>
                <span class="label"><label for="Name_bulding">Nom Immeuble:</label></span>
                <span class="controle"><input type="text" class="text" id="Name_bulding" name ="Name" maxlength="80" /></span>
            </p>
            <p>
                <span class="label"><label for="Numb_of_flat">Nombre d'appartement:</label></span>
                <span class="controle"><input type="number" id="Number_flat" name="Number_flat" maxlength="4"/></span>
            </p>

            <p>
                <span class="label"><label for="Address">Adresse:</label></span>
                <span class="controle"><input type="text" class="text" id="Adresse" name="Adresse" maxlength="100"/></span>
            </p>

            <p>
                <span class="label"><label for="BM_name">Gestionnaire d'immeuble:</label></span>
                <span class="controle"><input type="text" class="text" id="BM_name" name="BM_name" /></span>
            </p>
                <input type="hidden" name="BM" id="id_BM">
                <input type="hidden" name="ID" id="ID">
        <p class="submit">
            <input type="submit" value="Envoyer la demande" />
        </p></form>