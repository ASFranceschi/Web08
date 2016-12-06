<div class="container" id="erreurConnexion">
	<h2>Erreur</h2>
	<?php
		$inscErrorText = $this->getArg('inscErrorText');
		if(isset($inscErrorText))
		echo '<span class="error">' . $inscErrorText . '</span>';
	?>
</div>