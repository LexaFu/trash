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
			<button type="submit">Valider</button>
		</form>
	</div>

<?php

	}else{
    
	}
}
?>

	<div class="map" id="map">
  </div>


<script type="text/javascript">


</script>

<?php include "footer.php"; ?>

