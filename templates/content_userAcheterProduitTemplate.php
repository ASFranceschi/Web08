<?php
	$idu=UserModel::get_Id();
	$ide=EventModel::get_Id();
	$idp=ProduitModel::get_Id();
	$tc=EventModel::getTC($ide);
	$lib=ProduitModel::getLibelle($idp);
	
	$qte= AcheterModel::getQuantiteAchetee($idu,$idp);
?>

<div class="container" id="">

	<h1>Produit <?php echo $lib;?> du cours <?php echo $tc;?> </h1>
	
	<p>Vous avez acheté  : <?php echo $qte." "; echo $lib;?>  
	
	<br>
	Merci de votre achat !
	</p>
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $ide;?>&action=userProduitListDiv">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-primary" value="Voir la liste des produits disponibles" /></div></a>
	<br>
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $ide;?>&action=userDeparticiper">
		<div id="evenementTd"><input type="submit" id="eventParticiper" name="participer" class="btn btn-danger" value="Annuler l'inscription" /></div></a>
	


</div>

