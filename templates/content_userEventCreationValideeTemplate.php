<?php 
	$idu = UserModel::get_Id();
	$idu = UserModel::get_Id();
?>


<div class="container">
	<h1>Création réussie!</h1>
	
	<p> Vous pouvez consulter la liste des cours que vous gérez</p>

	
	<br>
	
	<a href="index.php?controller=User&action=gererListEvent&idUser=<?php echo $idu;?>">
		<div id="evenementTd"><input type="submit" id="connexionTd" name="profil" class="btn btn-info" value="Voir la liste" /></div>
	</a>

</div>

