<?php

$weight = $_GET['weight'];
$runningDuration = $_GET['runningDuration'];
$basketballDuration = $_GET['basketballDuration'];
$sleepDuration = $_GET['sleepDuration'];
$totalCal = 0;

Function hoursToMin($hours){
	$result = $hours * 60;
	return $result;
}

Function calculateMET($weight, $duration, $met){
	$kg = $weight * 0.454;
	$result1 = 0.0175 * $met * $kg;
	$result2 = $result1 * $duration;
	return $result2;
}

$sleepDurationConvert = hoursToMin($sleepDuration);

?>
<form>
<div class="form-header">
	<b>Metabolic Equivalents Energy Expender</b>
</div>
<div class="form-body">
	<p>For a <?php echo $weight ?> pound person, it is estimated that:</p>
	<p><?php $runCal = ceil(calculateMET($weight, $runningDuration, 10)); $totalCal += $runCal; echo $runCal;?> calories were burned running</p>
	<p><?php $basketCal = ceil(calculateMET($weight, $basketballDuration, 8)); $totalCal += $basketCal; echo $basketCal; ?> calories were burned playing basketball</p>
	<p><?php $sleepCal = ceil(calculateMET($weight, $sleepDurationConvert, 1)); $totalCal += $sleepCal; echo $sleepCal;?> calories were burned sleeping</p>
</div>
<div class="form-footer">
	Total calories burned: <?php echo $totalCal ?>
</div>
<div class="back-button">
	<input type="button" value="Back" onclick="history.back()">
</div>
</form>