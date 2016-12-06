<div class="container" id="erreur">
	<h2>Erreur</h2>
	<?php
		$inscErrorText = $this->getArg('inscErrorText');
		if(isset($inscErrorText))
		echo '<span class="error">' . $inscErrorText . '</span>';
	?>
</div>