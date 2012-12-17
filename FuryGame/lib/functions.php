<?php 
/**
 *
 * @param mixed $mVar2Display Element à afficher
 */
function pr($mVar2Display) {

	echo '<pre style="background-color: #EBEBEB; border: 1px dashed black; width: 100%; padding: 10px;">';
	print_r($mVar2Display);
	echo '</pre>';
}


?>