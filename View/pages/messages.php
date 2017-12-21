<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 18:55
 */
?>


<div id="messages">

</div>

<form method="post" action="index.php?controller=messages&action=send" enctype="multipart/form-data">
    <label for="Message">Message :</label>
    <textarea id="Message" name="Message"></textarea>
    <br>
    <input id="btn_send_message" value="Envoyer" type="submit">
</form>