<?php 
include "header.php"; 
ob_start();

// REQUETE SQL
$req = $bdd->query('SELECT * FROM reporting ORDER BY id_reporting');
$req->execute(array(
));

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

		<form action="team_page_post.php?id_url=<?php echo $donnees['id_reporting']; ?> " method="post">
			<input name="status" type="number" value="<?php echo $donnees['status']; ?>">
			<button type="submit" >Valider</button>
		</form>
	</div>

<?php

	}else{
	
	}
}
?>
	<div class="map" id="map">
    </div>

<?php 
	$requete = $bdd->query("SELECT * FROM reporting");
	$check = $requete->fetchAll(PDO::FETCH_UNIQUE|PDO::FETCH_ASSOC);
?>
	
<script>   
var geocoder = new google.maps.Geocoder();
var map;
var marker;

  // Lors de l'évènement au click de la souris on fait appel à la fonction placerMarker(avec les coordonnées)
  google.maps.event.addListener(map, 'click', function(event) {
    placerMarker(event.latLng);
  });

   // Affiche les marqueurs disponible dans la BDD
  <?php foreach ($check as $tab){ ?>
    new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $tab["latitude"] ?>, <?php echo $tab["longitude"] ?>),
        map: map,
        title: "<?php echo $tab["address"]; ?>"
    });

<?php } ?>
}
 
// Fonction qui est appeller lors du click pour placer un marqueur
function placerMarker(location) {

    if(marker){ // Si le marqueur existe
        marker.setPosition(location); // Change de position
        map.setCenter(location); // Puis on centre la map par rapport à la nouvelle position
    } else {
        marker = new google.maps.Marker({ // Création du marqueur
            position : location, // Ajout de sa nouvelle position
            map : map // Dans la map
        });
    }
    document.getElementById("latitude").value = location.lat(); // Enregistrement latitude dans l'input
    document.getElementById("longitude").value = location.lng(); // Enregistrement longitude dans l'input
 
    var coogps = new google.maps.LatLng(document.getElementById("latitude").value, document.getElementById("longitude").value); // Par rapport aux input de la latitude et longitude
    geocoder.geocode({"latLng": coogps}, function(data, status) { // Geocode les données GPS en Adresse Postale
            if (status == google.maps.GeocoderStatus.OK && data[0]) {
                  document.getElementById("adresse").value = data[0].formatted_address;
            } else {
                alert("Erreur: " + status);
            }
      });
}
// Lancement de la construction de la carte google map
google.maps.event.addDomListener(window, 'load', initial);
</script>
	
	

<?php include "footer.php"; ?>

