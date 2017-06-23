<?php 
include "header.php"; 

$req = $bdd->query('SELECT * FROM appointment WHERE DATE (date_appointment) = CURDATE() ORDER BY hour_appointment');
?>
<div class="apt">
	<table>
		<tr>
			<th>heure rendez vous</th>
	 		<th>nom de famille</th>
	 		<th>téléphone</th>
	 	</tr>
<?php
while ($donnees = $req->fetch()) {
?>
	 	<tr>
	 		<td><?php echo $donnees['hour_appointment']; ?></td>
	 		<td><?php echo $donnees['last_name']; ?></td>
	 		<td><?php echo $donnees['phone']; ?></td>
	 	</tr>
<?php
}
?>
	</table>
</div>
<?php
// REQUETE SQL qui sélectionne toutes les données de reporting rangées par id
$req = $bdd->query('SELECT * FROM reporting ORDER BY id_reporting');
$req->execute(array(
));
?>

<script>
// pour mettre les marqueurs sur la carte de couleurs, suivant status
var mapStatusIcone = {
'':'http://maps.google.com/mapfiles/marker_red.png',
'reserved':'http://maps.google.com/mapfiles/marker_yellow.png',
'collected':'http://maps.google.com/mapfiles/marker_green.png'	
};
var markerList = {};
function bookIt(id_reporting){
	console.log(markerList);
		markerList[id_reporting].setOptions({'icon' : mapStatusIcone['reserved']});
		$.get("update_status.php?reserve="+id_reporting, function(data, status) {
			console.log(data);
	});
};
function done(id_reporting){
		markerList[id_reporting].setOptions({'icon' : mapStatusIcone['collected']});
		$.get("update_status.php?done="+id_reporting, function(data, status) {
			console.log(data);
		});
};
</script>

<?php
while ($donnees = $req->fetch()){
	if ($donnees['status'] == 0) {
?>

	<div class="client-ticket">
		
		<p>Il y a un signalement avec le numéro <?php echo $donnees['id_reporting']; ?>.
		L'emcombrant a été signalé à l'adresse<?php echo $donnees['address']; ?>, <?php echo $donnees['cp']; ?>. Il est de type <?php echo $donnees['type']; ?> et de taille <?php echo $donnees['size']; ?>. Sa description est la suivante : <?php echo $donnees['description']; ?>. Le statut est <?php echo $donnees['status']; ?></p>
		
	
		<script>
			setTimeout(function(){
				var id_reporting = "<?php echo $donnees['id_reporting']; ?>";
				var coord = <?php echo '{lat:'.$donnees['latitude'].',lng:'.$donnees['longitude'].'}'; ?>;
				var status = '<?php echo $donnees['status']; ?>';
				markerList[id_reporting] = addMarker(coord,currentMap,' ');
				markerList[id_reporting].setOptions({'icon' : mapStatusIcone[status]});

		},1000);
		</script>
			<!-- changement de status au click -->
			<button onclick="bookIt(<?php echo $donnees['id_reporting']; ?>)">Je m'en occupe</button>
			<button onclick="done(<?php echo $donnees['id_reporting']; ?>)">C'est fait</button>
		
	</div>

<?php

	}else{
    
	}
}
?>

	<div class="map-container">
	    <div class="map" id="map">
	    </div>
    </div>


<script type="text/javascript">


</script>

<?php include "footer.php"; ?>

