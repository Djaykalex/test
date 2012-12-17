<?php
require(MODELS.DS.'model.php');

$validate = array(
	'name' => array (
		'rule1' => array (
			'rule' => array ('minLength', 3), 
			'message' => 'La valeur de ce champ est de 3 caractères minimum.'
			
		),
		'rule2' => array (
			'rule' => array ('maxLength', 80),
			'message' => 'La valeur de ce champ est de 80 caractères maximum.'

		)

	),
	'content' => array (
		'rule' => array ('minLength', 10), 
		'message' => 'La valeur de ce champ est de 10 caractères minimum.'
	)
	
);
