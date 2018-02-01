<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 27/01/2018
 * Time: 23:43
 */
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

<script src="View/Content/js/building.js"></script>


<center>
    <?php
    if ($_SESSION['Role'] == "admin"){
        echo '
    <button type="button" id="btn_ajouter">Ajouter</button>
    <button type="button" id="btn_supprimer">Supprimer</button>
    ';
    }
    ?>
    <button type="button" id="btn_modifier">Modifier</button>
</center>
<br/>
<div class="gauche" id="content"></div>
<input type=hidden id="buildingselected" value="">
