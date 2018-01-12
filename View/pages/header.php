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

        <div class="MonEspace" >

            <?php
            if(isset($_SESSION['Role']) && !empty($_SESSION['Role']) && $_SESSION['Role']!= "FU"){
                echo '<a href="index.php?controller=pages&action=messages">';
            ?>
             <img class="messages" src="View/Content/images/messages.png" alt="messages" /></a>
            <?php
            }

            if(isset($_SESSION['Role']) && !empty($_SESSION['Role'])){
                echo '<a href="index.php?controller=user&action=disconnect">';
            }
            else{
                echo '<a href="index.php?controller=pages&action=login">';
            }

            ?>
                <img class="espace" src="View/Content/images/connex.png" alt="espace" /></a>
            
         </div>
</div>
