<?php
	$ide=EventModel::get_Id();
	$tc=EventModel::getTC($ide);
	date_default_timezone_set("Europe/Madrid");
	$date= date("Y-m-d");
?>

<div class="container" id="evenementTd">

	<h1>Intéressé par le cours <?php echo $tc;?> </h1>
	
	<p>Votre intérêt pour le cours <?php echo $tc;?> a bien été enregistré.
	<br> Si vous souhaitez acheter des produits relatif à ce cours, merci de vous connecter</p>
	<a href="index.php?controller=Anonymous&action=connexion">
		<div id="evenementTd"><input type="submit" id="connexionTd" name="connexion" class="btn btn-info" value="Connexion" /></div>
	</a>
	
	<br>
	<a href="index.php?controller=Anonymous&action=inscription">
		<div id="evenementTd"><input type="submit" id="connexionTd" name="creationCompte" class="btn btn-primary" value="Créer un compte" /></div>
	</a>

</div>

