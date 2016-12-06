<?php

$idu= $_GET['idUser'];
$ide= $_GET['idEvent'];

	function eventProduitDivT($idUser,$idEvent){
		$array=ProposerModel::userTableauProduit($idEvent);
		$count = sizeof($array);
			
		for($i=0;$i<$count;$i++){	
			$lib= $array[$i];
			$idP= ProduitModel::getIdFromLib($lib);//le bon id produit
			echo 	"<div class='col-md-4'>
						<a href='index.php?controller=User&action=produitShow&idUser=";
				echo $idUser;
				echo"&idEvent=";
				echo $idEvent;
				echo"&idProduit=";
				echo $idP;
				echo"' class='thumbnail'>
						<p>".$lib."</p>   
						
						</a>
						</div>";
		}
	}
?>
<div class="container">	
	<h1>Liste des produits du cours <?php echo EventModel::getTC($ide); ?></h1>
	<?php eventProduitDivT($idu,$ide)?>
	
</div>
