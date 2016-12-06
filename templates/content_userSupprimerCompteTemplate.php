<?php
	$id=UserModel::get_Id();
?>

<div class="container" id="compteSupprime">
	<form id="suppressionCompteFormulaire" action="index.php?controller=User&idUser=<?php echo $id;?>&action=validateSuppressionCompte" method="post">
		<table>
			<tr>
				<th>Ceci est votre dernière chance avant la destruction de vos données. Vous êtes vraiment certain de vouloir supprimer votre compte ?  </th>
				<div>vazy steu plait le fait pas, sinon on pourra plus hacker ton compte et ta CB</div>
				<td><input type="submit" value="Oui" name= "validateSuppressionCompte" class="btn btn-success" id="inscriptionTd"/></td>
				<td><a class="btn btn-danger" id="inscriptionTd" href="index.php?controller=User&idUser=<?php echo $id;?>" role="button">Non</a></td>
			</tr>
		</table>
	</form>
</div>

		       

	
