<?php
	$idu=UserModel::get_Id();
	$ide=EventModel::get_Id();
	$idp=ProduitModel::get_Id();;
	$stock=ProposerModel::getQuantite($idp,$ide);
	
	function qteT($stocke){
		if($stocke<=0)
			echo'<OPTION value=none'.'>Aucun Produit disponible</OPTION>';
		else{
			for($i=1;$i<=$stocke;$i++){
				echo '<OPTION value='.$i.'>'.$i.'</OPTION>';
			}
		}
	}
?>
<div class="container" id="evenement">

	<div id="evenementBox">
	
		<h2> Informations relatives avant l'achat</h2>	
		<div id="evenementTd"><strong>Libelle : </strong><?php echo ProduitModel::getLibelle($idp);?></div>

		<div id="evenementTd"><strong>Description </strong><?php echo ProduitModel::getDescription($idp);?></div>

		<div id="evenementTd"><strong>Quantité disponible : </strong><?php echo $stock;?></div>

		<div id="evenementTd"><strong>Prix Unitaire : </strong><?php echo ProposerModel::getPrix($idp,$ide);?></div>
				
	<form id="evenementTd" action="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $ide;?>&idProduit=<?php echo $idp;?>&action=userAcheterProduit" method="post">
		<table>
			<tr>
				<div id="evenementTd"><strong>Quantité souhaitée </strong>
					<SELECT NAME="qteProduit">
						<OPTION value=0>--</OPTION>
						<?php qteT($stock);?>
					</select>
				</div>
			</tr>
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
				<td><input type="submit" value="Acheter" class="btn btn-info" id="evenementTd"/></td>
			</tr>
		</table>
	</form>
	
	</div>
		
</div>