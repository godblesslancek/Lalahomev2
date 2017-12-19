
<h1>Bienvenue <?php if(isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']; ?></h1>
<h2>Gérer ma maison</h2>

<div id="bienvenue">
    <div class="capteur" >
        <center><img src="View/Content/images/capteur.png" alt="offre" /></center>
        <h4>Capteurs</h4>
    </div>
    <div class="piece" >
        <center><img src="View/Content/images/piece.png" alt="piece" /></center>
        <h4>Pièces</h4>
    </div>
    <div class="statistique" >
        <a href="index.php?controller=pages&action=stats"> <img src="View/Content/images/statistiqueGlobal.png" alt="statistique global" /></a></center>
        <h4>Statistiques Globales</h4>
    </div>
</div>
