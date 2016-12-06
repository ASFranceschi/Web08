<?php
	$id=EventModel::get_Id();
	$tc=EventModel::getTC($id);
?>

<div class="container" id="">

	<h1>Participer à l'événement <?php echo $tc;?> </h1>
	
	<p>Vous vous êtes bien inscrit à l'évènement  : <?php echo $tc;?>
	
	
	Merci de votre participation !</p>


</div>

