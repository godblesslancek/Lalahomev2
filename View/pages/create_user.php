<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<div id="div2">
<script src="View/Content/js/form-validation.js"></script>
    <form method="post" action="index.php?controller=user&action=register" id="registration">
        <center>
        <a href="index.php?controller=user&action=register">
        <button type="button" OnClick="alert('Redirection en cours!')">Ajouter</button>
        </a>
        <button type="button" OnClick="alert('Touche')">Modifier</button>
        <button type="button" OnClick="alert('Touche')">Supprimer</button>
        </center>
    <br/>

        <div class="gauche">
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

</div>