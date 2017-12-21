<h1>Bienvenue <?php if(isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']; ?></h1>
<h2>Gérer ma maison et ma famille </h2>

<div id="bienvenue">

    <div class="utilisateurs" >
        <h4>Ma famille</h4>
        <center><img src="View/Content/images/utilisateurs.png" alt="utilisateurs" /></center>
    </div>>
    <div class="capteur" >
        <h4>Capteurs</h4>
        <center><img src="View/Content/images/capteur.png" alt="offre" /></center>
    </div>
    <div class="piece" >
        <h4>Pièces</h4>
        <center><img src="View/Content/images/piece.png" alt="piece" /></center>
    </div>
    <div class="statistique" >
        <h4>Statistiques Globales</h4>
        <a href="index.php?controller=pages&action=stats"> <img src="View/Content/images/statistiqueGlobal.png" alt="statistique global" /></a></center>
    </div>
</div>
