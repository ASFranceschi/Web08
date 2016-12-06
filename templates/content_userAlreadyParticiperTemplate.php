<?php
	$idu=UserModel::get_Id();
	$id=EventModel::get_Id();
	$tc=EventModel::getTC($id);
?>

<div class="container" id="">

	<h1>Participer à l'événement <?php echo $tc;?> </h1>
	
	<p>Vous êtes déjà inscrit à l'événement  : <?php echo $tc;?>
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $id;?>&action=userProduitListDiv">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-primary" value="Voir la liste des produits disponibles" /></div></a>
	<br>
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $id;?>&action=userDeparticiper">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-danger" value="Annuler l'inscription" /></div></a>
	
	<br>
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>&action=userProfil">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-info" value="Consulter le profil" /></div></a>
	

</div>

