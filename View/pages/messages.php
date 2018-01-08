<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 18:55
 */
?>

<div id="panel-left" class="left">

</div>

<div id="main">

    <div id="messages">

    </div>
    <form method="post">
        <textarea  class="message input" id="Message" name="Message" placeholder="Votre message..."></textarea>
        <input class="buttonsend" id="btn_send_message" value="Envoyer" type="submit">
    </form>
</div>

<div id="hiddenfield">
    <input type="hidden" id="IDuserConv" value="">
</div>

<script src="View/Content/js/messages.js"></script>
<link rel="stylesheet" href="View/Content/style/message.css">