<?php 
include "header.php"; 

// $req = $bdd->query('SELECT * FROM appointment WHERE DATE (date_appointment) = CURDATE()');
// while ($donnes = $req->fetch()) { ?>
	<!-- <p><?php echo $donnees['last_name']; ?></p> -->
<?php 

// REQUETE SQL
$req = $bdd->query('SELECT * FROM reporting ORDER BY id_reporting');
$req->execute(array(
));
?>

<script>
var markerList = {};
function bookIt(id_reporting){
	console.log(markerList);
		markerList[id_reporting].setOptions({'icon' : 'http://maps.google.com/mapfiles/marker_yellow.png'});
		//markerList[id_reporting] = addMarker(,currentMap,'E')
		/*
		var bMarker = new google.maps.Marker({
    		'position' : new google.maps.LatLng( latitude, longitude),// position d'ancrage du marker sur la carte
    		'map' : aMap                                              // l'objet carte sur lequel est affiché le marker
  });*/
};
function done(id_reporting){
		markerList[id_reporting].setOptions({'icon' : 'http://maps.google.com/mapfiles/marker_green.png'});
	
};
</script>

<?php
while ($donnees = $req->fetch()){
	if ($donnees['status'] == 0) {
?>

	<div class="client-ticket">
		
		<p><?php echo $donnees['id_reporting']; ?></p>
		<p><?php echo $donnees['address']; ?></p>
		<p><?php echo $donnees['cp']; ?></p>
		<p><?php echo $donnees['type']; ?></p>
		<p><?php echo $donnees['size']; ?></p>
		<p><?php echo $donnees['description']; ?></p>
		<script>
			setTimeout(function(){
				markerList["<?php echo $donnees['id_reporting']; ?>"] = addMarker(<?php echo '{lat:'.$donnees['latitude'].',lng:'.$donnees['longitude'].'}'; ?>,currentMap,' ')
		},1000);
		</script>

		<!--<form action="team_page_post.php?id_url=<?php echo $donnees['id_reporting']; ?> " method="post">-->
			<button onclick="bookIt(<?php echo $donnees['id_reporting']; ?>)">Je m'en occupe</button>
			<button onclick="done(<?php echo $donnees['id_reporting']; ?>)">C'est fait</button>
		<!--</form>-->
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

