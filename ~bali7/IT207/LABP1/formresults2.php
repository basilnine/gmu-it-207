<?php

$coupons = $_GET['coupons'];

Function calculateCandyBars($coupons){
	$result = floor($coupons / 10);
	return $result;
}

Function modCoupons1($coupons){
	$result = $coupons % 10;
	return $result;
}

Function calculateGumBalls($modCoupons){
	$result = floor($modCoupons / 3);
	return $result;
}

Function leftoverCoupons1($modCoupons){
	$result = $modCoupons % 3;
	return $result;
}

Function displayCoupons($number){
	$count = 1;
	while ($count <= $number){
		echo "o ";
		++$count;
	}
}

?>
<form>
<div class="form-header">
	<b>Coupon Distribution Results</b>
</div>
<div class="form-body">
	<p>For <?php echo $coupons ?> you can get:</p>
	<p><?php $candybars = calculateCandyBars($coupons); $modCoupons = modCoupons1($coupons); echo $candybars; ?> candy bars</p>
	<p><?php displayCoupons($candybars); ?></p>
	<p><?php $gumballs = calculateGumBalls($modCoupons); echo $gumballs; ?> gumballs</p>
	<p style="count"><?php displayCoupons($gumballs); ?></p>
	<p><?php $leftover = leftoverCoupons1($modCoupons); echo $leftover; ?> coupons leftover</p>
	<p style="count"><?php displayCoupons($leftover); ?></p>
</div>
<div class="form-footer">
	Legend: Candy Bar = 10 | Gumball = 3
</div>
<div class="back-button">
	<input type="button" value="Back" onclick="history.back()">
</div>
</form>