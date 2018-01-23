<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 22/01/2018
 * Time: 08:25
 */

?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
<script src="View/Content/js/statistiques.js"></script>


<?php
if(helper::checkSession(array("Role"))){
    switch ($_SESSION["Role"]){
        case "admin":
            echo '<div id="dialog" title="Nouveau Message">

                <div id="searchfielddiv" class="ui-widget">
                    <label for="search-box"></label>
                    <input type="text" name="search-box" id="search-box" placeholder="Adresse">
                </div>
            </div>';
            break;
        case "BM":
            echo '<center><select id="selectBuilding"></select></center>';
            break;
        case "FM":
            echo '<center><select id="selectBuilding"></select></center>';
            break;
    }
}

?>

<canvas id="chartTempDay"></canvas>
<canvas id="chartTempWeek"></canvas>
<canvas id="chartConsoDay"></canvas>
<canvas id="chartConsoWeek"></canvas>



<div id="hiddenfield">
    <input type="hidden" id="IDBuilding" value="">
</div>


