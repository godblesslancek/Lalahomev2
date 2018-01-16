<h1>Bienvenue <?php if(isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']; ?></h1>
<h2>Administrateur</h2>

<div id="bienvenue">

    <div class="utilisateurs" >
        <h4>Utilisateurs</h4>
        <center><a href="index.php?controller=pages&action=userList"><img src="View/Content/images/utilisateurs.png" alt="utilisateurs" /></a></center>
         
    </div>
    <div class="capteur" >
        <h4>Capteurs</h4>
        <center><img src="View/Content/images/capteur.png" alt="offre" /></center>
       
    </div>
    <div class="appartements" >
        <h4>Appartements</h4>
        <center><img src="View/Content/images/appartements.png" alt="piece" /></center>
        
    </div>
    <div class="statistique" >
        <h4>Statistiques Globales</h4>
        <a href="index.php?controller=pages&action=stats"> <img src="View/Content/images/statistiqueGlobal.png" alt="statistique global" /></a></center>
    </div>
</div>
