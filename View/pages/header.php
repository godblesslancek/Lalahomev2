<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 11/12/2017
 * Time: 14:40
 */
?>
<div id="header">

        <div class="logo" >
            <?php
                if(isset($_SESSION['Role']) && !empty($_SESSION['Role'])){
                    echo '<a href="index.php?controller=pages&action=home_user">';
                }
                else{
                    echo '<a href="index.php?controller=pages&action=home">';
                }

            ?>
            <img src="View/Content/images/logoTech.png" alt="Logo" />
        </div>



        <div class="Connexion" >
            <?php
            if(isset($_SESSION['Role']) && !empty($_SESSION['Role']) && $_SESSION['Role']!= "FU"){
                echo '<a href="index.php?controller=pages&action=messages">';
                echo '<img class="messages" src="View/Content/images/messages.png" alt="messages" /></a>';
            }

            if(isset($_SESSION['Role']) && !empty($_SESSION['Role'])){
                echo '<a href="index.php?controller=user&action=disconnect">';
                echo ' <img class="deconnexion" src="View/Content/images/deconnexion.png" alt="espace" /></a>';
            }
            else{
                echo '<a href="index.php?controller=pages&action=login">';
                echo '<img class="connexion" src="View/Content/images/connexion.png" alt="espace" /></a>';
            }

            ?>
            

        </div>

</div>