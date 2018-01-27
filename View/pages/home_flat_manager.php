<h1>Bienvenue <?php if(isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']; ?></h1>
<h2>Gérer ma maison et ma famille </h2>

<div id="bienvenue">

    <div class="utilisateurs" >
        <h4>Ma famille</h4>
        <center><a href="index.php?controller=pages&action=userList"><img src="View/Content/images/utilisateurs.png" alt="utilisateurs" /></a></center>
    </div>
    <div class="capteur" >
        <h4>Capteurs</h4>
        <center><a href="index.php?controller=pages&action=capteurs"><img src="View/Content/images/capteur.png" alt="offre" /></a></center>
    </div>
    <div class="piece" >
        <h4>Pièces</h4>
        <center><a href="index.php?controller=pages&action=piece"><img src="View/Content/images/piece.png" alt="piece" /></a></center>
    </div>
    <div class="statistique" >
        <h4>Statistiques de ma maison</h4>
        <a href="index.php?controller=pages&action=stats"> <img src="View/Content/images/statistiqueGlobal.png" alt="statistique global" /></a></center>
    </div>
</div>
