<h1>Bienvenue <?php if(isset($_SESSION['FirstName'])) echo $_SESSION['FirstName']; ?></h1>
<h2>Gérer mes appartements </h2>

<div id="bienvenue">

    <div class="appartements" >
        <h4>Immeubles</h4>
        <a href="index.php?controller=pages&action=building_list"> <img src="View/Content/images/appartements.png" alt="building" /></a></center>
    </div>
    <div class="statistique" >
        <h4>Statistiques Globales</h4>
        <a href="index.php?controller=pages&action=stats"> <img src="View/Content/images/statistiqueGlobal.png" alt="statistique global" /></a></center>
    </div>
</div>