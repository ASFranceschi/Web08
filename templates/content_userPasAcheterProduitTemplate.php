<?php
	$idu=UserModel::get_Id();
?>

<div class="container" id="evenement">
	<h2>Vous n'avez acheté aucun produit.</h2>
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="accueil" class="btn btn-primary" value="Retour à l'accueil" /></div></a>
	

</div>