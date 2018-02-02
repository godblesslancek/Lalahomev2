<h1>Bienvenue <?php if(isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']; ?></h1>
<h2>Gérer ma maison</h2>

<div id="bienvenue">
    <div class="piece" >
        <h4>Pièces</h4>
        <center><a href="index.php?controller=pages&action=piece"><img src="View/Content/images/piece.png" alt="piece" /></a></center>
        
    </div>

</div>
