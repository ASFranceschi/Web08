<?php
	$id=EventModel::get_Id();
?>
<div class="container" id="evenement">

	<div id="evenementBox">
	
		<div id="evenementTd"><strong>Titre long : </strong><?php echo EventModel::getTL($id);?></div>

		<div id="evenementTd"><strong>Titre court: </strong><?php echo EventModel::getTC($id);?></div>

		<div id="evenementTd"><strong>Description : </strong><?php echo EventModel::getDescription($id);?></div>

		<div id="evenementTd"><strong>Adresse : </strong><?php echo EventModel::getAdresse($id);?></div>

		<div id="evenementTd"><strong>Ouverture : </strong><?php echo EventModel::getOuverture($id);?></div>

		<div id="evenementTd"><strong>Fermeture : </strong><?php echo EventModel::getFermeture($id);?></div>

		<div id="evenementTd"><strong>Catégorie : </strong><?php echo EventModel::getCategorie($id);?></div>

		<!--<div id="evenementTd"><strong>Créateur : </strong><?php echo EventModel::getNomCreateur($id);?></div>-->		<!-- Ne fonctionne pas encore-->
		
		<a href="index.php?controller=Anonymous&idEvent=<?php echo $id;?>&action=anonymousParticiper">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-warning" value="Participer" /></div>
	
	</div>
	
</div>