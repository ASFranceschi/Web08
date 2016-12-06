<?php
	$id=EventModel::get_Id();
	$idu=UserModel::get_Id();
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
		
		<div id="evenementTd"><strong>Tarif : </strong><?php echo PossederModel::getTarif($id);?></div>
				
	<form id="evenementTd" action="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $id;?>&action=userParticiper" method="post">
		<table>
			<tr>
				<div id="evenementTd"><strong>Mode de Paiement : </strong>
					<SELECT NAME="mode">
						<OPTION value='CB'>CB</OPTION>
						<OPTION value="Paypal">Paypal</OPTION>
					</select>
				</div>
			</tr>
			
			<tr>
				<th></th>
				<td><input type="submit" value="Participer" class="btn btn-primary" id="evenementTd"/></td>
			</tr>
		</table>
	</form>
	
	</div>
	
	<br>
	<br>
		
</div>