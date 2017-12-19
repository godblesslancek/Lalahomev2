<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 09:47
 */


$data = array(
    array(28, 48, 40, 19, 86, 27, 90),
    array(65, 59, 80, 81, 56, 55, 40)
);
$labels = array("January", "February", "March", "April", "May", "June", "July");
$colors = array(
    array('backgroundColor' => 'rgba(28,116,190,.8)', 'borderColor' => 'blue'),
    array('backgroundColor' => '#f2b21a', 'borderColor' => '#e5801d'),
    array('backgroundColor' => array('blue', 'purple', 'red', 'black', 'brown', 'pink', 'green'))
);

//There is a bug in Chart.js that ignores canvas width/height if responsive is not set to false
$options = array('responsive' => true);

//html attributes fot the canvas element
$attributes = array('id' => 'example', 'width' => 1000, 'height' => 500, 'style' => 'display:inline;');

$datasets = array(
    array('data' => $data[0], 'label' => "Legend1") + $colors[0],
    array('data' => $data[1], 'label' => "Legend2") + $colors[1],
    array('data' => $data[0], 'label' => "Legend1") + $colors[1],
    array('data' => $data[1], 'label' => "Legend2") + $colors[2],
    array('data' => $data[0]) + $colors[2],
);

/*
 * Temp example
 */

$temp_data = array(18,19,20,22,22,21,20);
$temp_dataset = array('data' => $temp_data, 'label' => "Température en degré") + $colors[0];
$temp_labels = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
$temp_attributes = $attributes['id'] = 'temp_line';
$temp_line = new ChartJS('line', $temp_labels, $options, $temp_attributes);

$temp_line->addDataset($temp_dataset);


/*
 * Temp au format bar
 */
$temp_attributesbar = $attributes['id'] = 'temp_bar';
$temp_bar = new ChartJS('bar', $temp_labels, $options, $temp_attributesbar);

$temp_bar->addDataset($temp_dataset);


/*
 * Temp au format cammembert
 */
$temp_attributespie = $attributes['id'] = 'temp_pie';
$temp_pie = new ChartJS('pie', $temp_labels, $options, $temp_attributesbar);
$temp_pie_dataset =  array('data' => $temp_data) + $colors[2];
$temp_pie->addDataset($temp_pie_dataset);

/*
 * Create charts
 *
 */

$attributes['id'] = 'example_line';
$Line = new ChartJS('line', $labels, $options, $attributes);
$Line->addDataset($datasets[0]);
$Line->addDataset($datasets[1]);

$attributes['id'] = 'example_bar';
$Bar = new ChartJS('bar', $labels, $options, $attributes);
$Bar->addDataset($datasets[2]);
$Bar->addDataset($datasets[3]);

$attributes['id'] = 'example_radar';
$Radar = new ChartJS('radar', $labels, $options, $attributes);
$Radar->addDataset($datasets[0]);
$Radar->addDataset($datasets[1]);

$attributes['id'] = 'example_polarArea';
$PolarArea = new ChartJS('polarArea', $labels, $options, $attributes);
$PolarArea->addDataset($datasets[4]);

$attributes['id'] = 'example_pie';
$Pie = new ChartJS('pie', $labels, $options, $attributes);
$Pie->addDataset($datasets[4]);

$attributes['id'] = 'example_doughnut';
$Doughnut = new ChartJS('doughnut', $labels, $options, $attributes);
$Doughnut->addDataset($datasets[4]);

/*
 * <h1>Ligne</h1>
<?php
echo $Line;
?>
<h1>Bar</h1>
<?php
echo $Bar;
?>
<h1>Radar</h1>
<?php
echo $Radar;
?>
<h1>Polar Area</h1>
<?php
echo $PolarArea;
?>
<h1>Pie & Doughnut</h1>
<?php
echo $Pie. $Doughnut;
?>
 */
?>

<h1> Temperature de la semaine au format line</h1>
<?php echo $temp_line;?>

<h1> Temperature de la semaine au format bar</h1>
<?php echo $temp_bar;?>

<h1> Temperature de la semaine au format bar</h1>
<?php echo $temp_pie;?>

<script src="View/Content/js/Chart.js"></script>
<script src="View/Content/js/driver.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script>