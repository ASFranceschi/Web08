<?php
	$id=EventModel::get_Id();
?>
<div class="container" id="evenement">

	<h1>Détails du cours <?php echo EventModel::getTC($id);?></div></h1>

	<div id="evenementBox">
	
		<div id="evenementTd"><strong>Titre long : </strong><?php echo EventModel::getTL($id);?></div>

		<div id="evenementTd"><strong>Description : </strong><?php echo EventModel::getDescription($id);?></div>
		
		<div id="evenementTd"><strong>Ouverture : </strong><?php echo EventModel::getOuverture($id);?></div>

		<div id="evenementTd"><strong>Fermeture : </strong><?php echo EventModel::getFermeture($id);?></div>

		<div id="evenementTd"><strong>Catégorie : </strong><?php echo EventModel::getCategorie($id);?></div>

		<div id="evenementTd"><strong>Créateur : </strong><?php echo GererModel::getMailCreateur($id);?></div>		
		
		<a href="index.php?controller=Anonymous&idEvent=<?php echo $id;?>&action=anonymousParticiper">
			<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-info" value="Participer" /></div>
		</a>
		
	</div>
	<br><br>
</div>