<?php  

$year = date('Y');
$date = new Date();
$dates = $date->getAll($year);

	class Date {

		var $days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi');
		var $months = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');

		function getAll() {
			$dateReturn = array();
			// $date = strtotime('2017/04/01');
			// Ce que je veux $dateReturn[Année] [Mois] [Jour] = Jour de la semaine
			// 
			$date = new DateTime('2017-01-01');
			while($date->format('Y') <= $year){
			$y = $date->format('Y');
			$m = $date->format('n');
			$d = $date->format('J');
			// jour de la semaine 
			$w = str_replace('0', '7', $date->format('w'));
			$dateReturn[$y] [$m] [$d] = $w;
			$date->add(new DateInterval('P1D'));

			}
		return $dateReturn;

	}
}

?>
<div class="periods">
	<div class="year"><?php echo $year; ?></div>
	<div class="months">
		<ul>
			<?php foreach ($date->months as $id=>$m);?>
			<li><a href="#" id="linkMonth"><?php echo $id+1; utf8_encode(substr(utf8_decode($m),0,3)); ?></a></li>
		</ul>
	</div>
	<?php $dates = current($dates); ?>
	<?php foreach ($dates as $m=>$days) ?>
	<div class="month" id="month<?php echo $m; ?>">
		<table>
			<thead>
				<tr>
				<!-- 23.46 -->
					<?php foreach ($date->$days as $d) ?>
				</tr>
			</thead>
		</table>
	</div>
</div>
<pre><?php print_r($dates); ?></pre>
