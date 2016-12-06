<?php
	$idu=UserModel::get_Id();
	$id=EventModel::get_Id();
	$tc=EventModel::getTC($id);
?>

<div class="container" id="">

	<h1>Annulation de votre inscription <?php echo $tc;?> </h1>
	
	<p>Votre demande d'annulation a bien été prise en compte pour l'événement : <?php echo $tc;?>
	
	<br>Cependant, nous ne remboursons pas les frais déjà payés.
	
	<br>Passez une bonne journée.
	
	</p>



</div>

